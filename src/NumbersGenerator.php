<?php

declare(strict_types=1);

namespace BernardinoSlv\PrizeDown;

class NumbersGenerator
{
    protected ?int $min = null;
    protected ?int $max = null;
    protected array $restrictNumbers = [];

    public function __construct(int $min = 1, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function setInterval(int $min, int $max): self
    {
        $this->min = $min;
        $this->max = $max;
        return $this;
    }

    public function getMin(): ?int
    {
        return $this->min;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setRestrictNumbers(array $numbers = []): self
    {
        $this->restrictNumbers = [];
        foreach($numbers as $number) {
            $this->restrictNumbers[] = (int) $number;
        }
        return $this;
    }

    public function getRestrictNumbers(): array
    {
        return $this->restrictNumbers;
    }

    public function generate(int $quantity): ?array
    {
        $availableNumbers = $this->generateAvailableNumbers();

        if ($quantity > count($availableNumbers)) {
            return null;
        }

        $keyNumbers = array_rand($availableNumbers, $quantity);

        if (!is_array($keyNumbers)) {
            $keyNumbers = [$keyNumbers];
        }

        $numbers = $this->getNumberByKeys($keyNumbers, $availableNumbers);

        asort($numbers);

        return $numbers;
    }

    protected function generateAvailableNumbers(): array
    {
        $numbers = [];

        for ($number = $this->min; $number <= $this->max; $number++) {
            if (in_array(intval($number), $this->restrictNumbers)) {
                continue;
            }
            $numbers[] = $number;
        }

        return $numbers;
    }


    protected function getNumberByKeys(array $keyNumbers, array $availableNumbers): array
    {
        $numbers = [];

        foreach ($keyNumbers as $key) {
            $numbers[] = $availableNumbers[$key];
        }

        return $numbers;
    }
}
