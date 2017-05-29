<?php

namespace Vigo5190\Vocabulary;

class HashStorage extends AbstractStorage
{
    /**
     * @inheritdoc
     */
    public function addWord(string $word)
    {
        $clearedWord = Helper::clearWord($word);
        $clearedWordLength = strlen($clearedWord);

        if ($clearedWordLength > 0) {
            $this->storage[$clearedWord] = $clearedWord;
            if ($clearedWordLength > $this->maxLengthWord) {
                $this->maxLengthWord = $clearedWordLength;
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function isWordInStorage(string $word): bool
    {
        $clearedWord = Helper::clearWord($word);
        return array_key_exists($clearedWord, $this->storage);
    }
}