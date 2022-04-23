<?php
    $conn = new PDO('mysql:host=localhost;dbname=php_etudiant','root','');

    $nb_suppr=$_POST['nbsuppr'];
	for ($i=0; $i < $nb_suppr; $i++){
		$id=$_GET['code'.$i];
		
		$req = "delete from etudiant where matricule='".$id."'" ;
	
		if ($resultat=mysql_query($req))
			echo "suppression reussie";
		else
			echo mysql_error();
	}
?>
<script language="javascript">
	document.location = "listesEtudiants.php" ;
</script>