<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title></title>
    <style>
        body{
            padding: 0px;
            margin:0px;
            background: url("../images/fond3.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding:0px;
            margin:0px;
        }
        th,td{
            border:1px solid white;
            padding:10px;
            text-align:center;
        }
        th{
            color: yellow;
            font-family: "century gothic";
            font-size: 15px;
        }
        h1{
            color: orange;
            text-decoration: underline;
            padding:10px;
            margin-left: 250px;
            letter-spacing: 8px;
        }
        h3{
            color: orange;
            font-family: 'Bristone';
            text-align: center;
            text-decoration: underline;
            letter-spacing: 4px;
            margin-left: 1px;
        }
        .suppr{
            color: red;
        }
        .modifie{
            color: green;
        }
        .btn{
            width: 250px;
            height: 40px;
        }
        .container-fluid{
            background: rgba(8, 0, 7, 0.4);
            color: white;
        }

    </style>
</head>
<body>   
    <div class="container-fluid">
        <div class="row">
             
            <div class="col-md-4">
                <h3>AES</h3> 
                <table>
                <tr>
                    <th>Code</th>
                    <th>Nom de la matière</th>
                    <th>Coefficients</th>  
                     
                <tr>

                <form method="post">
                <?php
                     $conn = new PDO('mysql:host=localhost;dbname=gest_etu_php;charset=utf8','root','');
                   
                        $recherche = $conn->query('SELECT*FROM matiere WHERE mention="aes"');
                       
                        while($res = $recherche->fetch()){?>
                            <tr><th id='mtr'><?php echo $res['codeMat']; ?></th>
                            <td><?php echo $res['nomMat']; ?></td>
                            <td><?php echo $res['coeff']; ?></td>
                            
                            </tr>
                        <?php  } ?>
                        
                </table>
                
                </form>
            </div>

        <br><br><br>

            
            <div class="col-md-4">  
                <h3>DASI</h3>
                <form method="post">
               
                <?php                   
                    $recherche = $conn->query('SELECT*FROM matiere WHERE mention="dasi"');
                    echo" <table>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom de la matière</th>
                                    <th>Coefficients</th>   
                            

                                <tr> ";
                ?>
                            <?php  
                                while($res = $recherche->fetch()){?>
                                        <tr>
                                            <th id='mtr'><?php echo $res['codeMat']; ?></th>
                                            <td><?php echo $res['nomMat']; ?></td>
                                            <td><?php echo $res['coeff']; ?></td>
                                        </tr>   
                 <?php  
                                }
               
                    echo"</table>";
                ?>
                </form>
            </div>
        <br><br><br>
     
                          
            <div class="col-md-4">
                <h3>RPM</h3>  
                <form  method="post">
                <?php                   
                        $recherche = $conn->query('SELECT*FROM matiere WHERE mention="rpm"');
                        echo" <table>
                                    <tr>
                                        <th>Code</th>
                                        <th>Nom de la matière</th>
                                        <th>Coefficients</th>   
                                        
                                    <tr> ";
                        while($res = $recherche->fetch()){
                            echo"<tr><th id='mtr'>".$res['codeMat']."</th>
                            <td>".$res['nomMat']."</td>
                            <td>".$res['coeff']."</td>
                            </tr>";   
                        }
                        echo"</table>";
                ?>
                </form>
            </div>
        </div>
        <br><br><br>    
   
    <br><br><br>
    <center>
        <a href="modifieMat.php" class="btn btn-info" name="modife">MODIFIER</a>
        <a href="suprMat.php" class="btn btn-info" name="supprime">SUPPRIMER</a>
    </center>
    <br><br><br><br>
    </div>
</body>
</html>