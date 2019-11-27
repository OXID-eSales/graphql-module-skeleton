<?php

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Controller;

use OxidEsales\EshopCommunity\Application\Model\Category as CategoryModel;
use __Vendor__\GraphQL\__Package__\DataObject\Category as CategoryDataObject;
use TheCodingMachine\GraphQLite\Annotations\Query;

class Category
{
    /**
     * category by ID
     *
     * @Query()
     */
    public function category(string $id): ?CategoryDataObject
    {
        /** @var CategoryModel */
        $category = oxNew(CategoryModel::class);
        if (!$category->load($id)) {
            return null;
        }
        $category = CategoryDataObject::createFromModel($category);
        return $category;
    }
}
