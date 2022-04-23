<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <style>
        body{
            padding:10px;
            background: rgba(8, 0, 7, 0.2);
            color: white;
            background: url("../images/fond3.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: whitesmoke;
        }
        .btn{
            width: 400px;
            height: 50px;
            font-size: 30px;
            font-family: "century gothic";
            letter-spacing: 2px;
            font-weight: bold;
            margin-left: 80px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        
        <form  method="post">
            <div class="row">
                <div class="col-md-5"> 
                    <div class="form-group" name="form1">
                        <label for="matricule"><b>Matricule</b></label>
                        <input type="text" id="matricule" name="matricule" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nom"><b>Nom</b></label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="prenom"><b>Prénom</b></label>
                        <input type="text" id="prenom" name="prenom" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="adresse"><b>Adresse</b></label>
                        <textarea name="adresse" id="adresse" cols="15" rows="3" class="form-control"></textarea>
                    </div>
                 
                </div>
            <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="genre"><b>Genre</b></label>
                        <select name="genre" id="genre" class="form-control">
                            <option value="masculin">Masculin</option>
                            <option value="feminin">Féminin</option>
                        </select>
                    </div>  

                    <div class="form-group">
                        <label for="mention"><b>Mention</b></label>
                        <select name="mention" id="mention" class="form-control">
                            <option value="AES">AES</option>
                            <option value="DAII">DAII</option>
                            <option value="RPM">RPM</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="niv"><b>Niveau</b></label>
                        <select name="niveau" id="niv" class="form-control">
                            <option value="L1">Licence 1</option>
                            <option value="L2">Licence 2 </option>
                            <option value="L3">Licence 3 </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dateN"><b>Date de Naissance</b></label>
                        <input type="date" name="dateNaiss" id="dateN" class="form-control">
                    </div>
                </div>
            </div><br>
            <button type="submit" name="ajouter"  class="btn btn-strchr" id="ajout">Ajouter</button>
        </form>  
    </div>

    <?php       
        $conn = new PDO('mysql:host=127.0.0.1;dbname=gest_etu_php;charset=utf8','root','');

        if(isset($_POST['ajouter'])){
            if(isset($_POST['matricule']) && !empty($_POST['matricule'])) {
                $req = $conn->prepare('INSERT INTO etudiant(matricule,nom,prenom,adresse,genre,mention,niveau,dateNaiss) VALUES(?,?,?,?,?,?,?,?)');
                $req->execute(array($_POST['matricule'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['genre'],$_POST['mention'],$_POST['niveau'],$_POST['dateNaiss']));  
            }else{
                echo '<script>alert("veuillez remplir tous les champs!!")</script>';
            }
                                    
        }
        $conn=null;
    ?>

    <script>
       
    </script>
</body>
</html>