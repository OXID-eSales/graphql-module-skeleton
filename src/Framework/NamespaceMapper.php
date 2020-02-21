<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Framework;

use OxidEsales\GraphQL\Base\Framework\NamespaceMapperInterface;

class NamespaceMapper implements NamespaceMapperInterface
{
    public function getControllerNamespaceMapping(): array
    {
        return [
            '\\__Vendor__\\GraphQL\\__Package__\\Controller' => __DIR__ . '/../Controller/',
        ];
    }

    public function getTypeNamespaceMapping(): array
    {
        return [
            '\\__Vendor__\\GraphQL\\__Package__\\DataObject' => __DIR__ . '/../DataObject/',
        ];
    }
}
