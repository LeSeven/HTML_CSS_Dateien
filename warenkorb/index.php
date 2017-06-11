<?php
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
