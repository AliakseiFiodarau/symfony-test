<?php

declare(strict_types=1);

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class IsLocaleTax extends Constraint
{
    /**
     * Tax number violation error message.
     *
     * @var string
     */
    public string $message = 'The number "{{ value }}" is not valid tax number.';
}
