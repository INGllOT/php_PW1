<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#FF9966" vlink="#FF9966" alink="#FFCC99">
    <?php
        echo "Tablica pierwsza<br>";
        $tablica['klucz'] = 'wartośd';
        $tablica[0] = 'wartośd2';
        var_export($tablica);
        echo "<br><br>Tablica druga<br>";
        $tablica2[] = 'wartośd nr 1';
        $tablica2[] = 'wartośd nr 2';
        $tablica2[] = 'wartośd nr 3';
        var_export($tablica2);     
?>
</body>
</html>



