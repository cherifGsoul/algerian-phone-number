<?php

declare(strict_types=1);

namespace Cherif\AlgerianPhoneNumber;

use Cherif\AlgerianPhoneNumber\Exception\InvalidLandlineNumberException;

final class LandlineNumber extends AbstractAlgerianPhoneNumber
{
    protected function setNumber(string $number)
    {
        $pattern = '/^(00213|\+213|0)(49|27|29|32|33|34|25|26|37|43|46|21|23|36|48|39|38|31|45|35|41|24)[0-9]{6}/';
        if (!preg_match($pattern, $number)) {
            throw new InvalidLandlineNumberException('The landline phone number is invalid!');
        }
        $this->number = $number;
    }
}
