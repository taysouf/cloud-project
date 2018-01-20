<?php
 
function write_mysql_log($message,$type, $bdd)
{
  $query = "INSERT INTO `log` (`message`, `type`) VALUES (?,?)";
  $stmt = $bdd->prepare($query);
  $data = [$message,$type];
  try {
    $stmt->execute($data);
  } catch (Exception $e) {
    $reponse = "Erreur lors de l'enregistrement du log";
    print_r($reponse);
  }
}

?>