<?php

namespace Vigo5190\Vocabulary;


abstract class AbstractStorage implements StorageInterface
{
    protected $storage = [];

    protected $maxLengthWord = 0;

    /**
     * @inheritdoc
     */
    public function addWord(string $word)
    {
        $clearedWord = Helper::clearWord($word);
        $clearedWordLength = strlen($clearedWord);

        if ($clearedWordLength > 0) {
            $this->storage[] = $clearedWord;
            if ($clearedWordLength > $this->maxLengthWord) {
                $this->maxLengthWord = $clearedWordLength;
            }
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

    /**
     * @inheritdoc
     */
    public function getMaxLengthWord(): int
    {
        return $this->maxLengthWord;
    }

}