<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Category\Infrastructure;

use OxidEsales\Eshop\Application\Model\Category as CategoryEshopModel;
use __Vendor__\GraphQL\__Package__\Category\DataType\Category as CategoryDataType;
use OxidEsales\GraphQL\Base\Exception\NotFound;

final class CategoryRepository
{
    /**
     * @throws NotFound
     */
    public function category(string $id): CategoryDataType
    {
        /** @var CategoryEshopModel */
        $category = oxNew(CategoryEshopModel::class);

        if (!$category->load($id)) {
            throw new NotFound($id);
        }

        return new CategoryDataType(
            $category
        );
    }
}
