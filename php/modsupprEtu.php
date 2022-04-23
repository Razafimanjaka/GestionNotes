<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Listes etudiants</title>
    <style>
        body{
            padding:20px;
        }
        .Style14{
            color: blue;
            

        }
    </style>
</head>
<body>
    <div class="container-fluid">
    <form id="form1" name="form1" method="post" action="">
        <?php
            $conn = new PDO('mysql:host=localhost;dbname=gest_etu_php','root','');
            $rech = $conn->query('SELECT*FROM etudiant ORDER BY mention');
        ?>
        <table width="962" border="1" cellspacing="0" cellpadding="1" align="center">
            <tr>
                <th width="87" height="28"><span class="Style14">Matricule</span></td>
                <th width="127"><span class="Style14">Nom</span></th>
                <th width="125"><span class="Style14">Prénom</span></th>
                <th width="125"><span class="Style14">Adresse</span></th>
                <th width="84"><span class="Style14">Genre</span></th>
                <th width="73"><span class="Style14">Mention</span></th>
                <th width="80"><span class="Style14">Niveau</span></th>
                <th width="90"><span class="Style14">Date Naiss</span></th>
                <th width="90"><span class="Style14">Séléction</span></th>
                
            </tr>
            <?php
                $i = 0 ;
                while($res = $rech->fetch()){
            ?>
            <tr>
                <td><?php echo $res['matricule']?>&nbsp;</td>
                <td><?php echo $res['nom']?>&nbsp;</td>
                <td><?php echo $res['prenom']?>&nbsp;</td>
                <td><?php echo $res['adresse']?>&nbsp;</td>
                <td><?php echo $res['genre']?>&nbsp;</td>
                <td><?php echo $res['mention']?>&nbsp;</td>
                <td><?php echo $res['niveau']?>&nbsp;</td>
                <td><?php echo $res['dateNaiss']?>&nbsp;</td>
                <td>
                    <label><input type="checkbox" name="checkbox<?php echo $i?>" value="checkbox<?php echo $i?>"/></label>
                </td>
            </tr>
            <?php 
                $i++;
                } 
            ?>
        </table>
        
        <input name="Modifier" type="button" id="Modifier" value="Modifier" onclick="javascript:modifier_et(<?php echo $i?>)" />
        <input name="Supprimer" type="button" id="Supprimer" value="Supprimer" onclick="javascript:supprimer_et(<?php echo $i?>)" />
           
    </form>
    </div>

    <script language="javascript">
		
        function supprimer_et(nbmax){
                exist=0;
                ident="";
                for(i=0;i<nbmax;i++){
                    if (document.forms[0].elements['checkbox'+i].checked){
                        ident+="&code"+exist+"="+document.forms[0].elements['id'+i].value;
                        exist+=1;
                    }
                }
                if(exist==0)alert ('Veuillez selectionner au moins un enregistrement');
                else if(exist>=1)
                            if(confirm('Etes_vous sure de vouloir supprimer ces enregistrements?'))
                                document.location="suppr_etudiant.php?nbsuppr="+exist+ident;
        }
		
        function modifier_et(nbmax){
			exist=0;
			for(i=0;i<nbmax;i++){
				if(document.forms[0].elements['checkbox'+i].checked==true){
					exist+=1;
					ident=document.forms[0].elements['id'+i].value;
				}
			}
			if (exist==0)alert('Veuillez selectionner un enregistrement');
			else 
				if (exist>1) alert('Veuillez selectionner un seul enregistrement');
				else if (exist==1){
					document.location="ajout.php?code="+ident;
				}
		}
    </script>

</body>
</html>