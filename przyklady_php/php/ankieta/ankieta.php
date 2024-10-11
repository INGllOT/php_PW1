<?php
  echo <<<HTML
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <HTML>
    <HEAD>
    <TITLE>test PHP</TITLE>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" >
    </HEAD>
    <BODY>
    <H2>Twój wybór:</H2>
HTML;

  echo $_POST["kolor"];

  //obsługa bazy
  $db=mysql_connect("localhost","mysqltest","1234") or die('Nie można się połączyć: ' . mysql_error());
  mysql_select_db('ankieta') or die ('Nie mozna wybrać bazy danych');
  $update = "UPDATE kolory set ilosc_glosow = ilosc_glosow + 1 where kolor = '".$_POST["kolor"]."'";
  $wynik = mysql_query($update) or die ('Zapytanie zakończone niepowodzeniem: ' . mysql_error());
    
  $select = "Select kolor,ilosc_glosow from kolory";
  $wynik = mysql_query($select) or die ('Zapytanie zakończone niepowodzeniem: ' . mysql_error());
  
  while ($wiersz = mysql_fetch_assoc($wynik)) {
      $tablica_glosow[$wiersz["kolor"]] = $wiersz["ilosc_glosow"];
  }
  
  $pasekDlugosc = 400;
  $pasekWysokosc = 10;
  $maxPasek = max($tablica_glosow);

  echo <<<HTML
    <H2>Wyniki ankiety:</H2>   
    <div style="width: 500px; border: solid 2px navy">
    <table cellpadding=0 cellspacing=0 border=0>
    <caption>Wynik ankiety</caption>
HTML;
  
  foreach($tablica_glosow as $kolor=>$glosy){
    $dlugoscPaskaKoloru = intval($pasekDlugosc*$glosy/$maxPasek);
    echo <<<HTML
      <tr>
        <td width=100>
          $kolor ($glosy)
        </td>
        <td>
          <img src="dot.jpg" width="$dlugoscPaskaKoloru" height="$pasekWysokosc" style="border: 2px white solid;"><br> 
        </td>
      </tr>
HTML;
  }
  
  echo "</table></div>";

  mysql_free_result($result);
?>

</BODY>
</HTML>

