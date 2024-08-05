<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<?php

    $color = $_POST["color"];
    $food = $_POST["food"];
    $hobby = $_POST["hobby"];
    $fear = $_POST["fear"];

    if($color == 'unknown' || $food == 'unknown' || $hobby == 'unknown' || $fear == 'unknown'){
        header("Location: index.php?error=missing");
        exit();   
    }
    else{
        $bart = 0;
        $homer = 0;
        $lisa = 0;
        $marge = 0;

        if ($color == "r"){
            $bart += 1;
        }
        else if ($color == "b"){
            $homer += 1;
        }
        else if ($color == "g"){
            $lisa += 1;
        }
        else{
            $marge += 1;
        }

        if ($food == "p"){
            $bart += 1;
        }
        else if ($food == "i"){
            $homer += 1;
        }
        else if ($food == "c"){
            $lisa += 1;
        }
        else{
            $marge += 1;
        }

        if ($hobby == "w"){
            $bart += 1;
        }
        else if ($hobby == "k"){
            $homer += 1;
        }
        else if ($hobby == "s"){
            $lisa += 1;
        }
        else{
            $marge += 1;
        }

        if ($fear == "s"){
            $bart += 1;
        }
        else if ($fear == "f"){
            $homer += 1;
        }
        else if ($fear == "fl"){
            $lisa += 1;
        }
        else{
            $marge += 1;
        }

        if ($bart > $homer && $bart > $lisa && $bart > $marge){
            $char = "Bart";
        }
        else if($homer > $bart && $homer > $lisa && $homer > $marge){
            $char = "Homer";
        }
        else if($lisa > $bart && $lisa > $homer && $lisa > $marge){
            $char = "Lisa";
        }
        else{
            $char = "Marge";
        }

        $filename = getcwd()."/data/result.txt";
        $data = $char."\n";
        file_put_contents($filename,$data,FILE_APPEND);

        setcookie('character',$char);

        header("Location: quiz_results.php");
    }

?>