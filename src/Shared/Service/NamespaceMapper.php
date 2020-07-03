<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Shared\Service;

use OxidEsales\GraphQL\Base\Framework\NamespaceMapperInterface;

class NamespaceMapper implements NamespaceMapperInterface
{
    public function getControllerNamespaceMapping(): array
    {
        return [
            '\\__Vendor__\\GraphQL\\__Package__\\Category\\Controller' => __DIR__ . '/../../Category/Controller/',
        ];
    }

    public function getTypeNamespaceMapping(): array
    {
        return [
            '\\__Vendor__\\GraphQL\\__Package__\\Category\\DataType' => __DIR__ . '/../../Category/DataType/',
        ];
    }
}
