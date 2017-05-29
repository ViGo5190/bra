<?php

namespace Vigo5190;

use Vigo5190;

class InputReaderTest extends \PHPUnit_Framework_TestCase
{
    public function testWordsCount1()
    {
        $inputStorage = new Vigo5190\Vocabulary\SimpleStorage();

        $inputReader = new Vigo5190\InputReader(__DIR__ . '/data/input.txt', $inputStorage);
        $inputReader->loadWords();

        $this->assertCount(6, $inputStorage->getAllWords());
    }

    public function testWordsCount2()
    {
        $inputStorage = new Vigo5190\Vocabulary\SimpleStorage();

        $inputReader = new Vigo5190\InputReader(__DIR__ . '/data/input2.txt', $inputStorage);
        $inputReader->loadWords();

        $this->assertCount(147, $inputStorage->getAllWords());
    }

    public function testWordsCount3()
    {
        $inputStorage = new Vigo5190\Vocabulary\SimpleStorage();

        $inputReader = new Vigo5190\InputReader(__DIR__ . '/data/input3.txt', $inputStorage);
        $inputReader->loadWords();

        $this->assertCount(3, $inputStorage->getAllWords());
    }

    public function testWordsCount4()
    {
        $inputStorage = new Vigo5190\Vocabulary\SimpleStorage();

        $inputReader = new Vigo5190\InputReader(__DIR__ . '/data/input4.txt', $inputStorage);
        $inputReader->loadWords();

        $this->assertCount(3, $inputStorage->getAllWords());
    }
}