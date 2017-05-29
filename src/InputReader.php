<?php

namespace Vigo5190;

use Vigo5190\Vocabulary\StorageInterface;

class InputReader
{
    private $handle;

    /**
     * @var StorageInterface
     */
    public $storage;

    public function __construct($fileSource, StorageInterface $storage)
    {
        if (!(is_readable($fileSource))) {
            throw new \InvalidArgumentException(sprintf('File %s did not exist', $fileSource));
        }

        $this->handle = fopen($fileSource, 'r');

        $this->storage = $storage;
    }

    /**
     * @inheritdoc
     */
    public function loadWords()
    {
        if (!$this->handle) {
            throw new \Exception("Source did not set");
        }

        $buffer = fgets($this->handle);
        $words = explode(' ', $buffer);

        foreach ($words as $word) {
            $this->storage->addWord($word);
        }
        fclose($this->handle);
    }
}