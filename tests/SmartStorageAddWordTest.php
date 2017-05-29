<?php

namespace Vigo5190;

use Vigo5190;

class SmartStorageAddWordTest extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();
        $storage->addWord('Foo');

        $this->assertCount(1, $storage->getAllWords());
        $this->assertCount(1, $storage->getWordsWithSpecificSizeOrDelta(3, 0));
    }

    public function test2()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();
        $storage->addWord('Foo');
        $storage->addWord('Bar');

        $this->assertCount(2, $storage->getAllWords());
        $this->assertCount(2, $storage->getWordsWithSpecificSizeOrDelta(3, 0));
    }

    public function test4()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();
        $storage->addWord('Foo');
        $storage->addWord('Bar');
        $storage->addWord('FooBar');

        $this->assertCount(3, $storage->getAllWords());
        $this->assertCount(2, $storage->getWordsWithSpecificSizeOrDelta(3, 0));
        $this->assertCount(1, $storage->getWordsWithSpecificSizeOrDelta(6, 0));
        $this->assertCount(1, $storage->getWordsWithSpecificSizeOrDelta(3, 3));
    }
}