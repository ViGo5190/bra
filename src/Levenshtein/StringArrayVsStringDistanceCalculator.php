<?php

namespace Vigo5190\Levenshtein;

use Vigo5190\Vocabulary\StorageInterface;
use Vigo5190\Vocabulary\Helper;

class StringArrayVsStringDistanceCalculator implements DistanceCalculatorInterface
{
    /**
     * @var StorageInterface
     */
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritdoc
     */
    public function getDistance(string $word): int
    {
        $clearedWord = Helper::clearWord($word);
        $clearedWordLength = strlen($clearedWord);
        $closestWord = '';

        if ($this->storage->isWordInStorage($clearedWord)) {
            $closestWord = $clearedWord;
            return 0;
        }
        $shortest = -1;
        foreach ($this->storage->getAllWords() as $vocabularyItem) {

            $lev = levenshtein($clearedWord, $vocabularyItem);

            if ($lev === 1) {
                $closestWord = $vocabularyItem;
                $shortest = 1;
                break;
            }

            if ($lev <= $shortest || $shortest < 0) {
                $closestWord = $vocabularyItem;
                $shortest = $lev;
            }
        }

//        echo $closestWord .PHP_EOL;
        return $shortest;
    }

}