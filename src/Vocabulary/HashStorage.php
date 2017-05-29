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

        if ($clearedWord != '') {
            $this->storage[$clearedWord] = $clearedWord;
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