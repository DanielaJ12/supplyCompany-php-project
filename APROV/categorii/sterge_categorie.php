<?php
    session_start();

    include("../conectare.php");

    if(isset($_GET["actionare"])){
        mysqli_query($conectare, "DELETE FROM categorie WHERE codC='".$_GET["cat_sel"]."'");
    
        echo "Categoria a fost stearsa cu succes!<br>";
    }  else {
		header("Location: ./index.php");
	}
?>

<body>
    <br>
    <a href="./index.php">Back</a>
</body>