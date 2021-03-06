<?php
include "../data.php";
session_start();

if (isset($_SESSION["spectatorID"])) {

  $spectatorID = unserialize($_SESSION["spectatorID"]);
  $worldCup = unserialize($_SESSION["worldCup"]);

  $spectator = $worldCup->getSpectator($spectatorID);

  $urlID = str_replace(" ", "space", $spectatorID);
  if ($worldCup->addSpectatorToEvent($_POST["eventType"], $spectator, $spectatorID)) {
    echo "<script> alert('Publikummer er nå påmeldt til øvelsen!') </script>";
  }

  ?>
  <head>
    <link rel="stylesheet" href="../style.css" type="text/css">
    <meta http-equiv="refresh" content="0; url=/oblig3/spectator/<?php echo "spectator.php?".$urlID?>"/>;
  </head>

<?php } else {
  include "../error.php";
}
