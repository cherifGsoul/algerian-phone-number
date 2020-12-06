<?php

declare(strict_types=1);

namespace Cherif\AlgerianPhoneNumber;

use Cherif\AlgerianPhoneNumber\Exception\InvalidAlgerianPhoneNumberException;
use Cherif\AlgerianPhoneNumber\Exception\InvalidLandlineNumberException;
use Cherif\AlgerianPhoneNumber\Exception\InvalidMobileNumberException;

final class AlgerianPhoneNumber
{
    private AbstractAlgerianPhoneNumber $number;

    private function __construct(string $number)
    {
        $this->setNumber($number);
    }

    public static function fromString(string $number)
    {
        $algerianPhoneNumber = new AlgerianPhoneNumber($number);
        return $algerianPhoneNumber;
    }

    public function isMobile()
    {
        return $this->number instanceof MobileNumber;
    }

    public function isLandline()
    {
        return $this->number instanceof LandlineNumber;
    }

    public function __toString()
    {
        return $this->number->asString();
    }

    private function setNumber(string $number)
    {
        try {
            $this->number = MobileNumber::fromString($number);
        } catch (InvalidMobileNumberException $e) {
            try {
                $this->number = LandlineNumber::fromString($number);
            } catch (InvalidLandlineNumberException $e) {
                throw new InvalidAlgerianPhoneNumberException();
            }
        }
    }
}
