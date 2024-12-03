<?php
$con = mysqli_connect('localhost', 'root', '', 'bdgomycode') or die("echec de connection");
$Code = $_POST['C'];
$NP = $_POST['NP'];
$Tel = $_POST['Tel'];
$dtn = $_POST['dtn'];
$Genre = $_POST['R'];
$email = $_POST['email'];
$NivP = $_POST['rn'];
$opt = $_POST['opt'];
$AEx=$_POST['aex'];
$coul = $_POST['coul'];

$ch = "";

if (isset($_POST["HO1"])) {
    $ch = $ch . $_POST["HO1"] . "|";
}
if (isset($_POST["HO2"])) {
    $ch = $ch . $_POST["HO2"] . "|";
}
if (isset($_POST["HO3"])) {
    $ch = $ch . $_POST["HO3"] . "|";
}

$ch = substr($ch, 0, strlen($ch) - 1);

$op = $_POST["op1"];

if ($op == 1) {
    $sql = "SELECT code FROM stagiaire WHERE code='$Code'";
    $result = mysqli_query($con, $sql) or die("echec dans la table");

    if (mysqli_num_rows($result) > 0) {
        echo 'stagiaire déjà enregistré';
    } else {
        $sql1 = "INSERT INTO stagiaire VALUES ('$Code','$NP','$Tel','$dtn','$Genre','$email','$NivP','$AEx','$opt','$ch','$coul')";
        $result1 = mysqli_query($con, $sql1);
        if ($result1) {
            echo "ajout effectué avec succès";
        } else {
            echo "erreur lors de l'ajout du stagiaire";
        }
    }
}

if ($op == 2) {
    $res = mysqli_query($con, "SELECT Code FROM stagiaire WHERE Code='$Code'");

    if (mysqli_num_rows($res) == 0) {
        echo "Nous n'avons pas de stagiaire avec ce code";
    } else {
        $sql2 = "UPDATE stagiaire SET Nom_Prenom='$NP', Tel='$Tel', Date_Naiss='$dtn', Genre='$Genre', Email='$email', Niv_P='$NivP', An_Ex='$AEx', Coul_P='$coul' WHERE Code='$Code'";
        $id_exec = mysqli_query($con, $sql2);

        if ($id_exec) {
            echo "Stagiaire modifié avec succès";
        } else {
            echo "Erreur lors de la modification du stagiaire";
        }
    }
}

mysqli_close($con);
?>







