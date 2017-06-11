<?php

function JSON($datei) { #lädt eine JSON datei
  return json_decode(file_get_contents($datei));
}

function ProduktListe($liste) { #akzeptiert eine liste von produkten und gibt eine html liste aus
  ?>
  <div class="products">
    <?php
    foreach($liste as $daten) { #$liste as $id => $inhalt
      $desc=nl2br($daten->description);
      ?>
      <div class="product-box jumbotron">
        <div class="name"><?php echo "$daten->name"; ?></div>
        <div class="description"><?php echo"$desc"; ?></div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
}

?>
