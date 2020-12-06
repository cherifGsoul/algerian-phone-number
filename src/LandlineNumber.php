<?php

declare(strict_types=1);

namespace Cherif\AlgerianPhoneNumber;

use Cherif\AlgerianPhoneNumber\Exception\InvalidLandlineNumberException;

final class LandlineNumber extends AbstractAlgerianPhoneNumber
{
    protected function setNumber(string $number)
    {
        $pattern = '/^(00213|\+213|0)(49|27|29|32|33|34|33|49|25|26|29|37|43|46|26|21|23|27|34|36|48|39|48|38|37|31|25|45|35|45|29|41|49|29|35|24|38|46|32|37|24|31|27|49|43|29|46)[0-9]{6}/';
        if (!preg_match($pattern, $number)) {
            throw new InvalidLandlineNumberException('The landline phone number is invalid!');
        }
        $this->number = $number;
    }
}
