<?php

/**
 * All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace __Vendor__\GraphQL\__Package__\Category\Exception;

use OxidEsales\GraphQL\Base\Exception\NotFound;

use function sprintf;

final class CategoryNotFound extends NotFound
{
    public static function byId(string $id): self
    {
        return new self(sprintf('Category was not found by id: %s', $id));
    }
}
