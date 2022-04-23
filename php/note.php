<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body{
            padding:20px 10px;
        }
        .form2{
            padding:20px;
            border: 2px solid black;
            border-radius: 15px;
        }
        .btnenreg{
            width: 200px;
            
        }
        th,td{
            padding: 10px;
            border: 1px solid black;
            color: blue;
            font-family: 'century gothic'
            
        }
        tr{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        $conn = new PDO('mysql:host=localhost;dbname=gest_etu_php;charset=utf8','root','');               
    ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3">
                <form  method="post" class="form2">
                    <div class="form-group">
                        <label for="mention">Mention</label>
                        <select name="mention" id="mention" class="form-control">
                            <option value="AES">AES</option>
                            <option value="DAII">DAII</option>
                            <option value="RPM">RPM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="niv">Niveau</label>
                        <select name="niveau" id="niv" class="form-control">
                            <option value="L1">Licence 1</option>
                            <option value="L2">Licence 2 </option>
                            <option value="L3">Licence 3 </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="matr">Matricule</label>
                        <select name="num" id="matr" class="form-control">
                            
                                <?php
                                   // $recherche = $conn->query('SELECT matricule FROM etudiant WHERE mention="DAII" AND niveau = "'.$_POST['niveau'].'" ');
                                    $recherche = $conn->prepare('SELECT matricule FROM etudiant WHERE mention = "DAII" AND niveau = ?');
                                    $recherche->execute(array($_POST['niveau']));
                                    while($res = $recherche->fetch()){
                                        echo "<option value='matri'>".$res['matricule']."</option>";
                                    }
                                    
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Code Matière</label>
                        <select name="code" id="code" class="form-control">  
                                <?php                                  
                                    $recherche = $conn->query('SELECT codeMat FROM matiere WHERE mention="dasi"');
                                    while($res = $recherche->fetch()){
                                        echo "<option value='codeMatiere'>".$res['codeMat']."</option>";
                                    }
                                    
                                ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Note</label>
                        <input type="number" class="form-control" name="note">
                    </div>
                    <button type="submit" class="btn btn-success btnenreg" name="save">Enregistrer</button>
                </form>
            </div>
            <div class="col-md-8">
                <form method="post">
               
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['save'])){ 
            $req = $conn->prepare('INSERT INTO note_et(numero_etu,codeM,noteNormal) VALUES(?,?,?)');
            $req->execute(array($_POST['num'],$_POST['code'],$_POST['note']));                           
        }
    ?>
</body>
</html>