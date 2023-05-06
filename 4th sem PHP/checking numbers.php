<?php


    function isEven($num){
        if($num%2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    function isPrime($num){
        for($i=2; $i<$num; $i++){
            if($num%$i == 0){
                return false;
            }
        }
        return true;
    }

    function isPallindrome($num){
        $rev = 0;
        $original = $num;
        while($num > 1){
            $rem = $num%10;
            $rev = $rev * 10 + $rem;
            $num = $num/10;
        }
        if($rev == $original){
            return true;
        }
        else{
            return false;
        }
    }

    function isArmstrong($num) {
        $count = 0;
        $original = $num;
        $arms = 0;
        while($num>1){
            $num = $num/10;
            $count++;
        }
        $num = $original;
        while($num>1){
            $rem = $num%10;
            $arms += pow($rem, $count);
            $num = $num/10;
        }
        if($arms == $original)
            return true;
        else
            return false;
    }

    function genFibonaciiSeries($num){
        $arr = [0, 1];
        for($i=0; $i<=$num; $i++){
            $j = $i+1;
            array_push($arr, $arr[$i]+$arr[$j]);
            if($arr[$i]>100){
                break;
            }
        }
        return $arr;
        
    }

    $marks = [];
    for($i=0; $i<100; $i++){
        array_push($marks, rand(5,100));
    }

?>

<html>
    <head>
        <title>Numbers</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                padding: 2rem;

            }
            form{
                width: 15rem;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
            .output{
                width: fit-content;
                margin-top: 1rem;
                border: 1px solid red;
                padding: 1rem;
            }
        </style>
    </head>

    <body>
        <form action="" method="get">
            <input type="number" name="number" autocomplete="off">
            <input type="submit" value="Submit" name="submit">
        </form>

        <div class="output">
            <?php
                    if(isset($_GET['submit'])){
                        if($_GET['number']>0){
                            $num = $_GET['number'];
                            echo ("the number is ");
                            echo "adding with 10 : ". $num + 10;
                            echo isEven($num)? "<br>Even" : "<br>Odd";
                            echo isPrime($num)? "<br>Prime" : "<br>Composite";
                            echo (isArmstrong($num))? "<br>Armstrong" : "<br>Not Armstrong";
                            echo("<br>Fibonacii series till 100 or num:" );
                            $arr = genFibonaciiSeries($num);
                            foreach($arr as $item){
                                if($item < 100)
                                    echo $item . " , ";
                            }

                            echo "<br><br>From given number: ";
                            foreach($marks as $item){
                                echo $item." , ";
                            }
                            for($i=0; $i<99; $i++){
                                for($j = $i + 1; $j<99; $j++){                                
                                    if($marks[$i]>$marks[$j]){
                                        $temp = $marks[$i];
                                        $marks[$i] = $marks[$j];
                                        $marks[$j] = $temp;
                                    }
                                }
                            }
                            echo "<br><br> ascending change: ";
                            $count = 0;
                            for($i=0; $i<99; $i++){
                                echo($marks[$i] . " , ");
                                if($marks[$i]>=60 && $marks[$i]<=70){
                                    $count++;
                                }
                            }
                            echo "<br><p>count of 60 -70 is: $count</p>";
                        }
                    }
            ?>
        </div>
    </body>
</html>
