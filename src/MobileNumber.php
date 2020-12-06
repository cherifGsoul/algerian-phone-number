<?php

declare(strict_types=1);

namespace Cherif\AlgerianPhoneNumber;

use Cherif\AlgerianPhoneNumber\Exception\InvalidMobileNumberException;

final class MobileNumber extends AbstractAlgerianPhoneNumber
{
    /**
     * Checks if it is Mobile phone number
     * @return bool
     */
    public function isMobilis(): bool
    {
        $pattern = '/^(00213|\+213|0)(6)[0-9]{8}/';
        return !!preg_match($pattern, $this->number);
    }

    /**
     * Checks if it is Djezzy phone number
     * @return bool
     */
    public function isDjezzy(): bool
    {
        $pattern = '/^(00213|\+213|0)(7)[0-9]{8}/';
        return !!preg_match($pattern, $this->number);
    }

    /**
     * Checks if it is Ooredoo phone number
     * @return bool
     */
    public function isOoredoo(): bool
    {
        $pattern = '/^(00213|\+213|0)(5)[0-9]{8}/';
        return !!preg_match($pattern, $this->number);
    }

    /**
     * Sets the string number property after validation
     */
    protected function setNumber(string $number)
    {
        $pattern = '/^(00213|\+213|0)(5|6|7)[0-9]{8}/';
        if (!preg_match($pattern, $number)) {
            throw new InvalidMobileNumberException('The mobile phone number is invalid!');
        }
        $this->number = $number;
    }
}
