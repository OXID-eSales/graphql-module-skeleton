<?php

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\DataObject;

use OxidEsales\EshopCommunity\Application\Model\Category as CategoryModel;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @Type()
 */
class Category
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $parentid;

    /** @var \DateTimeInterface */
    private $timestamp;

    public function __construct(
        string $id,
        string $name,
        string $parentid,
        \DateTimeInterface $timestamp
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->parentid = $parentid;
        $this->timestamp = $timestamp;
    }

    public static function createFromModel(CategoryModel $category): self
    {
        return new self(
            $category->getId(),
            (string)$category->oxcategories__oxtitle,
            (string)$category->oxcategories__oxpartentid,
            new \DateTimeImmutable((string)$category->oxcategories__oxtimestamp)
        );
    }

    /**
     * @Field(outputType="ID")
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @Field()
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getParentid(): string
    {
        return $this->parentid;
    }

    /**
     * @Field()
     */
    public function getTimestamp(): \DateTimeInterface
    {
        return $this->timestamp;
    }
}
