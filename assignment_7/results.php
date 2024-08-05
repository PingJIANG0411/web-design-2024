<?php 
    $filename = 'data/result.txt';
    $result = trim(file_get_contents($filename));
    $results = explode("\n", $result);

    $total_submissions = 0;
    $bart = 0;
    $homer = 0;
    $lisa = 0;
    $marge = 0;

    for ($i = 0; $i < sizeof($results); $i++) {
        $total_submissions += 1;
        if ($results[$i] == 'Bart' ) {
            $bart += 1;
        }     
        else if ($results[$i] == 'Homer' ) {
            $homer += 1;
        }     
        else if ($results[$i] == 'Lisa' ) {
            $lisa += 1;
        }   
        else{
            $marge += 1;
        }

    }

    $bartp = number_format(($bart / $total_submissions) * 100, 2);
    $homerp = number_format(($homer / $total_submissions) * 100, 2);
    $lisap = number_format(($lisa / $total_submissions) * 100, 2);
    $margep = number_format(($marge / $total_submissions) * 100, 2);

    ?>


<!doctype html>
<html>
    <head>
        <title>Macro 7</title>
        <style>
        body {
            font-family: Arial;
            background-color: lightgrey;
            margin: 10px;
            padding: 0;
        }
        .character-bar {
            height: 100px;
            margin-left: 10px;
            margin-bottom: 10px;
            width: 100px;
        }
        </style>
    </head>
    <body>
        <h1>Quiz Results</h1>
        <p>Total submissions: <?php print "$total_submissions"; ?></p>
        <h2>Distribution:</h2>
        <div class="character-bar" style="width: <?php echo $homerp; ?>%; background-color:blue;">
            <p>Homer</p>
            <p><?php print "$homerp"."%"; ?> </p>
        </div>
        <div class="character-bar" style="width: <?php echo $margep; ?>%;background-color:yellow;">
            <p>Marge</p>
            <p><?php print "$margep"."%"; ?> </p>
        </div>
        <div class="character-bar" style="width: <?php echo $bartp; ?>%;background-color:green;">
            <p>Bart</p>
            <p><?php print "$bartp"."%"; ?> </p>
        </div>
        <div class="character-bar" style="width: <?php echo $lisap; ?>%;background-color:pink;">
            <p>Lisa</p>
            <p><?php print "$lisap"."%"; ?> </p>
        </div>

        <p><a href="index.php">Go back to vote again</a></p>
    </body>
</html>