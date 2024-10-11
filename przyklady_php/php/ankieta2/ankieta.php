<?php
  //obsługa bazy
  $db=mysql_connect("localhost","mysqltest","1234") or die('Nie można się połączyć: ' . mysql_error());
  mysql_select_db('ankieta') or die ('Nie mozna wybrać bazy danych');
  $update = "UPDATE kolory set ilosc_glosow = ilosc_glosow + 1 where kolor = '".$_POST["kolor"]."'";
  $wynik = mysql_query($update) or die ('Zapytanie zakończone niepowodzeniem: ' . mysql_error());  
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<TITLE>test PHP</TITLE>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</HEAD>
<BODY>
<H2>Twój wybór:</H2>
<?php
  echo $_POST["kolor"]; 
?>  
<H2>Wyniki ankiety:</H2>   
<img src="obrazek.php">
</BODY>
</HTML>



