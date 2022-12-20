<?php

namespace BernardinoSlv\PrizeDown;

use PHPUnit\Framework\TestCase;

class NumbersGeneratorTest extends TestCase
{
    private ?NumbersGenerator $numbersGenerator = null;

    protected function setUp(): void
    {
        $this->numbersGenerator = new NumbersGenerator(1, 10);
    }

    public function testSetterInterval()
    {
        $this->assertInstanceOf(NumbersGenerator::class, $this->numbersGenerator->setInterval(5, 1000));
    }

    public function testGetterInterval()
    {
        $this->assertEquals(1, $this->numbersGenerator->getMin());
        $this->assertEquals(10, $this->numbersGenerator->getMax());
    }

    public function testGetterIntervalAfterSetterInterval()
    {
        $this->numbersGenerator->setInterval(5, 1000);

        $this->assertEquals(5, $this->numbersGenerator->getMin());
        $this->assertEquals(1000, $this->numbersGenerator->getMax());
    }

    public function testSetterRestrictNumbers()
    {
        $this->assertInstanceOf(NumbersGenerator::class, $this->numbersGenerator->setRestrictNumbers([1, 2, 3, 4]));
    }

    public function testGetterRestrictNumbersAfterSetterRestrictNumbers()
    {
        $this->numbersGenerator->setRestrictNumbers([1, 2, 3, 4, 5]);

        $this->assertEquals([1, 2, 3, 4, 5], $this->numbersGenerator->getRestrictNumbers());
    }

    public function testGenerate10NumbersOf1To100WithoutRestrictNumbers()
    {
        $this->numbersGenerator->setInterval(1, 100);

        $numbers = $this->numbersGenerator->generate(10);
        $this->assertEquals(10, count($numbers));
    }

    public function testGenerate10NumbersUniqueOf1To100WithoutRestrictNumbers()
    {
        $this->numbersGenerator->setInterval(1, 100);

        $numbers = $this->numbersGenerator->generate(10);
        $this->assertEquals($numbers, array_unique($numbers));
    }

    public function testRangeout10NumbersOf1To100WithoutRestrictNumbers()
    {
        $this->numbersGenerator->setInterval(1, 100);

        $numbers = $this->numbersGenerator->generate(10);

        foreach ($numbers as $number) {
            $this->assertTrue($number <= 100);
            $this->assertTrue($number >= 1);
        }
    }

    public function testGenerate10NumbersOf1To20WithRestrictNumbers1To10()
    {
        $this->numbersGenerator->setInterval(1, 20)
            ->setRestrictNumbers([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $numbers = $this->numbersGenerator->generate(10);
        $this->assertEquals(10, count($numbers));
    }

    public function testGenerate10NumbersUniqueOf1To20WithRestrictNumbers1To10()
    {
        $this->numbersGenerator->setInterval(1, 20)
            ->setRestrictNumbers([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $numbers = $this->numbersGenerator->generate(10);
        $this->assertEquals($numbers, array_unique($numbers));
    }

    public function testRangeout10NumbersOf1To20WithRestrictNumbers1To10()
    {
        $this->numbersGenerator->setInterval(1, 20)
        ->setRestrictNumbers([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $numbers = $this->numbersGenerator->generate(10);

        foreach ($numbers as $number) {
            $this->assertTrue($number <= 20);
            $this->assertTrue($number >= 1);
        }
    }

    public function testRangeout10NumbersOf1To20WithRestrictNumbers1_3_5_7_9_11_13_14_17_19()
    {
        $this->numbersGenerator->setInterval(1, 20)
        ->setRestrictNumbers([1, 3, 5, 7, 9, 11, 13, 15, 17, 19]);

        $numbers = $this->numbersGenerator->generate(10);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, [1, 3, 5, 7, 9, 11, 13, 15, 17, 19]));
        }
    }


    public function testGenerate100NumbersOf1To1000WithoutRestrictNumbers()
    {
        $this->numbersGenerator->setInterval(1, 1000);
        // ->setRestrictNumbers([1, 3, 5, 7, 9, 11, 13, 15, 17, 19]);

        $numbers = $this->numbersGenerator->generate(100);
        $this->assertEquals(100, count($numbers));
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To100()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 100; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(100, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To200()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 200; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(200, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To300()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 300; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(300, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To400()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 400; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(400, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To500()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 500; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(500, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }

        // print_r($numbers);
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To600()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 600; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(600, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }

        // print_r($numbers);
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To700()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 700; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(700, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }

        // print_r($numbers);
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To800()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 800; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(800, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }

        // print_r($numbers);
    }

    public function testGenerate100NumbersOf1To1000WithRestrictNumbers1To900()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 900; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(900, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }
    }

    public function testGenerateNullNumbersOf1To1000WithRestrictNumbers1To1000()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 1000; $c++) {
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(1000, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        $this->assertNull($numbers);
    }

    public function testGenerate100NumbersOf1To1000WithRestrictPairNumbers()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 1000; $c++) {
            if ($c % 2) {
                continue;
            }
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(500, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }
    }

    public function testGenerate100NumbersOf1To1000WithRestrictOddNumbers()
    {
        $restrictNumbers = [];

        for ($c = 1; $c <= 1000; $c++) {
            if (! ($c % 2)) {
                continue;
            }
            $restrictNumbers[] = $c;
        }
        $this->assertEquals(500, count($restrictNumbers));

        $this->numbersGenerator->setInterval(1, 1000)
        ->setRestrictNumbers($restrictNumbers);

        $numbers = $this->numbersGenerator->generate(100);

        foreach ($numbers as $number) {
            $this->assertFalse(in_array($number, $restrictNumbers));
        }
    }
}
