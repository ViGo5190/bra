<?php

namespace Vigo5190;

use Vigo5190;

class SmartStorageTest extends \PHPUnit_Framework_TestCase
{
    public function testInStorage1()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/../data/vocabulary.txt')->loadWords();
        $this->assertTrue($storage->isWordInStorage('ZWITTERIONIC'));
    }

    public function testInStorage2()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/../data/vocabulary.txt')->loadWords();
        $this->assertFalse($storage->isWordInStorage('ZWITTERIONICQ'));
    }
}