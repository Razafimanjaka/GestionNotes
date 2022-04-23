<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <style>
        body{
            padding: 10px;
            background: rgba(8, 0, 7, 0.4);
            color: white;
            background: url("../images/fond3.jpg");
           
        }
        th,td{
            border:1px solid black;
            padding:5px 20px 5px 5px;
            font-size: 13px;
            
        }
        th{
            color: blue;
            font-family: "century gothic";
            font-size: 13px;
            text-align: center;
        }
        .mod_eff{
            border: 1px solid black;
            border-radius: 10px;
            padding: 20px;
        }
        .modsup{
            width:110px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
    <form method="POST">
        <div class="row">
            <div class="col-md-10">
                
                    <select name="cbrecherche" id="cbrech">
                                <option value="matricule">Matricule</option>
                                <option value="nom">Nom</option>
                                <option value="prenom">Prénom</option>
                    </select>
                   <input type="text" name="rechMatri" id='rech'>&nbsp;&nbsp;
                    <input type="submit" name="rechercher" value="Rechercher" class="btn btn-success">
                    <input type="submit" name="affTous" value="Afficher la Liste" class="btn btn-primary">
                    <br><br>

                    <?php
                     $conn = new PDO('mysql:host=localhost;dbname=gest_etu_php','root','');
                   
                    if(isset($_POST['affTous'])){
                        $rech = $conn->query('SELECT*FROM etudiant ORDER BY mention');
                            echo" <table>
                                        <tr>
                                            <th>Matricule</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Adresse</th>
                                            <th>Genre</th>
                                            <th>Mention</th>
                                            <th>Niveau</th>
                                            <th>DateNaiss</th>
                                            ";
                            while($res = $rech->fetch()){
                                echo"<tr><th id='mtr'>".$res['matricule']."</th>
                                <td>".$res['nom']."</td>
                                <td>".$res['prenom']."</td>
                                <td>".$res['adresse']."</td>
                                <td>".$res['genre']."</td>
                                <td>".$res['mention']."</td>
                                <td>".$res['niveau']."</td>
                                <td>".$res['dateNaiss']."</td>";   
                            }
                            echo"</table>";

                        }
                   
                    if(isset($_POST['rechercher'])){                       
                        $rval = $_POST['cbrecherche'];
                        if($_POST['rechMatri']!=null){
                            switch($rval){
                                case "matricule":
                                    $rech = $conn->prepare('SELECT * FROM etudiant WHERE matricule = ? ');
                                    $rech->execute(array($_POST['rechMatri']));
                                break;
                                case "nom":
                                    $rech = $conn->prepare('SELECT * FROM etudiant WHERE nom = :anarana ');
                                    $rech->execute(array('anarana' => $_POST['rechMatri']));
                                break;
                                case "prenom":
                                    $rech = $conn->prepare('SELECT * FROM etudiant WHERE prenom = ? ');
                                    $rech->execute(array($_POST['rechMatri']));
                                break;
                            }
                            echo" <table>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Genre</th>
                                    <th>Mention</th>
                                    <th>Niveau</th>
                                    <th>DateNaiss</th>
                                </tr>";
                        while ($res2 = $rech->fetch()){
                            echo"<tr><th id='mtr'>".$res2['matricule']."</th><td>".$res2['nom']."</td><td>".$res2['prenom']."</td><td>".$res2['adresse']."</td><td>".$res2['genre']."</td><td>".$res2['mention']."</td><td>".$res2['niveau']."</td><td>".$res2['dateNaiss']."</td></tr>";
                        }
                        echo"</table>";
                        }                        
                    }

                    if(isset($_POST['mention_niveau'])){
                        $rech = $conn->prepare('SELECT * FROM etudiant WHERE mention = ? AND niveau = ? ');
                        $rech->execute(array($_POST['ment'], $_POST['niv']));
                        echo" <table>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Genre</th>
                                    <th>Mention</th>
                                    <th>Niveau</th>
                                    <th>DateNaiss</th>
                                </tr>";
                        while ($res3 = $rech->fetch()){
                            echo"<tr><th id='mtr'>".$res3['matricule']."</th><td>".$res3['nom']."</td><td>".$res3['prenom']."</td><td>".$res3['adresse']."</td><td>".$res3['genre']."</td><td>".$res3['mention']."</td><td>".$res3['niveau']."</td><td>".$res3['dateNaiss']."</td></tr>";
                        }
                            echo"</table>";
                    }
                    
                    $conn = null;
                   ?>
                
            </div>  
            <div class="col-md-2" class = "aculer">
                    <div class="form-group">
                        <label for="ment">Mention</label>
                        <select name="ment" id="ment" class="form-control">
                            <option value="AES">AES</option>
                            <option value="DAII">DA2I</option>
                            <option value="RPM">RPM</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="niv">Niveau</label>
                        <select name="niv" id="niv" class="form-control">
                            <option value="L1">L1</option>
                            <option value="L2">L2</option>
                            <option value="L3">L3</option>
                        </select>
                    </div>
                    <div class="form-group" name="formbt">
                        <button type="submit" class="btn btn-info" name="mention_niveau" id="btnAff">Afficher</button>
                    </div><br><br>
                
               <div class="mod_eff" id="form">
                   <a href="modifyEtu.php" class="btn btn-secondary modsup" id="mod" >Modifier</a><br><br>
                   <a href="deleteEtu.php" class="btn btn-danger modsup" id="suppr">Supprimer</a>
               </div>
            </div>     
        </div>
        </form>
    </div>


    <script>
       $(document).ready(function(){

       });
    </script>
</body>
</html>