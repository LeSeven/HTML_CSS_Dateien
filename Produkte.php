<?php

function JSON($datei)
{ #lädt eine JSON datei
  return json_decode(file_get_contents($datei));
}

function resolve($pfad)
{ #pfad relativ auflösen
  if (file_exists($pfad)) {
      return $pfad;
  } else {
      return "../".$pfad;
  }
}

function ProduktListe($liste,$alle)
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
        <div class="product-info">
          <div>
            <h2 class="name"><?php echo "$daten->name"; ?></h2>
            <h4 class="description"><?php echo"$desc"; ?></h4>
          </div>
          <div align="right" class="right">
            <h3 style="color:red;margin:0 !important;margin-top: 8px !important;"><?php echo "$daten->price"; ?></h3>
            <?php if (array_search($daten->id,$alle)) {
              ?>
              <a onclick="warenkorb('rm','<?php echo "$daten->id"; ?>')" class="btn btn-danger"><i class="fa fa-times"></i> Entfernen</a>
              <?php
            } else {
              ?>
              <a onclick="warenkorb('add','<?php echo "$daten->id"; ?>')" class="btn btn-primary"><i class="fa fa-cart-plus"></i> In den Warenkorb</a>
              <?php
            }?>
          </div>
        </div>
      </div>
      <?php

    } ?>
  </div>
  <?php

}

function ProduktListeMini($liste,$alle)
{ #akzeptiert eine liste von produkten und gibt eine kleine html liste aus
  ?>
  <div class="products" style="margin:6px;">
    <?php
    foreach ($liste as $daten) { #$liste as $id => $inhalt
      $desc=nl2br($daten->description); ?>
      <div class="pmini" style="background: #EEE;display:flex;padding:6px;">
        <div class="img-div-mini">
          <img src="<?php echo "$daten->img"; ?>" />
        </div>
        <div class="product-info-mini">
          <span><?php echo "$daten->name"; ?></span>
          <h5 style="color:red;margin:0 !important;margin-top: 8px !important;"><?php echo "$daten->price"; ?></h5>
          <a onclick="warenkorb('rm','<?php echo "$daten->id"; ?>')" class="btn btn-danger"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <?php

    } if (sizeof($alle)<2) {
      ?>
      <h4>Warenkorb ist leer</h4>
      <?php
    } ?>
  </div>
  <?php

}

$ids=array(); //id => product

foreach (array("Arbeitsspeicher/Arbeitsspeicher.json","Betriebssystem/Betriebssystem.json","Festplatte/Festplatten.json","Gehäuse/Gehäuse.json","Grafikkarte/Grafikkarten.json","Mainboard/Mainboards.json","Maus/Mäuse.json","Netzteil/Netzteile.json","Prozessor/Prozessoren.json","Tastatur/Tastaturen.json") as $file) { #für jede datei
  foreach (JSON(resolve($file)) as $pr) { #laden und alle product ids zu weisen
    $ids[$pr->id]=$pr;
  }
}

$warenkorb=getarray("warenkorb");

$warenkorb_produkte=array();

foreach ($warenkorb as $produkt) {
    if ($ids[$produkt]) {
      $warenkorb_produkte[]=$ids[$produkt]; #hole produkt informationen
    }
}

function getProdukte() {
  $liste=array();
  foreach($warenkorb_produkte as $pr) {
    $liste[]=$pr->id;
  }
  return $liste;
}

?>
