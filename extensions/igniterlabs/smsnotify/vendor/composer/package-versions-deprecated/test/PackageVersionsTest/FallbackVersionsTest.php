<?php

declare(strict_types=1);

namespace PackageVersionsTest;

use OutOfBoundsException;
use PackageVersions\FallbackVersions;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

use function array_merge;
use function file_exists;
use function file_get_contents;
use function getcwd;
use function json_decode;
use function rename;
use function uniqid;

/**
 * @covers \PackageVersions\FallbackVersions
 */
final class FallbackVersionsTest extends TestCase
{
    public function testWillFailWithoutValidPackageData()
    {
        $this->backupFile(__DIR__ . '/../../vendor/composer/installed.json');
        $this->backupFile(__DIR__ . '/../../composer.lock');

        $this->expectException(UnexpectedValueException::class);

        FallbackVersions::getVersion('phpunit/phpunit');
    }

    public function testValidVersions()
    {
        $lockData = json_decode(file_get_contents(__DIR__ . '/../../composer.lock'), true);

        $packages = array_merge($lockData['packages'], $lockData['packages-dev']);

        self::assertNotEmpty($packages);

        foreach ($packages as $package) {
            self::assertSame(
                $package['version'] . '@' . $package['source']['reference'],
                FallbackVersions::getVersion($package['name'])
            );
        }
    }

    public function testValidVersionsWithoutComposerLock()
    {
        $lockData = json_decode(file_get_contents(__DIR__ . '/../../composer.lock'), true);

        $packages = array_merge($lockData['packages'], $lockData['packages-dev'] ?? []);

        self::assertNotEmpty($packages);

        $this->backupFile(__DIR__ . '/../../composer.lock');
        foreach ($packages as $package) {
            self::assertSame(
                $package['version'] . '@' . $package['source']['reference'],
                FallbackVersions::getVersion($package['name'])
            );
        }
    }

    public function testValidVersionsWithoutInstalledJson()
    {
        $packages = json_decode(file_get_contents(__DIR__ . '/../../vendor/composer/installed.json'), true);
        // normalize composer 2.x installed.json format to the 1.x one
        if (isset($packages['packages'])) {
            $packages = $packages['packages'];
        }

        if ($packages === []) {
            // In case of --no-dev flag
            $lockData = json_decode(file_get_contents(getcwd() . '/composer.lock'), true);
            $packages = array_merge($lockData['packages'], $lockData['packages-dev'] ?? []);
        }

        self::assertNotEmpty($packages);

        $this->backupFile(__DIR__ . '/../../vendor/composer/installed.json');
        foreach ($packages as $package) {
            self::assertSame(
                $package['version'] . '@' . $package['source']['reference'],
                FallbackVersions::getVersion($package['name'])
            );
        }
    }

    public function testInvalidVersionsAreRejected()
    {
        $this->expectException(OutOfBoundsException::class);

        FallbackVersions::getVersion(uniqid('', true) . '/' . uniqid('', true));
    }

    protected function tearDown()
    {
        $this->revertFile(__DIR__ . '/../../composer.lock');
        $this->revertFile(__DIR__ . '/../../vendor/composer/installed.json');
    }

    private function backupFile(string $filename)
    {
        rename($filename, $filename . '.backup');
    }

    private function revertFile(string $filename)
    {
        if (! file_exists($filename . '.backup')) {
            return;
        }

        rename($filename . '.backup', $filename);
    }
}
