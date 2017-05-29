<?php

namespace Vigo5190;

use Vigo5190\Vocabulary\LoaderInterface;
use Vigo5190\Vocabulary\StorageInterface;
use Vigo5190\Levenshtein\DistanceCalculatorInterface;

class App
{
    private $inputStorage;
    private $vocabularyStorage;
    private $vocabularyLoader;
    private $distanceCalculator;
    private $inputReader;

    public function __construct(
        StorageInterface $vocabularyStorage,
        StorageInterface $inputStorage,
        LoaderInterface $vocabularyLoader,
        InputReader $inputReader,
        DistanceCalculatorInterface $distanceCalculator
    )
    {
        $this->vocabularyStorage = $vocabularyStorage;
        $this->inputStorage = $inputStorage;
        $this->vocabularyLoader = $vocabularyLoader;
        $this->distanceCalculator = $distanceCalculator;
        $this->inputReader = $inputReader;
    }


    public function run(): int
    {
        $this->vocabularyLoader->setSource(VOCABULARY_PATH)->loadWords();
        $this->inputReader->loadWords();

        $totalDistance = 0;

        foreach ($this->inputStorage->getAllWords() as $inputWord) {
            $totalDistance += $this->distanceCalculator->getDistance($inputWord);
        }

        return $totalDistance;
    }

}