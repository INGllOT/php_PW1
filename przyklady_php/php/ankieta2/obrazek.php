<?php

  //obsługa bazy
  $db=mysql_connect("localhost","mysqltest","1234") or die('Nie można się połączyć: ' . mysql_error());
  mysql_select_db('ankieta') or die ('Nie mozna wybrać bazy danych');
   
  $select = "Select kolor,ilosc_glosow from kolory";
  $wynik = mysql_query($select) or die ('Zapytanie zakończone niepowodzeniem: ' . mysql_error());
  
  $liczba_glosow = 0;
  while ($wiersz = mysql_fetch_assoc($wynik)) {
      $tablica_glosow[$wiersz["kolor"]] = $wiersz["ilosc_glosow"];
      $liczba_wszystkich_glosow = $liczba_wszystkich_glosow + $wiersz["ilosc_glosow"];            
  }

  //tworzymy obrazek
  $image = imagecreatetruecolor(400, 210);

  $tablica_kolorow = array("niebieski"=>imagecolorallocate($image, 0, 81, 231),
    "czerwony"=>imagecolorallocate($image, 231, 0, 16),
    "zielony"=>imagecolorallocate($image, 11, 231, 0),
    "inny"=>imagecolorallocate($image, 175, 177, 124),
    "czarny"=>imagecolorallocate($image, 0, 0, 0),
    "bialy"=>imagecolorallocate($image, 255, 255, 255));   

  imagefill($image, 0, 0, $tablica_kolorow["bialy"]);

  $stopniePoczatek = 0;
  $polozenieWPionie = 10;

  foreach($tablica_glosow as $kolor=>$glosy){
      $stopnieKoniec = $stopniePoczatek + $glosy*360/$liczba_wszystkich_glosow;
      imagefilledarc($image, 105, 105, 200, 200, $stopniePoczatek, $stopnieKoniec, $tablica_kolorow[$kolor], IMG_ARC_PIE);      
      imagerectangle($image, 225, $polozenieWPionie, 240, $polozenieWPionie + 15, $tablica_kolorow["czarny"]);
      imagefilltoborder($image, 226, $polozenieWPionie + 2, $tablica_kolorow["czarny"], $tablica_kolorow[$kolor]);
      imagestring($image, 5, 250, $polozenieWPionie , $kolor."(".$glosy.")", $tablica_kolorow["czarny"]);  
      $polozenieWPionie = $polozenieWPionie + 20;
      $stopniePoczatek = $stopnieKoniec;
  }
  
  imageellipse($image, 105, 105, 200, 200, $tablica_kolorow["czarny"]);
  
  // wysyłanie obrazka
  header('Content-type: image/png');
  imagepng($image);
  imagedestroy($image);

?> 
