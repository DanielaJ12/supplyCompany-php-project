<?php
    include("../conectare.php");
    
    if(isset($_GET["actionare"])) {
        mysqli_query($conectare, "DELETE FROM produs WHERE codProdus=".$_GET["prd_sel"]);
        echo "<p>Produsul a fost sters cu success!</p>";
    }  else {
		header("Location: ./index.php");
	}
?>

<body>
    <br>
    <a href="./index.php">Back</a>
</body>