<?php
	include ("conn.php");
	if(isset($_GET["message"])){
		$message=$_GET["message"];
	}


	if(isset($_POST["Ajouter"])){
		echo "<br>";

		$Matricule=$_POST["Matricule"];
		$Nom=$_POST["Nom"];
		$Prenom=$_POST["Prenom"];
		$Cycle=$_POST["Cycle"];
		$Filiere=$_POST["Filiere"];
		$Niveau=$_POST["Niveau"];
		$Sexe=$_POST["Sexe"];
		$DateN=$_POST["DateN"];
		$DateI=$_POST["DateI"];


		$sql="SELECT * FROM cycle WHERE Libelle_Cycle='".$Cycle."'";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		$_Cycle=$row['Cycle_ID'];


		$sql="SELECT * FROM filiere WHERE Libelle_Filiere='".$Filiere."'";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		$_Filiere=$row['Filiere_ID'];


		$sql="SELECT * FROM niveau WHERE Libelle_Niveau='".$Niveau."'";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		$_Niveau=$row['Niveau_ID'];
			
		$sql="INSERT INTO etudiants (Matricule_Etud, Nom_Etud, Prenom_Etud, Cycle_ID, Filiere_ID, Niveau_ID ,Date_Nais_Etud, Date_Ins_Etud, Sexe_Etud, Photo_Etud)
		Values('{$Matricule}','{$Nom}','{$Prenom}', {$_Cycle}, {$_Filiere}, {$_Niveau}, '{$DateN}', '{$DateI}', '{$Sexe}','')";

		if(mysqli_query($conn,$sql)){
			$message="L'inscription est réalisée avec succès!";
		}
		else{
			$message="Erreur".$sql."<br>".mysqli_error($conn);
		}
	}
?>
<!doctype html>
<html lang="fr">
	<head>
		<link rel="stylesheet"  type="text/css" href="style.css"/>
		<meta charset="utf-8">
		<title>Inscription en ligne </title>
	</head>
	<body>
		<header>
			<p align="center"><img src="img.png" width="10%" ></p>
			<p ><h3 align="center"><b>Institut national de statistiques et d'économie appliquée</b></h3></p>
		</header>
		<p align="center" style='color:blue'><?php if (isset($message)){echo"$message";}?></p>
		<form name="Etud" action="index.php" method="post" enctype="multimpart/form-data">
			<fieldset class="fieldset">
				<h3><legend align="center" class="legend">Inscription en ligne</legend></h3>
				<table>
					<tr>
						<td>Matricule:</td>
						<td><input type="texte" name="Matricule" size="15" value="" maxlength="15" required></td>
						<td><br></td>
						<td>Nom:</td>
						<td><input type="texte" name="Nom" size="20" value="" maxlength="15" required></td>
						<td><br></td>
						<td>Prenom:</td>
						<td><input type="texte" name="Prenom" size="20" value="" maxlength="15" required></td>
					</tr>
					<tr>
						<td>Cycle:</td>
						<td>
							<select name="Cycle" id="Cycle" required>
								<option>Ingenieur</option>
								<option>Master</option>
								<option>Doctorat</option>
							</select>
						</td>
						<td><br></td>
						<td>Filière:</td>
						<td>
						<select name="Filiere" id="Filiere" required>
							<option>Actuariat</option>
							<option>Stat-eco</option>
							<option>Stat-demo</option>
							<option>ROAD</option>
							<option>DSE</option>
							<option>DS</option>
						</select></td>
						<td><br></td>
						<td>Niveau:</td>
						<td>
							<input type="radio" name="Niveau" class="radio" value="1A" required>1A
							<input type="radio" name="Niveau" class="radio" value="2A">2A
							<input type="radio" name="Niveau"class="radio"  value="3A">3A
						</td>
					</tr>
					<tr>
						<td>Date de naissance:</td><td><input type="date" name="DateN" required></td>
						<td><br></td>
						<td>Date d'inscription:</td><td><input type="date" name="DateI" required></td>
						<td><br></td>
						<td>Sexe:</td>
						<td>
							<input type="radio" name="Sexe" value="F" required>Féminin
							<input type="radio" name="Sexe" value="M">Masculin
						</td>
					</tr>
				</table>
				<p align="center">
					<input type="reset" name="Initialiser" value="Initialiser">
					<input type="submit" name="Ajouter" value="Ajouter">
				</p>
			</fieldset>
		</form>
		<h3><legend align="center" class="legend">liste des étudiants</legend></h3>
		<?php
		include "ListeEtudiants.php";
		?>
	</body>
 </html>