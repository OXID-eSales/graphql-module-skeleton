<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Category\Controller;

use __Vendor__\GraphQL\__Package__\Category\DataType\Category as CategoryDataType;
use __Vendor__\GraphQL\__Package__\Category\Service\Category as CategoryService;
use TheCodingMachine\GraphQLite\Annotations\Query;

final class Category
{
    /** @var CategoryService */
    private $categoryService;

    public function __construct (
        CategoryService $categoryService
    ) {
        $this->categoryService = $categoryService;
    }

    /**
     * @Query()
     */
    public function category(string $id): CategoryDataType
    {
        return $this->categoryService->category($id);
    }
}
