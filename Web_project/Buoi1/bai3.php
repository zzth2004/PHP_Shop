<html>
    <head>
        <title>BaiTap3</title>
    </head>
    <body>
        <?php
        $dayofweek= date('w');
        $dayname = date('l');
        $currentTime =date('h:i:sa');
        echo "Today is " . date("Y/m/d")."<br>";
        echo "Today is " . date("Y.m.d")."<br>";
        echo "Today is " . date("Y-m-d")."<br>";
        echo "Today is " . date("l")."<br>";
        echo "The time is ".$currentTime;

        ?>
    </body>
</html>