<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\DataObject;

use OxidEsales\Eshop\Application\Model\Category as CategoryEshopModel;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use TheCodingMachine\GraphQLite\Types\ID;

/**
 * @Type()
 */
class Category
{
    /** @var CategoryEshopModel */
    private $category;

    public function __construct(
        CategoryEshopModel $category
    ) {
        $this->category = $category;
    }

    /**
     * @Field
     */
    public function getId(): ID
    {
        return new ID(
            $this->category->getId()
        );
    }

    /**
     * @Field
     */
    public function getTitle(): string
    {
        return (string) $this->category->getFieldData('oxtitle');
    }
}
