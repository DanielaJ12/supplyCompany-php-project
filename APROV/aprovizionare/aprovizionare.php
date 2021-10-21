<?php
    include("../conectare.php");

	if (isset($_POST["actionare"])) {

		$maxNrFact = mysqli_fetch_array(mysqli_query($conectare, "SELECT MAX(nrFact) as maxnr FROM factura"))["maxnr"] + 1;

        $dataEmit = date("Y-m-d");
        $dataScad = date('Y-m-d', strtotime("+30 days"));
        
        $cui = $_POST["furn_sel"];
        $codProd = $_POST["prd_sel"];

        $cantAprov = floatval($_POST["cant"]);
        $pretAchiz = $_POST["pret"];

        mysqli_query($conectare, "INSERT INTO factura (nrFact, dataEmitere, dataScadenta, CUI) VALUES ($maxNrFact, '$dataEmit', '$dataScad', '$cui')");
        mysqli_query($conectare, "INSERT INTO aprovizionare (nrFact, codProdus, cantitateAprov, pretAchiz) VALUES ($maxNrFact, $codProd, $cantAprov, $pretAchiz)");
        mysqli_query($conectare, "UPDATE produs SET stoc=stoc+$cantAprov WHERE codProdus=$codProd");

        echo "<p><b></b>Aprovizionat cu succes!</b></p><p>Pentru produsul '$codProd' au fost adaugate +$cantAprov KG</p>";
	} else {
		header("Location: ./index.php");
	}
?>

<body>
    <a href="./index.php">Back</a>
</body>