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
            background: rgba(32, 127, 204, 0.904);
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
        $conn = new PDO('mysql:host=localhost;dbname=gest_etu_php','root',''); 
    ?>
   <div class="container">
       <form  method="post">
           <div class="row">
               <div class="col-md-4">
                    <h3>AES</h3>
                    <div class="form-group">
                        <label for="">Matricule</label>
                        <select name="matriAES" id="aes" class="form-control">
                            <?php
                                $rech = $conn->query('SELECT matricule FROM etudiant WHERE mention = "AES"');
                                while($res = $rech->fetch()){
                                    echo "<option>".$res['matricule']."</option>";
                                }
                            ?>
                        </select>
                   </div>
                   <div class="form-group">
                        <button type="submit" name="supprAES" class="btn btn-danger">Supprimer</button>
                    </div>
               </div>

               <div class="col-md-4">
                    <h3>DASI</h3>
                    <div class="form-group">
                        <label for="dasi">Matricule</label>
                        <select name="matriDASI" id="dasi" class="form-control">
                            <?php
                                $rech = $conn->query('SELECT matricule FROM etudiant WHERE mention = "DAII"');
                                while($res = $rech->fetch()){
                                    echo "<option>".$res['matricule']."</option>";
                                }
                            ?>
                        </select>
                   </div>
                   <div class="form-group">
                        <button type="submit" name="supprDASI" class="btn btn-danger">Supprimer</button>
                    </div>
               </div>

               <div class="col-md-4">
                    <h3>RPM</h3>
                    <div class="form-group">
                        <label for="">Matricule</label>
                        <select name="matriRPM" id="rpm" class="form-control">
                            <?php
                                $rech = $conn->query('SELECT matricule FROM etudiant WHERE mention = "RPM"');
                                while($res = $rech->fetch()){
                                    echo "<option>".$res['matricule']."</option>";
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
                if(isset($_POST['supprAES']))
                {
                    $rek_aes = $conn->prepare("DELETE FROM etudiant WHERE matricule=:matriAES");
                    $rek_aes->bindparam(":matriAES",$_POST['matriAES']);
                    $rek_aes->execute();
                  
                }
                if(isset($_POST['supprDASI']))
                {
                    $rek_dasi = $conn->prepare("DELETE FROM etudiant WHERE matricule=:matriDASI");
                    $rek_dasi->bindparam(":matriDASI",$_POST['matriDASI']);
                    $rek_dasi->execute();
                }
                if(isset($_POST['supprRPM']))
                {
                    $rek_rpm = $conn->prepare("DELETE FROM etudiant WHERE matricule=:matriRPM");
                    $rek_rpm->bindparam(":matriRPM",$_POST['matriRPM']);
                    $rek_rpm->execute();
                }
            
            ?>

       </form>
   </div>
</body>
</html>