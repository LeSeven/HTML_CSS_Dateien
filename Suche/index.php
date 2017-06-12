<?php include "../header.php"; ?>
<?php
$ergebnisse=array();
function suche($produkt,$text) {
  $gefunden=false;
  foreach ($produkt as $str) {
    echo $str;
    if (strpos($text,$str)) {
      $gefunden=true;
    }
  }
  return $gefunden;
}
foreach($ids as $produkt) {
  if (suche($produkt,$_GET[suche])) {
    $ergebnisse[]=$produkt;
  }
}
ProduktListe($ergebnisse);
?>
<?php include "../footer.php"; ?>
