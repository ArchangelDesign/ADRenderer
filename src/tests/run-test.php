<?php
/**
 * @author Rafal Martinez-Marjanski
 * @copyright www.archangel-design.com
 */

$totalFailures = 0;
$totalPasses = 0;

function failTest($test, $message)
{
    global $totalFailures;
    $totalFailures++;
    ad_printf("[FAILURE] $test failed with message: $message");
}

function passTest($test)
{
    global $totalPasses;
    $totalPasses++;
    ad_printf("[OK] $test");
}

function ad_printf($message)
{
    echo date('H:i:s') . " | $message\n";
}

include __DIR__ . '/src/autoload.php';

$tests = scandir(__DIR__ . '/src/');

array_walk($tests, function($test) {
    if ($test == '.' || $test == '..' || $test == 'autoload.php') {
        return;
    }
    ad_printf("running test $test");
    try {
        $result = include __DIR__ . '/src/' . $test;
    } catch (Exception $e) {
        failTest($test, $e->getMessage());
    }

    if (!is_bool($result)) {
        failTest($test, 'Invalid test result');
        return;
    }
    if ($result) {
        passTest($test);
    }
});