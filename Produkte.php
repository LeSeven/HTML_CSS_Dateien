<?php

function JSON($datei)
{ #lädt eine JSON datei
  return json_decode(file_get_contents($datei));
}

function resolve($pfad)
{ #pfad relativ auflösen
  if ($_SERVER[REQUEST_URI]=="/") {
      return $pfad;
  } else {
      return "../".$pfad;
  }
}

function ProduktListe($liste)
{ #akzeptiert eine liste von produkten und gibt eine html liste aus
  ?>
  <div class="products">
    <?php
    foreach ($liste as $daten) { #$liste as $id => $inhalt
      $desc=nl2br($daten->description); ?>
      <div class="product-box jumbotron">
        <div class="img-div">
          <img src="<?php echo "$daten->img"; ?>" />
        </div>
        <div>
          <h2 class="name"><?php echo "$daten->name"; ?></h2>
          <h4 class="description"><?php echo"$desc"; ?></h4>
          <div class="right">
            <h3 style="color:red;margin:0 !important;margin-top: 8px !important;"><?php echo "$daten->price"; ?></h3>
            <a onclick="warenkorb('add','<?php echo "$daten->id"; ?>')" class="btn btn-primary"><i class="fa fa-cart-plus"></i> In den Warenkorb</a>
          </div>
        </div>
      </div>
      <?php

    } ?>
  </div>
  <?php

}

$ids=array(); //id => product

foreach (array("Grafikkarte/karten.json") as $file) { #für jede datei
  foreach (JSON(resolve($file)) as $pr) { #laden und alle product ids zu weisen
    $ids[$pr->id]=$pr;
  }
}

$warenkorb=getarray("warenkorb");

$warenkorb_produkte=array();

foreach ($warenkorb as $produkt) {
    $warenkorb_produkte[]=$ids[$produkt]; #hole produkt informationen
}

?>
