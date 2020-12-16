<?php

declare(strict_types=1);

namespace PackageVersionsTest;

use PHPUnit\Framework\TestCase;
use RecursiveCallbackFilterIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use ZipArchive;

use function array_filter;
use function array_map;
use function array_walk;
use function chdir;
use function chmod;
use function escapeshellarg;
use function exec;
use function file_get_contents;
use function file_put_contents;
use function getcwd;
use function in_array;
use function is_dir;
use function is_writable;
use function iterator_to_array;
use function json_decode;
use function json_encode;
use function mkdir;
use function putenv;
use function realpath;
use function rmdir;
use function scandir;
use function strlen;
use function substr;
use function sys_get_temp_dir;
use function uniqid;
use function unlink;

use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_SLASHES;
use const PHP_BINARY;

/**
 * @coversNothing
 */
class E2EInstallerTest extends TestCase
{
    private $tempGlobalComposerHome;

    private $tempLocalComposerHome;

    private $tempArtifact;

    protected function setUp()
    {
        $this->tempGlobalComposerHome = sys_get_temp_dir() . '/' . uniqid('InstallerTest', true) . '/global';
        $this->tempLocalComposerHome  = sys_get_temp_dir() . '/' . uniqid('InstallerTest', true) . '/local';
        $this->tempArtifact           = sys_get_temp_dir() . '/' . uniqid('InstallerTest', true) . '/artifacts';
        mkdir($this->tempGlobalComposerHome, 0700, true);
        mkdir($this->tempLocalComposerHome, 0700, true);
        mkdir($this->tempArtifact, 0700, true);

        putenv('COMPOSER_HOME=' . $this->tempGlobalComposerHome);
    }

    protected function tearDown()
    {
        $this->rmDir($this->tempGlobalComposerHome);
        $this->rmDir($this->tempLocalComposerHome);
        $this->rmDir($this->tempArtifact);

        putenv('COMPOSER_HOME');
    }

    public function testGloballyInstalledPluginDoesNotGenerateVersionsForLocalProject()
    {
        $this->createPackageVersionsArtifact();

        $this->writeComposerJsonFile(
            [
                'name'         => 'package-versions/e2e-global',
                'require'      => ['composer/package-versions-deprecated' => '1.0.0'],
                'repositories' => [
                    ['packagist' => false],
                    [
                        'type' => 'artifact',
                        'url' => $this->tempArtifact,
                    ],
                ],
            ],
            $this->tempGlobalComposerHome
        );

        $this->execComposerInDir('global update', $this->tempGlobalComposerHome);

        $this->createArtifact();
        $this->writeComposerJsonFile(
            [
                'name'         => 'package-versions/e2e-local',
                'require'      => ['test/package' => '2.0.0'],
                'repositories' => [
                    ['packagist' => false],
                    [
                        'type' => 'artifact',
                        'url' => $this->tempArtifact,
                    ],
                ],
            ],
            $this->tempLocalComposerHome
        );

        $this->execComposerInDir('update', $this->tempLocalComposerHome);
        $this->assertFalse(file_exists(
            $this->tempLocalComposerHome . '/vendor/composer/package-versions-deprecated/src/PackageVersions/Versions.php'
        ));
    }

    public function testRemovingPluginDoesNotAttemptToGenerateVersions()
    {
        $this->createPackageVersionsArtifact();
        $this->createArtifact();

        $this->writeComposerJsonFile(
            [
                'name'         => 'package-versions/e2e-local',
                'require'      => [
                    'test/package' => '2.0.0',
                    'composer/package-versions-deprecated' => '1.0.0',
                ],
                'repositories' => [
                    ['packagist' => false],
                    [
                        'type' => 'artifact',
                        'url' => $this->tempArtifact,
                    ],
                ],
            ],
            $this->tempLocalComposerHome
        );

        $this->execComposerInDir('update', $this->tempLocalComposerHome);
        self::assertFileExists(
            $this->tempLocalComposerHome . '/vendor/composer/package-versions-deprecated/src/PackageVersions/Versions.php'
        );

        $this->execComposerInDir('remove composer/package-versions-deprecated', $this->tempLocalComposerHome);

        $this->assertFalse(file_exists(
            $this->tempLocalComposerHome . '/vendor/composer/package-versions-deprecated/src/PackageVersions/Versions.php'
        ));
    }

    /**
     * @group #41
     * @group #46
     */
    public function testRemovingPluginWithNoDevDoesNotAttemptToGenerateVersions()
    {
        $this->createPackageVersionsArtifact();
        $this->createArtifact();

        $this->writeComposerJsonFile(
            [
                'name'         => 'package-versions/e2e-local',
                'require-dev'      => ['composer/package-versions-deprecated' => '1.0.0'],
                'repositories' => [
                    ['packagist' => false],
                    [
                        'type' => 'artifact',
                        'url' => $this->tempArtifact,
                    ],
                ],
            ],
            $this->tempLocalComposerHome
        );

        $this->execComposerInDir('update', $this->tempLocalComposerHome);
        self::assertFileExists(
            $this->tempLocalComposerHome . '/vendor/composer/package-versions-deprecated/src/PackageVersions/Versions.php'
        );

        $this->execComposerInDir('install --no-dev', $this->tempLocalComposerHome);

        $this->assertFalse(file_exists(
            $this->tempLocalComposerHome . '/vendor/composer/package-versions-deprecated/src/PackageVersions/Versions.php'
        ));
    }

    public function testOnReadonlyFilesystemDoesNotGenerateClasses()
    {
        $this->createPackageVersionsArtifact();
        $this->createArtifact();

        $this->writeComposerJsonFile(
            [
                'name'         => 'package-versions/e2e-local',
                'require-dev'  => ['composer/package-versions-deprecated' => '1.0.0'],
                'repositories' => [
                    ['packagist' => false],
                    [
                        'type' => 'artifact',
                        'url' => $this->tempArtifact,
                    ],
                ],
            ],
            $this->tempLocalComposerHome
        );

        $this->execComposerInDir('install', $this->tempLocalComposerHome);

        $versionsDir = $this->tempLocalComposerHome . '/vendor/composer/package-versions-deprecated/src/PackageVersions';

        $versionsFilePath = $versionsDir . '/Versions.php';

        file_put_contents($versionsFilePath, 'NOT PHP!');

        chmod($versionsFilePath, 0400);
        chmod($versionsDir, 0400);

        $this->execComposerInDir('update', $this->tempLocalComposerHome);

        chmod($versionsDir, 0700);
        chmod($versionsFilePath, 0600);

        self::assertSame('NOT PHP!', file_get_contents($versionsFilePath));
    }

    /**
     * @group 101
     */
    public function testInstallingPluginWithNoScriptsLeadsToUsableVersionsClass()
    {
        $this->createPackageVersionsArtifact();
        $this->createArtifact();

        $this->writeComposerJsonFile(
            [
                'name'         => 'package-versions/e2e-local',
                'require'      => ['composer/package-versions-deprecated' => '1.0.0'],
                'repositories' => [
                    ['packagist' => false],
                    [
                        'type' => 'artifact',
                        'url' => $this->tempArtifact,
                    ],
                ],
            ],
            $this->tempLocalComposerHome
        );

        $this->execComposerInDir('install --no-scripts', $this->tempLocalComposerHome);
        self::assertFileExists(
            $this->tempLocalComposerHome . '/vendor/composer/package-versions-deprecated/src/PackageVersions/Versions.php'
        );

        $this->writePackageVersionUsingFile($this->tempLocalComposerHome);
        self::assertPackageVersionsIsUsable($this->tempLocalComposerHome);
    }

    private function createPackageVersionsArtifact()
    {
        $zip = new ZipArchive();

        $zip->open($this->tempArtifact . '/ocramius-package-versions-1.0.0.zip', ZipArchive::CREATE);

        $files = array_filter(
            iterator_to_array(new RecursiveIteratorIterator(
                new RecursiveCallbackFilterIterator(
                    new RecursiveDirectoryIterator(realpath(__DIR__ . '/../../'), RecursiveDirectoryIterator::SKIP_DOTS),
                    static function (SplFileInfo $file, string $key, RecursiveDirectoryIterator $iterator) {
                        return $iterator->getSubPathname()[0]  !== '.' && $iterator->getSubPathname() !== 'vendor';
                    }
                ),
                RecursiveIteratorIterator::LEAVES_ONLY
            )),
            static function (SplFileInfo $file) {
                return ! $file->isDir();
            }
        );

        array_walk(
            $files,
            static function (SplFileInfo $file) use ($zip) {
                if ($file->getFilename() === 'composer.json') {
                    $contents            = json_decode(file_get_contents($file->getRealPath()), true);
                    $contents['version'] = '1.0.0';

                    return $zip->addFromString('composer.json', json_encode($contents));
                }

                $zip->addFile(
                    $file->getRealPath(),
                    substr($file->getRealPath(), strlen(realpath(__DIR__ . '/../../')) + 1)
                );
            }
        );

        $zip->close();
    }

    private function createArtifact()
    {
        $zip = new ZipArchive();

        $zip->open($this->tempArtifact . '/test-package-2.0.0.zip', ZipArchive::CREATE);
        $zip->addFromString(
            'composer.json',
            json_encode(
                [
                    'name'    => 'test/package',
                    'version' => '2.0.0',
                ],
                JSON_PRETTY_PRINT
            )
        );
        $zip->close();
    }

    /**
     * @param mixed[] $config
     */
    private function writeComposerJsonFile(array $config, string $directory)
    {
        file_put_contents(
            $directory . '/composer.json',
            json_encode($config, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }

    private function writePackageVersionUsingFile(string $directory)
    {
        file_put_contents(
            $directory . '/use-package-versions.php',
            <<<'PHP'
<?php

require_once __DIR__ . '/vendor/autoload.php';

echo \PackageVersions\Versions::getVersion('composer/package-versions-deprecated');
PHP
        );
    }

    private function assertPackageVersionsIsUsable(string $directory)
    {
        exec(PHP_BINARY . ' ' . escapeshellarg($directory . '/use-package-versions.php'), $output, $exitCode);

        self::assertSame(0, $exitCode);
        self::assertCount(1, $output);
        self::assertTrue(preg_match('/^1\\..*\\@[a-f0-9]*$/', $output[0]) > 0);
    }

    /**
     * @return mixed[]
     */
    private function execComposerInDir(string $command, string $dir) : array
    {
        $currentDir = getcwd();
        chdir($dir);
        exec(__DIR__ . '/../../vendor/bin/composer ' . $command . ' 2> /dev/null', $output, $exitCode);
        self::assertEquals(0, $exitCode);
        chdir($currentDir);

        return $output;
    }

    private function rmDir(string $directory)
    {
        if (! is_writable($directory)) {
            chmod($directory, 0700);
        }

        if (! is_dir($directory)) {
            unlink($directory);

            return;
        }

        array_map(
            function ($item) use ($directory) {
                $this->rmDir($directory . '/' . $item);
            },
            array_filter(
                scandir($directory),
                static function (string $dirItem) {
                    return ! in_array($dirItem, ['.', '..'], true);
                }
            )
        );

        rmdir($directory);
    }
}
