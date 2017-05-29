<?php

namespace Vigo5190\Vocabulary;


abstract class AbstractStorage implements StorageInterface
{
    protected $storage = [];

    /**
     * @inheritdoc
     */
    public function addWord(string $word)
    {
        $clearedWord = Helper::clearWord($word);

        if ($clearedWord != '') {
            $this->storage[] = $clearedWord;
        }
    }

    /**
     * @inheritdoc
     */
    public function getAllWords(): array
    {
        return $this->storage;
    }

    /**
     * @inheritdoc
     */
    public function isWordInStorage(string $word): bool
    {
        $clearedWord = Helper::clearWord($word);
        return in_array($clearedWord, $this->storage);
    }

    /**
     * @inheritdoc
     */
    public function getWordsWithSpecificSizeOrDelta(int $size, int $delta): array
    {
        throw new \Exception('Method not implemented');
    }

}