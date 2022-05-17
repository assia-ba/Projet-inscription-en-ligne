<?php
    include "conn.php" ;

    if(isset($_GET["ID"])){
        $idm = mysqli_real_escape_string($conn,$_GET["ID"]);
        $sql = "SELECT * FROM etudiants WHERE ID_Etud=$idm";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $Matricule=$row["Matricule_Etud"];
            $Nom=$row["Nom_Etud"];
            $Prenom=$row["Prenom_Etud"];
            $ID_Cycle=$row["Cycle_ID"];
            $ID_Filiere=$row["Filiere_ID"];
            $ID_Niveau=$row["Niveau_ID"];
            $Sexe=$row["Sexe_Etud"];
            $DateN=$row["Date_Nais_Etud"];
            $DateI=$row["Date_Ins_Etud"];
        } 
    

        $sql = "SELECT * FROM cycle WHERE Cycle_ID=$ID_Cycle";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $cycle=$row["Libelle_Cycle"];
        }

        $sql = "SELECT * FROM filiere WHERE Filiere_ID=$ID_Filiere";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $filiere=$row["Libelle_Filiere"];
        }

        $sql = "SELECT * FROM niveau WHERE Niveau_ID=$ID_Niveau";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $niveau=$row["Libelle_Niveau"];
        }
    }

    if(!empty($_GET["ID"])){  
        if (isset($_POST["Modifier"]) ){
            
            $Matricule2=$_POST["Matricule"];
            $Nom2=$_POST["Nom"];
            $Prenom2=$_POST["Prenom"];
            $ID_Cycle2=$_POST["Cycle"];
            $ID_Filiere2=$_POST["Filiere"];
            $ID_Niveau2=$_POST["Niveau"];
            $Sexe2=$_POST["Sexe"];
            $DateN2=$_POST["DateN"];
            $DateI2=$_POST["DateI"];

            $sql = "update  etudiants set Matricule_Etud='{$Matricule2}' , Nom_Etud='{$Nom2}', Prenom_Etud='{$Prenom2}', Cycle_ID='{$ID_Cycle2}'
            , Filiere_ID='{$ID_Filiere2}', Niveau_ID='{$ID_Niveau2}', Sexe_Etud='{$Sexe2}', Date_Nais_Etud='{$DateN2}', Date_Ins_Etud='{$DateI2}' WHERE ID_Etud='".$_GET["ID"]."'";
            if (mysqli_query($conn, $sql)) {
                $message2= "L'etudiant a été mis à jour avec succes";
            } 
            else {
                $message2= "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            header("location:index.php?message=$message2"); 
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet"  type="text/css" href="style.css"/>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <header>
            <p align="center"><img src="img.png" width="10%" ></p>
            <p ><h3 align="center"><b>Institut national de statistiques et d'économie appliquée</b></h3></p>
        </header>
        <div class="vertical-menu">
            <a name="accueil" href="index.php">Retour</a>
        </div>
        <form name="Etud" action="" method="post" class="form" >
            <fieldset class="fieldset">
                <h3><legend align="center" class="legend">Modification des informations de l'étudiant</legend></h3>
                <table>
                    <tr>
                        <td>Matricule:</td>
                        <td><input type="texte" name="Matricule" size="15"  maxlength="15" value="<?php echo $Matricule; ?>" required></td>
                        <td> Nom:</td>
                        <td><input type="texte" name="Nom" size="20"  maxlength="15" value="<?php if(isset($Nom)) {echo $Nom;} ?>" required></td>
                        <td>Prenom:</td>
                        <td><input type="texte" name="Prenom" size="20"  maxlength="15" value="<?php if(isset($Prenom)) {echo $Prenom;} ?>" required></td></tr>
                    <tr>
                        <td>Cycle:</td>
                        <td>
                            <select name="Cycle" id="Cycle" required>
                                <option value="<?php  echo $ID_Cycle; ?>"><?php echo $cycle ?></option>
                                <option>Ingenieur</option>
                                <option>Master</option>
                                <option>Doctorat</option>
                            </select>
                        </td>
                        <td>Filière:</td>
                        <td>
                            <select name="Filiere" id="Filiere" required>
                                <option value="<?php  echo $ID_Filiere; ?>"><?php echo $filiere ?></option>
                                <option>Actuariat</option>
                                <option>Stat-eco</option>
                                <option>Stat-demo</option>
                                <option>ROAD</option>
                                <option>DSE</option>
                                <option>DS</option>
                            </select>
                        </td>
                        <td>Niveau:</td>
                        <td>
                            <?php if($niveau == "1A"){ ?>
                                <input type="radio" name="Niveau" value="<?php  echo $ID_Niveau; ?>" checked required>1A
                                <input type="radio" name="Niveau" value="2">2A
                                <input type="radio" name="Niveau" value="3">3A
                                <?php } ?>
                            <?php if($niveau == "2A"){ ?>
                                <input type="radio" name="Niveau" value="1" required >1A
                                <input type="radio" name="Niveau" value="2" checked>2A
                                <input type="radio" name="Niveau" value="3">3A
                                <?php } ?>
                            <?php if($niveau == "3A"){ ?>
                                <input type="radio" name="Niveau" value="1" required>1A
                                <input type="radio" name="Niveau" value="2">2A
                                <input type="radio" name="Niveau" value="3" checked>3A
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date de naissance:</td>
                        <td><input type="date" name="DateN" value="<?php if(isset($DateN)) {echo $DateN;} ?>" required></td>
                        <td>Date d'inscription:</td>
                        <td><input type="date" name="DateI" value="<?php if(isset($DateI)) {echo $DateI;} ?>" required></td>
                        <td>Sexe:</td>
                        <td>
                            <?php if($Sexe == "F"){ ?>
                                <input type="radio" name="Sexe" value="F" checked required >Féminin
                                <input type="radio" name="Sexe" value="M">Masculin
                            <?php } else {?>
                                <input type="radio" name="Sexe" value="F" required>Féminin
                                <input type="radio" name="Sexe" value="M" checked>Masculin
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                <p align="center">
                    <input type="reset" name="Initialiser" value="Initialiser">
                    <input type="submit" name="Modifier" value="Modifier">
                </p>
            </fieldset>
        </form>
    </body>
</html>