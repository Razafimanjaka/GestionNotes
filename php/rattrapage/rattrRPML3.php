<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout notes rpm</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
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
        $conn = new PDO('mysql:host=localhost;dbname=php_etudiant;charset=utf8','root','');               
    ?>
    <div class="container-fluid">
        <form method="post">
            <center><h2>SESSION DE RATTRAPAGE : RPM L3 </h2></center><br><br>
            <div class="row">
               <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Matiere</label>
                        <select name="code" id="matr" class="form-control">                          
                                <?php
                                   $recherche = $conn->query('SELECT * FROM matiere WHERE mention="rpm"');
                                    while($res = $recherche->fetch()){
                                ?>
                                        <option value="<?php echo ($res['codeMat']); ?>">
                                            <?php echo ($res['nomMat']);?>
                                        </option>                                  
                                <?php }?>                              
                        </select>
                    </div>
                    <div class="form-group">
                         <button class="btn btn-primary" name="affiche">Listes etudiants passés en rattrapage</button>
                    </div>
               </div>
               <div class="col-md-2"></div>
               <div class="col-md-6">
                    <?php 
                        if(isset($_POST['affiche'])){?>
                            <table>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                </tr>
                                <?php 
                                $rekety = $conn->prepare("SELECT numero_etu,nom,prenom FROM etudiant,note_et,matiere WHERE noteNormal<10 AND codeM=? AND codeM=codeMat AND numero_etu=matricule AND noteRattr is NULL AND niveau='L3' ");
                                $rekety->execute(array($_POST['code']));
                                while($res=$rekety->fetch()){?>
                                    <tr>
                                        <td> <?php echo($res[0]); ?></td>
                                        <td> <?php echo($res[1]); ?></td>
                                        <td> <?php echo($res[2]); ?></td>   
                                    </tr>
                                <?php 
                                } ?>
                            <table>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Matricule</label>
                                        <select name="num" id="" class="form-control">
                                            <?php 
                                                $rekety = $conn->prepare("SELECT numero_etu FROM etudiant,note_et,matiere WHERE noteNormal<10 AND codeM=? AND codeM=codeMat AND numero_etu=matricule AND noteRattr is NULL AND niveau='L3' ");
                                                $rekety->execute(array($_POST['code']));
                                                while($res=$rekety->fetch()){?>
                                                    <option value="<?php echo($res[0]); ?>"><?php echo($res[0]); ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Matiere</label>
                                        <select name="cod" id="matr" class="form-control">                          
                                                <?php
                                                $recherche = $conn->query('SELECT * FROM matiere WHERE mention="rpm"');
                                                    while($res = $recherche->fetch()){
                                                ?>
                                                        <option value="<?php echo ($res['codeMat']); ?>">
                                                            <?php echo ($res['nomMat']);?>
                                                        </option>                                  
                                                <?php }?>                              
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Note</label>
                                        <input type="text" name="note" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-outline-info form-control" name="ajout">Ajouter</button>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>

               </div>
            </div>
            

        </form>             
    </div>                   
    <?php
        if(isset($_POST['ajout'])){
            if(isset($_POST['note']) && !empty($_POST['note'])){
                if($_POST['note']>20 || $_POST['note']<0){
                    echo '<script>alert("note Saisi incorrect!!\nVeuillez resaisir!!")</script>';
                }else{
                    $mod = $conn->prepare("UPDATE note_et SET noteNormal= ?, noteRattr=? WHERE numero_etu=? AND codeM=?");
                    $mod->execute(array($_POST['note'],$_POST['note'],$_POST['num'],$_POST['cod']));    
                }

            }else{
                echo '<script>alert("Saisir la note!!")</script>';
            }
        }
                                     
    ?>
</body>
</html>