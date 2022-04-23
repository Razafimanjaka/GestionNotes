<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body{
            background: rgba(32, 127, 204, 0.904);
            padding: 20px;
            margin: 20px;
        }
        h3{
            color: orange;
            font-family: 'Bristone';
            text-align: center;
            text-decoration: underline;
            letter-spacing: 4px;
            margin-left: 50px;
        }
    </style>
</head>
<body>
<?php
    $conn = new PDO('mysql:host=127.0.0.1;dbname=gest_etu_php;charset=utf8','root','');
?>
   <div class="container-fluid">
        <form  method="post">
            <div class="row">
                <div class="col-md-4">
               
                    <h3>AES</h3>
                    <div class="form-group">
                        <label for="cdm">Code du matière</label>
                        <select name="code" id="cdm" class="form-control">
                            <?php
                                $rech = $conn->query('SELECT codeMat FROM matiere WHERE mention = "aes"');
                                while($res = $rech->fetch()){
                                    echo "<option>".$res['codeMat']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="suppr" class="btn btn-danger">Supprimer</button>
                    </div>
              
                </div>
          

            <div class="col-md-4">
                
                    <h3>DASI</h3>
                    <div class="form-group">
                        <label for="cdm">Code du matière</label>
                        <select name="codeD" id="cdm" class="form-control">
                            <?php
                                $rech = $conn->query('SELECT codeMat FROM matiere WHERE mention = "dasi"');
                                while($res = $rech->fetch()){
                                    echo "<option>".$res['codeMat']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="supprDasi" class="btn btn-danger">Supprimer</button>
                    </div>
                
            </div>
            

            <div class="col-md-4">
               
                    <h3>RPM</h3>
                    <div class="form-group">
                        <label for="cdm">Code du matière</label>
                        <select name="codeR" id="cdm" class="form-control">
                            <?php
                                $rech = $conn->query('SELECT codeMat FROM matiere WHERE mention = "rpm"');
                                while($res = $rech->fetch()){
                                    echo "<option>".$res['codeMat']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="supprRPM" class="btn btn-danger">Supprimer</button>
                    </div>
                
                </div>
            </div>

            <?php
                if(isset($_POST['suppr']))
                {
                    $rek_aes = $conn->prepare("DELETE FROM matiere WHERE codeMat=:code");
                    $rek_aes->bindparam(":code",$_POST['code']);
                    $rek_aes->execute();
                  
                }
                if(isset($_POST['supprDasi']))
                {
                    $rek_dasi = $conn->prepare("DELETE FROM matiere WHERE codeMat=:codeDa");
                    $rek_dasi->bindparam(":codeDa",$_POST['codeD']);
                    $rek_dasi->execute();
                }
                if(isset($_POST['supprRPM']))
                {
                    $rek_rpm = $conn->prepare("DELETE FROM matiere WHERE codeMat=:codeRp");
                    $rek_rpm->bindparam(":codeRp",$_POST['codeR']);
                    $rek_rpm->execute();
                }
            
            ?>
        </form>
   </div>
</body>
</html>
