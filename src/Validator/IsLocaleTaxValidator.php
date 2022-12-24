<?php

declare(strict_types=1);

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedValueException;
use App\Service\PriceModifier;

class IsLocaleTaxValidator extends ConstraintValidator
{
    /**
     * Validating tax number.
     *
     * @param $value
     * @param Constraint $constraint
     * @return void
     */
    public function validate($value, Constraint $constraint): void
    {
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (
            !str_starts_with($value, PriceModifier::TAX_NUMBER_LOCALE_FR)
            && !str_starts_with($value, PriceModifier::TAX_NUMBER_LOCALE_IT)
        ) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
