<?php

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Tests\Integration\Controller;

use OxidEsales\GraphQL\Base\Tests\Integration\TestCase;

class CategoryTest extends TestCase
{
    public function testGetSingleCategoryWithoutParam()
    {
        $this->execQuery('query { category }');
        $this->assertEquals(
            400,
            static::$queryResult['status']
        );
    }
}
