<?php

namespace Vigo5190\Vocabulary;

class SmartStorage extends AbstractStorage
{
    /**
     * @inheritdoc
     */
    public function addWord(string $word)
    {
        $clearedWord = Helper::clearWord($word);

        if ($clearedWord != '') {
            $length = strlen($clearedWord);
            if (!array_key_exists($length, $this->storage)) {
                $this->storage[$length] = [];
            }
            $this->storage[$length][$clearedWord] = $clearedWord;
        }
    }

    /**
     * @inheritdoc
     */
    public function isWordInStorage(string $word): bool
    {
        $clearedWord = Helper::clearWord($word);
        $length = strlen($clearedWord);
        return array_key_exists($length, $this->storage) && array_key_exists($clearedWord, $this->storage[$length]);
    }

    /**
     * @inheritdoc
     */
    public function getAllWords(): array
    {
        $allWords = array_merge(...$this->storage);
        return $allWords;
    }

    /**
     * @inheritdoc
     */
    public function getWordsWithSpecificSizeOrDelta(int $length, int $delta): array
    {
        $words = [];

        if ($delta === 0 && array_key_exists($length, $this->storage)) {
            $words = array_merge($words, $this->storage[$length]);
        } else if ($delta > 0 && $delta <= $length) {
            if (array_key_exists($length-$delta, $this->storage)) {
                $words = array_merge($words, $this->storage[$length-$delta]);
            }
            if (array_key_exists($length+$delta, $this->storage)) {
                $words = array_merge($words, $this->storage[$length+$delta]);
            }
//            for ($i = $length - $delta; $i <= $length + $delta; $i++) {
//                if (array_key_exists($i, $this->storage)) {
//                    $words = array_merge($words, $this->storage[$i]);
//                }
//            }
        }

        return $words;
    }
}