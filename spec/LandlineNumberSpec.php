<?php

namespace spec\Cherif\AlgerianPhoneNumber;

use Cherif\AlgerianPhoneNumber\LandlineNumber;
use PhpSpec\ObjectBehavior;

class LandlineNumberSpec extends ObjectBehavior
{
    function it_represents_algerian_landline_phone_number()
    {
        $this->beConstructedThrough('fromString', ['038525564']);
        $this->asString()->shouldReturn('038525564');
    }

    function it_throws_when_the_number_is_not_valid()
    {
        $this->beConstructedThrough('fromString', ['0385255']);
        $this->shouldThrow()->duringInstantiation();
    }

    function it_is_immutable()
    {
        $this->beConstructedFromString('038525564');
        $other = $this->withNumber('023525564');
        $this->shouldNotBe($other);
    }

    function it_normalizes_space_separated_numbers()
    {
        $this->beConstructedThrough('fromString', ['038 52 55 64']);
        $this->asString()->shouldReturn('038525564');
    }

    function it_accepts_mixed_separated_format()
    {
        $this->beConstructedFromString('038  52-55-64');
        $this->asString()->shouldReturn('038525564');
    }

    function it_can_compare_with_0_and_00213_indicatives()
    {
        $this->beConstructedFromString('038 52 55 64');
        $other = LandlineNumber::fromString('0021338525564');
        $this->equals($other)->shouldReturn(true);
    }

    function it_can_compare_with_0_and_plus_213_indicatives()
    {
        $this->beConstructedFromString('038525564');
        $other = LandlineNumber::fromString('+21338525564');
        $this->equals($other)->shouldReturn(true);
    }

    function it_can_compare_with_00213_and_plus_213_indicatives()
    {
        $this->beConstructedFromString('0021338525564');
        $other = LandlineNumber::fromString('+21338525564');
        $this->equals($other)->shouldReturn(true);
    }
}
