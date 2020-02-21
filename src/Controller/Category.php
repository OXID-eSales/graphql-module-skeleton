<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Controller;

use OxidEsales\Eshop\Application\Model\Category as CategoryEshopModel;
use __Vendor__\GraphQL\__Package__\DataObject\Category as CategoryDataObject;
use __Vendor__\GraphQL\__Package__\Exception\CategoryNotFound;
use TheCodingMachine\GraphQLite\Annotations\Query;

class Category
{
    /**
     * category by ID
     *
     * @Query()
     */
    public function category(string $id): CategoryDataObject
    {
        /** @var CategoryEshopModel */
        $category = oxNew(CategoryEshopModel::class);

        if (!$category->load($id)) {
            throw CategoryNotFound::byId($id);
        }

        return new CategoryDataObject(
            $category
        );
    }
}
