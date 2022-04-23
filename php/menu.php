<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title></title>
    <style>
        body{
            padding-top: 30px;
            background-color: rgb(8, 0, 7, 2);
        }
        a{
            font-family: "Cormorant Infant Light";
        }
        .btn{
            width: 180px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
        <div class="row">
           <div class="col-md-3">
                <a href="listeEtu.php" target="principal">Listes Etudiants</a>
           </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-md-3">
                <a href="ajout.php" target="principal">Ajouter Etudiant</a>
            </div>
        </div>
        <br>
        
        <div class="row">
           <div class="col-md-3">
                <a href="listeMat.php" target="principal">Listes matieres</a>
           </div>
        </div>
        <br>

        <div class="row">
           <div class="col-md-3">
                <a href="ajout_mat.php" target="principal">Ajouter Matiere</a>
           </div>
        </div>
        <br>

        <div class="row">
           <div class="col-md-3">
                <a href="saisiNoteNormal.php"target="principal">Notes Normales</a>
           </div>
        </div>
        <br>
        <div class="row">
           <div class="col-md-3">
                <a href="saisiNoteRattrapage.php" target="principal">Notes Rattrapages</a>
           </div>
        </div>
    </div>
</body>
</html>