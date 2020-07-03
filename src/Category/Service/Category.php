<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Category\Service;

use __Vendor__\GraphQL\__Package__\Category\DataType\Category as CategoryDataType;
use __Vendor__\GraphQL\__Package__\Category\Exception\CategoryNotFound;
use __Vendor__\GraphQL\__Package__\Category\Infrastructure\CategoryRepository;
use OxidEsales\GraphQL\Base\Exception\NotFound;
use OxidEsales\GraphQL\Base\Exception\InvalidLogin;

final class Category
{
    /** @var CategoryRepository */
    private $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @throws CategoryNotFound
     */
    public function category(string $id): CategoryDataType
    {
        try {
            $category = $this->categoryRepository->category($id);
        } catch (NotFound $e) {
            throw CategoryNotFound::byId($id);
        }

        if (!$category->active()) {
            throw new InvalidLogin('Unauthorized');
        }

        return $category;
    }
}
