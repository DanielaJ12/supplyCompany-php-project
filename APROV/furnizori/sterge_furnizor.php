<?php
    include("../conectare.php");

    if(isset($_GET["actionare"])){
        mysqli_query($conectare, "DELETE FROM furnizor WHERE CUI='".$_GET["furn_sel"]."'");
    }else {
		header("Location: ./index.php");
	}
?>
<body>
    <br>
    <a href="./index.php">Back</a>
</body>