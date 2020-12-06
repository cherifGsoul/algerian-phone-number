<?php

namespace spec\Cherif\AlgerianPhoneNumber;

use Cherif\AlgerianPhoneNumber\AlgerianPhoneNumber;
use Cherif\AlgerianPhoneNumber\Exception\InvalidAlgerianPhoneNumberException;
use Cherif\AlgerianPhoneNumber\Exception\InvalidMobileNumberException;
use PhpSpec\ObjectBehavior;

class AlgerianPhoneNumberSpec extends ObjectBehavior
{
    function it_can_be_mobile_number()
    {
        $this->beConstructedThrough('fromString', ['0699000000']);
        $this->isMobile()->shouldReturn(true);
    }


    function it_can_be_landline_number()
    {
        $this->beConstructedThrough('fromString', ['038525564']);
        $this->isLandline()->shouldReturn(true);
    }

    function it_throws_when_is_not_mobile_nor_landline_number()
    {
        $this->beConstructedThrough('fromString', ['foo']);
        $this->shouldThrow(InvalidAlgerianPhoneNumberException::class)->duringInstantiation();
    }

    function it_is_immutable()
    {
        $this->beConstructedFromString('038525564');
        $other = $this->withNumber('023525564');
        $this->shouldNotBe($other);
    }
}
