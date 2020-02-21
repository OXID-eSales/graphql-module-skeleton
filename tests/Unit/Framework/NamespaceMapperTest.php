<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Tests\Unit\Framework;

use PHPUnit\Framework\TestCase;
use __Vendor__\GraphQL\__Package__\Framework\NamespaceMapper;

/**
 * @covers __Vendor__\GraphQL\__Package__\Framework\NamespaceMapper
 */
class NamespaceMapperTest extends TestCase
{
    public function testFooBar(): void
    {
        $namespaceMapper = new NamespaceMapper();
        $this->assertCount(
            1,
            $namespaceMapper->getControllerNamespaceMapping()
        );
        $this->assertCount(
            1,
            $namespaceMapper->getTypeNamespaceMapping()
        );
    }
}
