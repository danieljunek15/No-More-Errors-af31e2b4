<?php
$array = $argv[1];

function ErrorVanger($array) {                                                                     //errorVanger zoekt met try throw and cach een error vind ie hem niet laat ie je door
    try{                                                                                           //try zecht gwn probeer dit eerst
        if($array < 0){                                                                            //if statement dat checkt if de input lager is dan 0
            throw new Exception("Je kan geen negatieve getallen wisselen.");                       //deze regel smijt met exception naar catch
        }
        else if(empty($array)){                                                                    //else if statement
            throw new Exception("je hebt geen bedrag meegegeven dat omgewiseld dient te worden."); //deze smijt ook
        }
        else if(!is_numeric($array)){                                                              //else if statement dat kijkt of er text in zit ja of te nee 
            throw new Exception("je hebt geen geldig bedrag op gegeven.");                         //deze smijt ook
        }
    }
    catch(Exception $error){
        echo "> Een Error:";
        throw $error;
    }
}

try {
    echo ErrorVanger($array);
}

catch(Exception $error){
    echo  PHP_EOL . "> " . $error->getMessage();
    exit;
}


$input = round($array, 2);
$valueMoney = array(
    50,
    20,
    10,
    5,
    2,
    1,
    0.50,
    0.20,
    0.10,
    0.05
    );
$money = round($input / 0.05) * 0.05;

if(!$money == 0){
    foreach($valueMoney as $valueMoney2){
        $money = round($money, 2);
        $floorCheck = floor($money / $valueMoney2);
        if(!$floorCheck == 0){
            echo "$floorCheck x $valueMoney2".PHP_EOL;
            $money = $money - ($floorCheck * $valueMoney2);
        }
    }
exit;
}

else {
    exit ("Error: Geen wissel geld.");
}