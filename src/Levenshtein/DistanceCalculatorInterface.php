<?php

namespace Vigo5190\Levenshtein;


interface DistanceCalculatorInterface
{
    /**
     * Get distance
     * @param string $word
     * @return int
     */
    public function getDistance(string $word): int;
}