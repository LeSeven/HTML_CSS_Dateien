<?php
if (isset($_POST[opt])) { #wenn befehl vom client kommt (siehe header.php)
  include "../Cookie.php";
  include "../Produkte.php";
  switch ($_POST[opt]) {
    case "add":
      if (!array_search($_POST[id], $warenkorb)) {
          $warenkorb[]=$_POST[id];
      }
      break;
    case "rm":
      if (array_search($_POST[id], $warenkorb)) {
          unset($warenkorb[array_search($_POST[id], $warenkorb)]);
      }
      break;
  }
  setarray("warenkorb", $warenkorb);
} else { #andernfalls warenkorb anzeigen
  include "../header.php";
if (sizeof($warenkorb_produkte)) { #produkte
  ?>
    <h2><?php echo sizeof($warenkorb_produkte); ?> Produkt(e) im Warenkorb</h2>
  <?php
} else {
  ?>
    <h2>Warenkorb ist leer</h2>
  <?php
}
  ProduktListe($warenkorb_produkte,$warenkorb);
  include "../footer.php";
}
