<?php

namespace Vigo5190\Vocabulary;


class FileLoader implements LoaderInterface
{
    /**
     * @var StorageInterface
     */
    private $storage;

    private $handle;

    public function __construct(StorageInterface $storage)
    {
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

        while (($buffer = fgets($this->handle)) !== false) {
            $this->storage->addWord($buffer);
        }
        if (!feof($this->handle)) {
            throw new \Exception("Error: unexpected fgets() fail");
        }
        fclose($this->handle);
    }

    /**
     * @inheritdoc
     */
    public function setSource($fileSource): LoaderInterface
    {
        if (!(is_readable($fileSource))) {
            throw new \InvalidArgumentException(sprintf('File %s did not exist', $fileSource));
        }

        $this->handle = fopen($fileSource, 'r');

        return $this;
    }
}