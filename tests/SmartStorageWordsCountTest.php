<?php

namespace Vigo5190;

use Vigo5190;

class SmartStorageWordsCountTest extends \PHPUnit_Framework_TestCase
{
    public function testWordsCount1()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/data/vocabulary_simple_1.txt')->loadWords();
        $this->assertCount(4, $storage->getAllWords());
    }

    public function testWordsCount2()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/data/vocabulary_simple_2.txt')->loadWords();
        $this->assertCount(4, $storage->getAllWords());
    }

    public function testWordsCount3()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/../data/vocabulary.txt')->loadWords();
        $this->assertCount(178691, $storage->getAllWords());
    }

    public function testWordsCount4()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/data/vocabulary_simple_4.txt')->loadWords();
        $this->assertCount(0, $storage->getAllWords());
    }

}