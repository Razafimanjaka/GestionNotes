<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout notes rpm</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <style>
    body{
        padding: 20px;
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
        .normal{
            color:black;
            font-size:18px;
        }
        .rattr{
            color:red;
            font-size:18px;
        }
    </style>
    
</head>
<body>
    <?php
        $conn = new PDO('mysql:host=127.0.0.1;dbname=gest_etu_php;charset=utf8','root','');               
    ?>
    <div class="container-fluid">
        <form method="post">
            <div class="row">
               
                <div class="col-md-3">
                    <h3>Session Normal</h3>
                    <div class="form-group">
                        <label for="matr">Matricule</label>
                        <select name="num" id="matr" class="form-control">
                            
                                <?php
                                   $recherche = $conn->query('SELECT matricule FROM etudiant WHERE mention="RPM" AND niveau = "L2"');
                                    while($res = $recherche->fetch()){
                                ?>
                                        <option value="<?php echo ($res['matricule']); ?>">
                                            <?php echo ($res['matricule']);?>
                                        </option>
                                   
                                <?php }?>
                                    
                                
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Code Matière</label>
                        <select name="code" id="code" class="form-control">  
                                <?php                                  
                                    $recherche = $conn->query('SELECT * FROM matiere WHERE mention="rpm"');
                                    while($res = $recherche->fetch()){  
                                ?>
                                        <option value="<?php echo ($res['codeMat']); ?>">
                                            <?php echo ($res['nomMat']);?>
                                        </option>
                                <?php
                                    }  
                                ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Note</label>
                        <input type="text" class="form-control" name="note" id="note">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name="save" id="enregistrer">Enregistrer</button>&nbsp; 
                        <button class='btn btn-outline-danger' name='modify' id="modifier">Modifier</button> 
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning form-control" name="afficher">Afficher</button> <br><br>
                        <button class="btn btn-primary form-control" name="Voirtous">Voir tous les notes</button>
                    </div>
                    
                    

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-8">
                    <?php
                        if(isset($_POST['afficher'])){
                    ?>
                            <table>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Matières</th>
                                    <th>Notes</th>
                                </tr>
                                <?php 
                                $rekety = $conn->prepare("SELECT numero_etu,nom,prenom,nomMat,noteNormal FROM etudiant,matiere,note_et WHERE numero_etu=? AND matiere.mention='rpm' AND numero_etu=matricule AND codeM=codeMat");
                                $rekety->execute(array($_POST['num']));
                                while($res=$rekety->fetch()){
                                ?>
                                    <tr>
                                        <td> <?php echo($res['numero_etu']); ?></td>
                                        <td> <?php echo($res['nom']); ?></td>
                                        <td> <?php echo($res['prenom']); ?></td>   
                                        <td> <?php echo($res['nomMat']); ?></td>
                                        <td> <?php
                                                if($res['noteNormal']>=10){  ?>
                                                    <span class="normal"><?php echo($res['noteNormal']); ?></span>
                                                <?php
                                                }else{
                                                ?><span class="rattr"><?php echo($res['noteNormal']); ?></span>
                                                <?php
                                                }
                                                ?>
                                         </td>
                                    </tr>
                                <?php 
                                }
                                ?>
                            </table>
                    <?php 
                        }

                        if(isset($_POST['Voirtous'])){
                    ?>
                            <table>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Matières</th>
                                    <th>Notes</th>
                                </tr>
                                <?php 
                                $rekety = $conn->prepare("SELECT numero_etu,nom,prenom,nomMat,noteNormal FROM etudiant,matiere,note_et WHERE matiere.mention='rpm' AND numero_etu=matricule AND codeM=codeMat AND niveau='L2' ORDER BY 1");
                                $rekety->execute(array());
                                while($res=$rekety->fetch()){
                                ?>
                                    <tr>
                                        <td> <?php echo($res['numero_etu']); ?></td>
                                        <td> <?php echo($res['nom']); ?></td>
                                        <td> <?php echo($res['prenom']); ?></td>   
                                        <td> <?php echo($res['nomMat']); ?></td>
                                        <td> <?php
                                                if($res['noteNormal']>=10){  ?>
                                                    <span class="normal"><?php echo($res['noteNormal']); ?></span>
                                                <?php
                                                }else{
                                                ?><span class="rattr"><?php echo($res['noteNormal']); ?></span>
                                                <?php
                                                }
                                                ?>
                                         </td>
                                    </tr>
                                <?php 
                                }
                                ?>
                            </table>
                    <?php 
                        }

                        if(isset($_POST['modify'])){
                            if(isset($_POST['note']) && !empty($_POST['note'])){
                                if($_POST['note']>20 || $_POST['note']<0){
                                    echo '<script>alert("note Saisi incorrect!!\nVeuillez resaisir!!")</script>';
                                }else{
                                    $mod = $conn->prepare("UPDATE note_et SET noteNormal= ? WHERE numero_etu=? AND codeM=?");

                                    $rekt = $conn->prepare('SELECT coeff FROM matiere WHERE mention="rpm" AND codeMat = ?');
    
                                    $rekt->execute(array($_POST['code']));
                                    if($resCode=$rekt->fetch()){
                                        $coef = $resCode['coeff'];
                                    }
                                   // $mod->execute(array($_POST['note']*$coef,$_POST['num'],$_POST['code']));
                                    $isok = $mod->execute(array($_POST['note'],$_POST['num'],$_POST['code']));
                                    if($isok){
                                        echo '<script>alert("note bien modifié!!")</script>';                       
                                    }
                                }
                            }else{
                                echo '<script>alert("Veuillez saisir la note")</script>';
                            }
                               
                        }

                        if(isset($_POST['save'])){ 
                            if(isset($_POST['note']) && !empty($_POST['note'])){

                                $reket_verf = $conn->prepare("SELECT * FROM note_et WHERE numero_etu=? AND codeM=? AND noteNormal!=''");
                                $reket_verf->execute(array($_POST['num'],$_POST['code']));
                                if($res=$reket_verf->fetch()){
                                    echo '<script>alert("Ce note est déjà saisie!!\nCliquez sur modifier si vous avez besoin de modifier")</script>';
                                }else{
                                    if($_POST['note']>20 || $_POST['note']<0){
                                        echo '<script>alert("note Saisi incorrect!!\nVeuillez resaisir!!")</script>';
                                    }else{
                                        
                                        $req = $conn->prepare('INSERT INTO note_et(numero_etu,codeM,noteNormal) VALUES(?,?,?)');
                                        $rekt = $conn->prepare('SELECT coeff FROM matiere WHERE mention="rpm" AND codeMat = ?');
    
                                        $rekt->execute(array($_POST['code']));
                                        if($resCode=$rekt->fetch()){
                                            $coef = $resCode['coeff'];
                                        }
                                    
                                        $verif = $conn->prepare("SELECT COUNT(*) FROM note_et WHERE numero_etu=?");
                                        $verif->execute(array($_POST['num']));
                                        if($res=$verif->fetch()){
                                            $nbrNote = $res[0];
                                            $nbrMat = $conn->prepare("SELECT COUNT(*) FROM matiere WHERE mention='rpm'");
                                            $nbrMat->execute(array());
                                            if($rs=$nbrMat->fetch()){
                                                $nMat = $rs[0];
                                            }
                                        
                                            if($nbrNote>=$nMat){
                                                echo '<script>alert("Tous les notes sont déjà saisies pour cet étudiant ")</script>';
                                            }else{
                                                $req->execute(array($_POST['num'],$_POST['code'],$_POST['note'])); 
                                                ?> 
                                                <table>
                                                    <tr>
                                                        <th>Matricule</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Matières</th>
                                                        <th>Notes</th>
                
                                                    </tr>
                                                        <?php 
                                                            $rekety = $conn->prepare("SELECT numero_etu,nom,prenom,nomMat,noteNormal FROM etudiant,matiere,note_et WHERE numero_etu=? AND matiere.mention='rpm' AND numero_etu=matricule AND codeM=codeMat");
                                                            $rekety->execute(array($_POST['num']));
                                                            while($res=$rekety->fetch()){
                                                        ?>
                                                                <tr>
                                                                    <td> <?php echo($res['numero_etu']); ?></td>
                                                                    <td> <?php echo($res['nom']); ?></td>
                                                                    <td> <?php echo($res['prenom']); ?></td>   
                                                                    <td> <?php echo($res['nomMat']); ?></td>
                                                                    <td> <?php
                                                                        if($res['noteNormal']>=10){  ?>
                                                                            <span class="normal"><?php echo($res['noteNormal']); ?></span>
                                                                        <?php
                                                                        }else{
                                                                        ?><span class="rattr"><?php echo($res['noteNormal']); ?></span>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                        <?php 
                                                            }
                                                        ?>  
                                                </table>
                                                <?php 
                                            }
                                        }
                                    }
                                }
                            }else{
                                echo '<script>alert("veuillez remplir tous les champs!!")</script>';
                            }      
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>
    <script>
        /*$not = $('#note').val();
        $('#modifier').onclick(function(){
            if($not<0 || $not>20 || $not ==""){
                $('#note').css('background':'red');
            }else{
                $('#note').css('background':'white');
            }
        })*/var
      
    </script>
    
</body>
</html>