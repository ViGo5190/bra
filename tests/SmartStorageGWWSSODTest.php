<?php

namespace Vigo5190;

use Vigo5190;

class SmartStorageGWWSSODTest extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/data/vocabulary_smart_1.txt')->loadWords();
        $this->assertCount(2, $storage->getWordsWithSpecificSizeOrDelta(3, 0));
        $this->assertCount(4, $storage->getWordsWithSpecificSizeOrDelta(3, 1));
        $this->assertCount(4, $storage->getWordsWithSpecificSizeOrDelta(3, 2));
        $this->assertCount(2, $storage->getWordsWithSpecificSizeOrDelta(5, 2));
        $this->assertCount(0, $storage->getWordsWithSpecificSizeOrDelta(5, 5));
    }

    public function test2()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/data/vocabulary_smart_2.txt')->loadWords();
        $this->assertCount(0, $storage->getWordsWithSpecificSizeOrDelta(3, 0));
        $this->assertCount(0, $storage->getWordsWithSpecificSizeOrDelta(4, 0));
        $this->assertCount(1, $storage->getWordsWithSpecificSizeOrDelta(5, 0));
        $this->assertCount(0, $storage->getWordsWithSpecificSizeOrDelta(6, 0));
        $this->assertCount(0, $storage->getWordsWithSpecificSizeOrDelta(7, 1));
        $this->assertCount(1, $storage->getWordsWithSpecificSizeOrDelta(7, 2));
        $this->assertCount(1, $storage->getWordsWithSpecificSizeOrDelta(4, 1));
    }

    public function test3()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/data/vocabulary_smart_3.txt')->loadWords();
        $this->assertCount(1, $storage->getWordsWithSpecificSizeOrDelta(7, 0));
        $this->assertCount(1, $storage->getWordsWithSpecificSizeOrDelta(5, 0));
        $this->assertCount(0, $storage->getWordsWithSpecificSizeOrDelta(6, 0));
        $this->assertCount(2, $storage->getWordsWithSpecificSizeOrDelta(6, 1));
    }
}