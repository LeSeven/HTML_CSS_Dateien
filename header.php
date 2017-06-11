<?php
include "Cookie.php";
include "Produkte.php";
?>


<!DOCTYPE html>
<html lang="de">
<head>
  <title>[PC KINGS]</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/bootstrap-hover-dropdown.min.js"></script>
  <script>
    function warenkorb(opt,id) {
      $.ajax({
        type:"POST",
        url:"/warenkorb",
        data:{
          opt,id
        },
        success:() => window.location.reload()
      })
    }
  </script>
</head>
<body>

<div class="container">
<nav class="navbar navbar-inverse">
   <div class="container-fluid">
     <div class="navbar-header">
       <a class="navbar-brand" href="/">PC KINGS</a>
     </div>
     <ul class="nav navbar-nav">

       <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10" data-close-others="false">
             Hardware <b class="caret"></b>
         </a>
         <ul class="dropdown-menu">
           <li><a href="/Arbeitsspeicher">Arbeitsspeicher</a></li>
           <li><a href="/Festpatte">Festpatte</a></li>
           <li><a href="/Grafikkarte">Grafikkarte</a></li>
           <li class="divider"></li>
           <li><a href="/Mainboard">Mainboard</a></li>
           <li><a href="/Netzteil">Netzteil</a></li>
           <li><a href="/Prozessor">Prozessor</a></li>
         </ul>
     </li>

     <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10" data-close-others="false">
           Zubehör <b class="caret"></b>
       </a>
       <ul class="dropdown-menu">
         <li><a href="/Betriebssystem">Betriebssystem</a></li>
         <li><a href="/Gehäuse">Gehäuse</a></li>
         <li class="divider"></li>
         <li><a href="/Maus">Maus</a></li>
         <li><a href="/Tastatur">Tastatur</a></li>
       </ul>

         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10" data-close-others="false">
                Warenkorb <i class="fa fa-shopping-cart"></i>
           </a>
           <ul class="dropdown-menu">
             <?php
             foreach($warenkorb_produkte as $produkt) {
               ?>
               <li><a><?php echo "$produkt->name"; ?></a></li>

               <?php
             }
             ?>
           </ul>
       </li>
   </li>

     </ul>
     <form class="navbar-form navbar-right">
       <a class="btn btn-primary" href="/Kontakt">Kontakt</a>
       <div class="form-group">
         <input type="text" class="form-control" placeholder="Search">
       </div>
       <button type="submit" class="btn btn-default">Submit</button>
     </form>
   </div>
 </nav>
 <div class="container">
