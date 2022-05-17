<?php
include "conn.php" ;

if(!empty($_GET["ID"])){
	$ids = mysqli_real_escape_string($conn,$_GET["ID"]);
	$sql = "DELETE FROM etudiants WHERE ID_Etud=$ids";
	echo $sql;
	if (mysqli_query($conn, $sql)) {
    	$message= "l'etudiant a été supprimé avec succés";
	} else {
    	$mesasge="Erreur pendant la suppression de l'etudiant: " . mysqli_error($conn);
	}
   header("Location:index.php?message=$message");

}