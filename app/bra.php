<?php
/*
 * INIT
 */
$time_pre = microtime(true);
require __DIR__ . '/../vendor/autoload.php';

const VOCABULARY_PATH = __DIR__ . '/../data/vocabulary.txt';

$showDebugInfo = false;
$inputFilePath = '';

if (isset($argv[1])) {
    $inputFilePath = $argv[1];
}

if (isset($argv[2]) && $argv[2] === 'debug') {
    $showDebugInfo = true;
}

$storage = new Vigo5190\Vocabulary\SmartStorage();

$reader = new Vigo5190\Vocabulary\FileLoader($storage);

$inputStorage = new Vigo5190\Vocabulary\SimpleStorage();

$inputReader = new Vigo5190\InputReader(__DIR__ . '/../' . $inputFilePath, $inputStorage);

$dc = new Vigo5190\Levenshtein\StringArrayVsStringSmartDistanceCalculator($storage);

$app = new Vigo5190\App(
    $storage,
    $inputStorage,
    $reader,
    $inputReader,
    $dc
);

$totalDistance = $app->run();

echo $totalDistance . PHP_EOL;

$time_post = microtime(true);
$exec_time = $time_post - $time_pre;

if ($showDebugInfo) {
    echo PHP_EOL . '---==DEBUG==---' . PHP_EOL;
    echo sprintf('%f seconds', $exec_time) . PHP_EOL;
    echo sprintf('%d MB used. ', getMBFromBytes(memory_get_usage())) . PHP_EOL;
    echo sprintf('%d MB used in peak. ', getMBFromBytes(memory_get_peak_usage())) . PHP_EOL;
}

function getMBFromBytes(int $value): int
{
    return $value / 1024 / 1024;
}