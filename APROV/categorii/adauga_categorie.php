<?php
    session_start();

    include("../conectare.php");

    if(isset($_POST["actionare"])){
        $max = mysqli_fetch_array(mysqli_query($conectare, "SELECT MAX(codC) as maxCC FROM categorie"))["maxCC"] + 1;
        $den = $_POST["den"];
        $desc = $_POST["desc"];

        mysqli_query($conectare, "INSERT INTO categorie (codC, denumire, descriere) VALUES ($max, '$den', '$desc')");
        echo "<p>Categorie adaugata cu succes!</p>";
    } else {
		header("Location: ./index.php");
	}
?>

<body>
    <br>
    <a href="./index.php">Back</a>
</body>