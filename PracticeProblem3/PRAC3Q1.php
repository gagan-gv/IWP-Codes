<?php
    function getOddOccurences(&$arr, $size){
        $oddOccurences = array();
        
        $count = 0;
        for($ii = 0; $ii < $size; $ii++){
            for($jj = 0; $jj < $size; $jj++){
                if($arr[$ii] == $arr[$jj]){
                    $count++;
                }
            }
            if($count % 2 != 0){
                array_push($oddOccurences, $arr[$ii]);
                $count = 0;
            }
        }
        print_r(array_unique($oddOccurences));
    }

    echo "<h1>Gagan Chordia - 19BCE0788</h1>";

    $file = fopen("q1.txt", "w") or die("Couldn't open the file");
    for($ii = 0; $ii < 20; $ii++){
        $x = rand(1,10);
        fwrite($file, $x);
        fwrite($file, "\n");
    }
    fclose($file);

    $newFile = fopen("q1.txt", "r") or die("Couldn't open the file");
    $arr = array();

    while(!feof($newFile)){
        array_push($arr, fgets($newFile));
    }

    print_r($arr);
    echo "<br><br>";

    $size = sizeof($arr);

    getOddOccurences($arr, $size);
?>