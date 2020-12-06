<?php

declare(strict_types=1);

namespace Cherif\AlgerianPhoneNumber;

abstract class AbstractAlgerianPhoneNumber
{
    protected string $number;

    private function __construct(string $number)
    {
        $this->setNumber($number);
    }

    public static function fromString(string $number): self
    {
        $number = preg_replace("/\s|-+/", "", $number);

        $algerianPhoneNumber = new static($number);

        return $algerianPhoneNumber;
    }

    public function asString()
    {
        return $this->number;
    }

    /**
     * Checks if a object equals an instance of AlgerianPhoneNumber
     * @return bool
     */
    public function equals(AbstractAlgerianPhoneNumber $other): bool
    {
        if ($this->asString() == $other->asString()) {
            return true;
        }
        
        $pattern = '/^\+?(00213|\+213|0)/';
        $otherNumber = preg_replace($pattern, '', $other->asString());
        $number = preg_replace($pattern, '', $this->asString());
        return $number == $otherNumber;
    }

    
    public function withNumber(string $number)
    {
        return static::fromString($number);
    }
    
    abstract protected function setNumber(string $number);
}