<?php
    include("../conectare.php");
    include("../global_func.php");

    if(isset($_POST["actionare"])){   

        $cui = $_POST["furn_sel"];

        # date din baza de date

        $date_furnizor = mysqli_fetch_array(mysqli_query($conectare, "SELECT denumireF, email, telefon FROM furnizor WHERE CUI='$cui'"));
        $old_den = $date_furnizor["denumireF"];
        $old_email = $date_furnizor["email"];
        $old_telefon = $date_furnizor["telefon"];

        $date_adresa = mysqli_fetch_array(mysqli_query($conectare, "SELECT * FROM adresa WHERE CUI='$cui'"));
        $old_localitate = $date_adresa["denumireLocalitate"];
        $old_judet = $date_adresa["denumireJudet"];
        $old_strd = $date_adresa["denumireStrada"];
        $old_nr = $date_adresa["numar"];
        $old_codPostal = $date_adresa["codPostal"]; 

        # date din form

        $denF = ifnull($_POST["denF"], $old_den);
        $telefon = ifnull($_POST["tel"], $old_telefon);
        $email = ifnull($_POST["email"], $old_email);            
        
        $new_localitate = ifnull($_POST["localitate"], $old_localitate);
        $new_judet = ifnull($_POST["judet"], $old_judet);
        $new_strd = ifnull($_POST["strad"], $old_strd);
        $new_nr = ifnull($_POST["nr"], $old_nr);
        $new_codPostal = ifnull($_POST["cod_postal"], $old_codPostal);

        mysqli_query($conectare, "UPDATE furnizor SET denumireF='$denF', email='$email', telefon='$telefon' WHERE CUI='$cui'") or die("Error: Furnizor");
        mysqli_query($conectare, "UPDATE adresa SET denumireJudet='$new_judet', denumireLocalitate='$new_localitate', denumireStrada='$new_strd', numar='$new_nr', codPostal=$new_codPostal WHERE cui='$cui'") or die("Error: Furnizor");
        echo "<p>Date modificate cu succes!</p>";   
	} else {
		header("Location: ./index.php");
	}
?>
<body>
    <br>
    <a href="./index.php">Back</a>
</body>