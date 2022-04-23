<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <style>
        body{
            padding: 20px;
            background: url("../images/fond3.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding:0px;
            margin:0px;
        }
        .form{
            padding: 20px;
            margin-left: 100px
        }
        h1{
            color:yellowgreen;
            font-size: 50px;
            letter-spacing: 2px;
            margin-left:130px;
        }
        .btn{
            width: 200px;
            margin-left: 30px;
            font-size: 20px;
            color: yellow;
        }
        .container-fluid{
            background: rgba(8, 0, 7, 0.4);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
   <h1>Matières</h1>
        <div class="row">
            <div class="col-md-5">
                <form method="post" class="form">
                    <div class="form-group">
                        <label for="mention">Mention</label>
                        <select name="mention" id="mention" class="form-control">
                            <option value="aes">AES</option>
                            <option value="dasi">DAII</option>
                            <option value="rpm">RPM</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" name="code" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Nom de la matière</label>
                        <input type="text" name="nomMat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Coefficients</label>
                        <input type="number" name="coeff" class="form-control">
                    </div>

                    <button type="submit" name="enregistrer" class="btn btn-success">Enregistrer</button><br>
                   
                </form>
                <br><br><br>
            </div>
        </div>
    </div>
    <?php       
        $conn = new PDO('mysql:host=127.0.0.1;dbname=gest_etu_php;charset=utf8','root','');

        if(isset($_POST['enregistrer'])){ 
            $req = $conn->prepare('INSERT INTO matiere VALUES(?,?,?,?)');
            $req->execute(array($_POST['code'],$_POST['nomMat'],$_POST['coeff'],$_POST['mention']));                           
        }
        $conn=null;
    ?>
</body>
</html>