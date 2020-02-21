<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Tests\Integration\Controller;

use OxidEsales\GraphQL\Base\Tests\Integration\TestCase;

class CategoryTest extends TestCase
{
    public function testGetSingleCategoryWithoutParam(): void
    {
        $result = $this->execQuery('query { category }');
        $this->assertSame(
            400,
            $result['status']
        );
    }
}
