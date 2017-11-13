<?php

namespace Utils;

/**
 * Class Calculator
 *
 * @author François MATHIEU <francois.mathieu@livexp.fr>
 */
class Calculator
{
    /**
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     */
    public function add($a, $b)
    {
        return $a + $b;
    }

    /**
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     */
    public function sub($a, $b)
    {
        return $a - $b;
    }

    /**
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     */
    public function mul($a, $b)
    {
        return $a * $b;
    }

    /**
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     */
    public function div($a, $b)
    {
        return $a / $b;
    }

    /**
     * @param int[] $numbers
     * @return float|int
     */
    public function avg(array $numbers)
    {
        return array_sum($numbers) / count($numbers);
    }
}
