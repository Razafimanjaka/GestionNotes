<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Etudiant</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!--script src="../js/jquery-3.5.1.min.js"></script-->
    <style>
        body{
            padding: 20px;
            background: rgba(32, 127, 204, 0.904);
            color: white;
        }
        h3{
            color: orange;
            font-family: 'Bristone';
            text-align: center;
            text-decoration: underline;
            letter-spacing: 4px;
            margin-left: 50px;
        }
        th,td{
            border:1px solid white;
            padding:5px 20px 5px 5px;
            font-size: 13px;
            
        }
        th{
            color: yellow;
            font-family: "century gothic";
            font-size: 13px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php  
        $conn = new PDO('mysql:host=localhost;dbname=gest_etu_php','root',''); 
    ?>
    <div class="container-fluid">
       <form  method="post">
           <div class="row">
               <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Saisir le numéro matricule</label>
                        <input type="text" name="matri" class="form-control">
                   </div>
                   
                   <div class="form-group">
                        <button name="modif" class="btn btn-success" id="showMod">Afficher</button>
                        <button name="btnModifier" class="btn btn-info">Modifier</button>
                    </div>
               </div>

               <div class="col-md-1"></div>
               <div class="col-md-8">
                   <div class="form-group" id="afficher">
                        <?php
                            if(isset($_POST['modif'])){
                                $rech = $conn->prepare('SELECT * FROM etudiant WHERE matricule = :matricule ');
                                $rech->execute(array('matricule' => $_POST['matri']));
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
                                    ?>
                                     <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" id="typeMod">
                                                <h4>Modification du </h4>
                                                <input type="checkbox" name="mNom" id="modNom" > Nom <br>
                                                <input type="checkbox" name="mPrenom" id="mod" > Prénom <br>
                                                <input type="checkbox" name="mAdresse" id="mod" > Adresse <br>
                                                <input type="checkbox" name="mSexe" id="mod" > Genre <br>
                                                <input type="checkbox" name="mNiveau" id="mod"> Niveau <br>
                                                <input type="checkbox" name="mMention" id="mod" > Mention <br>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4">
                                        <br><br>
                                            <div class="textNom" id="textNom">
                                                Nouveau nom : <input type="text" name = "nvNom">
                                            </div>
                                            <div class="textNom" id="textNom">
                                                Nouveau Prénom : <input type="text" name = "nvPrenom">
                                            </div>
                                            <div class="textNom" id="textNom">
                                                Nouveau adresse : <input type="text" name = "nvAdrese">
                                            </div>
                                           
                                           
                                        </div>

                                    </div>
                                   
                                    
                                  

                   </div>
                        <?php
                            }
                        ?>
                    </div>
                    
               </div>
               
           </div>
        </form>  
    </div>

    <script>
         
    </script>
</body>
</html>