<?php
$bigData = [5,32,56,12,6,15,21,34,61,22,32,88,11,4,2,43,3,32,66,53,37];


function testGen(array $bigData) : Generator
{
    foreach ($bigData as $bigDatum) {
        $bigDatum = round($bigDatum * 9 / 156, 2);
        print_r('alo' . "<br>");

        yield $bigDatum;
    }
}

function testGen2(array $bigData) : Generator
{
    yield from testGen($bigData);
    foreach ($bigData as $bigDatum) {
        $bigDatum = round($bigDatum * 9 / 156, 2);
        print_r('alo' . "<br>");
        yield $bigDatum;
    }

    return 1223;
}

$formatBigData = testGen2($bigData);
print_r('1d12d' . "<br>");

foreach ($formatBigData as $datum) {
    print_r($datum . "<br>");
}

echo $formatBigData->getReturn();

 die;