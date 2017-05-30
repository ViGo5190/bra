<?php

namespace Vigo5190;

use Vigo5190;

class StringArrayVsStringSmartDistanceCalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDistance1()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/data/vocabulary_dc_1.txt')->loadWords();
        $dc = new Vigo5190\Levenshtein\StringArrayVsStringSmartDistanceCalculator($storage);

        $this->assertEquals(1, $dc->getDistance('AB'));
        $this->assertEquals(0, $dc->getDistance('A'));
        $this->assertEquals(0, $dc->getDistance('QWERTYUIOP'));
        $this->assertEquals(3, $dc->getDistance('QWERTYUIOPQWE'));
        $this->assertEquals(4, $dc->getDistance('WERTYUIOPQWE'));
        $this->assertEquals(6, $dc->getDistance('WERTYOPQWE'));
    }

    public function testGetDistance2()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/data/vocabulary_dc_2.txt')->loadWords();
        $dc = new Vigo5190\Levenshtein\StringArrayVsStringSmartDistanceCalculator($storage);

        $this->assertEquals(3, $dc->getDistance('A'));
        $this->assertEquals(10, $dc->getDistance('AAAAAAAAAAAAAA'));
        $this->assertEquals(0, $dc->getDistance('AAAA'));
    }

    public function testGetDistance3()
    {
        $storage = new Vigo5190\Vocabulary\SmartStorage();

        $reader = new Vigo5190\Vocabulary\FileLoader($storage);

        $reader->setSource(__DIR__ . '/../data/vocabulary.txt')->loadWords();
        $dc = new Vigo5190\Levenshtein\StringArrayVsStringSmartDistanceCalculator($storage);

        $this->assertEquals(2, $dc->getDistance('c'));
        $this->assertEquals(2, $dc->getDistance('v'));
        $this->assertEquals(1, $dc->getDistance('coforming'));
        $this->assertEquals(2, $dc->getDistance('cofrming'));
        $this->assertEquals(2, $dc->getDistance('miickels'));
        $this->assertEquals(16, $dc->getDistance('nnecmbvxauvbpmevovyzrwb'));
    }

}