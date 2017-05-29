<?php

namespace Vigo5190;

use Vigo5190;

class TotalTest extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $inputStorage = new Vigo5190\Vocabulary\SimpleStorage();

        $inputReader = new Vigo5190\InputReader(__DIR__ . '/data/input.txt', $inputStorage);
        $inputReader->loadWords();

        $storage = new Vigo5190\Vocabulary\SmartStorage();
        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/../data/vocabulary.txt')->loadWords();

        $dc = new Vigo5190\Levenshtein\StringArrayVsStringSmartDistanceCalculator($storage);

        $totalDistance = 0;

        foreach ($inputStorage->getAllWords() as $inputWord) {
            $totalDistance += $dc->getDistance($inputWord);
        }

        $this->assertEquals(8, $totalDistance);
    }

    public function test2()
    {
        $inputStorage = new Vigo5190\Vocabulary\SimpleStorage();

        $inputReader = new Vigo5190\InputReader(__DIR__ . '/data/input2.txt', $inputStorage);
        $inputReader->loadWords();

        $storage = new Vigo5190\Vocabulary\SmartStorage();
        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/../data/vocabulary.txt')->loadWords();

        $dc = new Vigo5190\Levenshtein\StringArrayVsStringSmartDistanceCalculator($storage);

        $totalDistance = 0;

        foreach ($inputStorage->getAllWords() as $inputWord) {
            $totalDistance += $dc->getDistance($inputWord);
        }

        $this->assertEquals(187, $totalDistance);
    }
}