<html>
	<head>
		<link rel="stylesheet"  type="text/css" href="style.css"/>
		<meta charset="utf-8">
		<title>Inscription en ligne</title>
	</head>
	<body>
		<table border="2" class="table">
			<thead>
				<tr>
					<th>Matricule</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Cycle</th>
					<th>Filière</th>
					<th>Niveau</th>
					<th>Sexe</th>
					<th>Date de naissance</th>
					<th>Date d'inscription</th>
					<th colspan="2">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql="SELECT e.ID_Etud, e.Matricule_Etud, e.Nom_Etud, e.Prenom_Etud, c.Libelle_Cycle, f.Libelle_Filiere, n.Libelle_Niveau,
					e.Sexe_Etud, e.Date_Nais_Etud, e.Date_Ins_Etud FROM etudiants e, cycle c, filiere f ,niveau n WHere e.Cycle_ID = c.Cycle_ID AND e.Filiere_ID = f.Filiere_ID AND e.Niveau_ID = n.Niveau_ID ORDER BY ID_Etud";
					$result=mysqli_query($conn, $sql);
					if (mysqli_num_rows($result)> 0){
						$table_content ="";
					while($row=mysqli_fetch_assoc($result)){
						$table_content .=
						"<tr><td>".$row["Matricule_Etud"]
						."</td><td>".$row["Nom_Etud"]
						."</td><td>".$row["Prenom_Etud"]
						."</td><td>".$row["Libelle_Cycle"]
						."</td><td>".$row["Libelle_Filiere"]
						."</td><td>".$row["Libelle_Niveau"]
						."</td><td>".$row["Sexe_Etud"]
						."</td><td>".$row["Date_Nais_Etud"]
						."</td><td>".$row["Date_Ins_Etud"]
						."</td><td><a href=\"modifierEtudiant.php?ID=".$row["ID_Etud"]."\">Modifier</a></td>"
						."</td><td><a href=\"supprimerEtudiant.php?ID=".$row["ID_Etud"]."\"onclick=\"return confirm('Vous voulez vraiment supprimer cet étudiant?')\">Supprimer</a></td></tr>";
						}
						echo $table_content;
				}
				?>
			</tbody>
		</table>
	</body>
</html>	