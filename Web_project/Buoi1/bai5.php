<html>
    <head>
        <title> BaiTap5 </title>
    </head>
    <body>
        <?php
        $point =7.6;
        if($point >= 8){
            echo "You are a gifted student<br>";
        }
        else if($point < 8 && $point>6.5)
			echo "You are a good sutdent<br>";
		else 
			echo "You are a normal sutdent<br>";

        $today = date('l');
        switch ($today) 
        {
            case "Monday":
                echo "Today is Monday <br>";
                break;
            case "Tuesday":
                echo "Today is tuesday <br>";
                break;
            case "Wednesday":
                echo "Today is wednesday <br>";
                break;
            case "Thursday" :
                echo "Today is Thursday <br>";
                break;
            case "Friday":
                echo "Today is Friday <br>";
                break;
            case "Saturday" :
                echo "Today is Saturday <br>";
                break;
            case "Sunday":
                echo "Today is the day use for relaxing <br>";
                break;
        }
        $count=5;
        while( $count>0){
            echo $count --."<br>";
        }
        ?>
    </body>
</html>