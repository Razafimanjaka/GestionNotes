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
            background: rgba(8, 0, 7, 0.4);

        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php
            $conn = new PDO('mysql:host=localhost;dbname=gest_etu_php','root','');
            $rech = $conn->query('SELECT*FROM etudiant ORDER BY mention');
        ?>
        <table width="962" border="1" cellspacing="0" cellpadding="1" align="center">
            <tr>
                <th width="87" height="28"><span class="Style14">Numéro</span></td>
                <th width="127"><span class="Style14">Nom</span></th>
                <th width="125"><span class="Style14">Prénom</span></th>
                <th width="125"><span class="Style14">Adresse</span></th>
                <th width="84"><span class="Style14">Genre</span></th>
                <th width="73"><span class="Style14">Mention</span></th>
                <th width="80"><span class="Style14">Niveau</span></th>
                <th width="90"><span class="Style14">Date Naiss</span></th>
            </tr>
            <?php
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
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>