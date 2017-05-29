<?php

namespace Vigo5190\Levenshtein;

use Vigo5190\Vocabulary\StorageInterface;
use Vigo5190\Vocabulary\Helper;

class StringArrayVsStringSmartDistanceCalculator implements DistanceCalculatorInterface
{
    /**
     * @var StorageInterface
     */
    private $storage;

    private $cache = [];

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

        if (array_key_exists($clearedWord, $this->cache)) {
            return $this->cache[$clearedWord];
        }

        $clearedWordLength = strlen($clearedWord);

        if ($this->storage->isWordInStorage($clearedWord)) {
            $this->cache[$clearedWord] = 0;
            return 0;
        }
        $shortest = -1;

        $delta = 0;
        while ($delta <= max($this->storage->getMaxLengthWord(), $clearedWordLength) && $shortest !== 1) {
            foreach ($this->storage->getWordsWithSpecificSizeOrDelta($clearedWordLength, $delta) as $vocabularyItem) {

                $lev = levenshtein($clearedWord, $vocabularyItem);

                if ($lev === 1) {
                    $shortest = 1;
                    $w = $vocabularyItem;
                    break;
                }

                if ($lev < $shortest || $shortest < 0) {
                    $w = $vocabularyItem;
                    $shortest = $lev;
                }

            }
            $delta++;
            if ($shortest > -1 && $delta >= $clearedWordLength) {
                break;
            }
        }

        $this->cache[$clearedWord] = $shortest;
        return $shortest;
    }

}