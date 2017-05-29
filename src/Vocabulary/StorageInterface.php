<?php

namespace Vigo5190\Vocabulary;


interface StorageInterface
{
    /**
     * Add word to storage
     *
     * @param string $word
     * @return mixed
     */
    public function addWord(string $word);

    /**
     * Get all words
     *
     * @return array
     */
    public function getAllWords(): array;

    /**
     * Get words with specified length +/- delta
     *
     * @param int $size
     * @param int $delta
     * @return array
     */
    public function getWordsWithSpecificSizeOrDelta(int $size, int $delta): array;

    /**
     * Check, if word already on storage
     *
     * @param string $word
     * @return bool
     */
    public function isWordInStorage(string $word): bool;
}