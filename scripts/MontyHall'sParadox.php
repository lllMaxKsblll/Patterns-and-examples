<?php
$i = 0;
$wins = 0;
$looses = 0;

while ($i < 100){
    $winDoor = rand(1,3);                   //2
//    echo 'выиграшная дверь: ', $winDoor;
//    echo "<br>";
    $choosenDoor = rand(1,3);              //2
//    echo '1й выбор: ', $choosenDoor;
//    echo "<br>";
    for ($excludedDoor = 1; $excludedDoor <= 3; $excludedDoor++){
        if ($excludedDoor != $winDoor && $excludedDoor != $choosenDoor){   //выбираем пустую дверь из оставшихся 2х
//            echo 'исключенная дверь: ', $excludedDoor;
//            echo "<br>";
            for ($k = 1; $k <= 3; $k++){
                if ($k != $choosenDoor && $k != $excludedDoor){            //меняем выбор на другую дверь
                    $choosenDoor = $k;                                     //
//                    echo '2й выбор: ', $choosenDoor;
//                    echo "<br>";
                    if ($choosenDoor == $winDoor){
                        $wins++;
                        $i++;
//                        echo 'победа';
//                        echo "<br>";
//                        echo "<br>";
//                        echo "<br>";
                        continue 3;
                    }else{
                        $looses++;
                        $i++;
//                        echo 'поражение';
//                        echo "<br>";
//                        echo "<br>";
//                        echo "<br>";
                        continue 3;
                    }
                }
            }
        }
    }
}
echo 'wins ' . $wins .'--' . $looses . ' loses';
die;