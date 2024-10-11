<p align='center'>
  <img src='baner.jpg'>
</p>
<?php

  $strona1 = "<big><a href=\"wwk1.php\"> strona 1 </a></big>";
  $strona2 = "<big><a href=\"wwk2.php\"> strona 2 </a></big>";
  $strona3 = "<big><a href=\"wwk3.php\"> strona 3 </a></big>";    
  
  switch ($page_number)
  {
    case 1:
      $strona1 = "<b>" . $strona1 . "</b>";
      break;
    case 2:
      $strona2 = "<b>" . $strona2 . "</b>";
      break;
    case 3:
      $strona3 = "<b>" . $strona3 . "</b>";
      break;        
  }   

  echo "<p align='center'>";
  echo $strona1;
  echo $strona2;
  echo $strona3;      
  echo "</p>";       

?>

