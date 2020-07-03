<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Category\DataType;

use OxidEsales\Eshop\Application\Model\Category as CategoryEshopModel;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use TheCodingMachine\GraphQLite\Types\ID;
use DateTimeInterface;
use DateTimeImmutable;

/**
 * @Type()
 */
final class Category
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
    public function id(): ID
    {
        return new ID(
            $this->category->getId()
        );
    }

    /**
     * @Field
     */
    public function title(): string
    {
        return (string) $this->category->getFieldData('oxtitle');
    }

    /**
     * @Field()
     */
    public function active(?DateTimeInterface $now = null): bool
    {
        $active = (bool) $this->category->getFieldData('oxactive');

        if ($active) {
            return true;
        }

        $from = new DateTimeImmutable(
            (string) $this->category->getFieldData('oxactivefrom')
        );
        $to = new DateTimeImmutable(
            (string) $this->category->getFieldData('oxactiveto')
        );
        $now = $now ?? new DateTimeImmutable('now');

        if ($from <= $now && $to >= $now) {
            return true;
        }

        return false;
    }
}
