<?php

declare(strict_types=1);

use PackageVersions\Versions;

/** @psalm-pure */
function getVersion(): string
{
    return Versions::getVersion('composer/package-versions-deprecated');
}
