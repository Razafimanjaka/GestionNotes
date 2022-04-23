<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <style>
        body{
            padding: 20px;
            margin: 20px;
            background: rgba(8, 7, 0, 0.45);
            color: whitesmoke;
            background: url("../images/fond3.jpg");
            
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
                        <select name="codeAES" id="cdm" class="form-control">
                            <?php
                                $rech = $conn->query('SELECT codeMat FROM matiere WHERE mention = "aes"');
                                while($res = $rech->fetch()){
                                    echo "<option>".$res['codeMat']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomAES">Nom de la matière</label>
                        <input type="text" name="nomAES" id="nomAES" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="coeff">Coefficient</label>
                        <input type="number" name="coeffAES" id="coeff" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="modifyAES" class="btn btn-danger" id="modAES">Modifier</button>
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
                        <label for="nomDASI">Nom de la matière</label>
                        <input type="text" name="nomDASI" id="nomDASI" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="coeff">Coefficient</label>
                        <input type="number" name="coeffDASI" id="coeff" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="modifyDASI" class="btn btn-danger">Modifier</button>
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
                        <label for="nomRPM">Nom de la matière</label>
                        <input type="text" name="nomRPM" id="nomRPM" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="coeffRPM">Coefficient</label>
                        <input type="number" name="coeffRPM" id="coeffRPM" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="modifyRPM" class="btn btn-danger">Modifier</button>
                    </div>
                </div>
            </div>

            <?php
                if(isset($_POST['modifyAES']))
                {
                    if($_POST['nomAES']!=null && $_POST['coeffAES']!=null)
                    {
                        $rek_aes = $conn->prepare("UPDATE matiere SET nomMat=:nomAES , coeff=:coeffAES WHERE codeMat=:code");
                        $rek_aes->bindparam(":nomAES",$_POST['nomAES']);
                        $rek_aes->bindparam(":coeffAES",$_POST['coeffAES']);
                        $rek_aes->bindparam(":code",$_POST['codeAES']);
                        $rek_aes->execute();
                    }
                   
                  
                }
                if(isset($_POST['modifyDASI']))
                {
                    if($_POST['nomDASI']!=null && $_POST['coeffDASI']!=null)
                    {
                        $rek_aes = $conn->prepare("UPDATE matiere SET nomMat=:nomDASI , coeff=:coeffDASI WHERE codeMat=:code");
                        $rek_aes->bindparam(":nomDASI",$_POST['nomDASI']);
                        $rek_aes->bindparam(":coeffDASI",$_POST['coeffDASI']);
                        $rek_aes->bindparam(":code",$_POST['codeD']);
                        $rek_aes->execute();
                    }
                   
                }
                if(isset($_POST['modifyRPM']))
                {
                    if($_POST['nomRPM']!=null && $_POST['coeffRPM']!=null)
                    {
                        $rek_aes = $conn->prepare("UPDATE matiere SET nomMat=:nomRPM , coeff=:coeffRPM WHERE codeMat=:code");
                        $rek_aes->bindparam(":nomRPM",$_POST['nomRPM']);
                        $rek_aes->bindparam(":coeffRPM",$_POST['coeffRPM']);
                        $rek_aes->bindparam(":code",$_POST['codeR']);
                        $rek_aes->execute();
                    }
                }
            
            ?>
        </form>
   </div>

   <script>
       $(document).ready(function(){
            $('#modAES').hide();
            $('#nomAES').on('click',function(){
                $('#modAES').show();
            });
            
       });

   </script>
</body>
</html>
