<?php session_start();

$photo=$_SESSION['photo'];
$prenom=$_SESSION['prenom'];
$nom=$_SESSION['nom'];
 $_SESSION['status']="login";
$questions = file_get_contents('json/questions.json');
  $questions = json_decode($questions, true);
  //var_dump($questions );
  // for ($i=0; $i <count($questions) ; $i++) {
  //   foreach ($questions as  $value) {
  //     # code...
  //   }
  // }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./js/fonction.js" ></script>
    <title>Document</title>
    <style type="text/css">
      .inputgener{
        margin-left: 12%;
      width: 40%;
       height: 32px;
     border-radius: 5px !important;
      }
      .checkgner{
        margin-left: 10%;
      border-color: blue;
      }

      .labgener{
        font-size: larger;
        font-family: inherit;
      }
       .imagess{
        float: right;
        }
        #preview img{
        border-radius:50%;
        width:160px;
        height:160px;
      }
      a{
        text-decoration: none;
        }
      label
    </style>
</head>
<body id="body2">
    <div id="cadre1">
        <div id="cadre2">
             <h2 class="btn6" for="">
                Le plaisir de jouer
            </h2>
        </div>
        <div id="cadre3">
            <div id="cadre4">
              <div class="creer"><h2 class="titre1">CREER ET PARAMETRER VOS QUIZZ</h2></div>
               <div class="deconnexion"><a href="deconnecter.php"><input class="deconnecter" type="submit" onclick="if(!confirm('Voulez-vous vraiment vous déconnecter ?')) return false;"  name="deconnexion" value="Déconnexion"></a></div>
             </div>
             <div id="cadre5">
                  <div id="cadre6"> 
                        <div class="cadre8">
                    <div class="cadre8a">
                      <div id="moncercle1"><img id="preview1" src="img/<?php echo $photo;?>"> </span></div>
                    </div>
                    <div class="cadre8b">
                      <br/>
                      <div class="cadre8a1" >
                        <label class="label12"><?php echo $prenom;?></label><br/><br/>
                        <label class="label13"><?php echo $nom;?></label>
                      </div>
                      
                    </div>
                  </div>
                   <ul>
                      <li class="icones"><a href="acceuil.php?lien=listequestions&&page=0">Liste Questions<img class="imagess" src="../asset/img/icones/ic-liste.png"></img></a></li>
                      <li class="icones"><a  href="acceuil.php?lien=modifier">Modifier/supprimer Questions<img class="imagess" src="../asset/img/icones/ic-liste.png"></img></a></li>
            
                      <li><a href="acceuil.php?lien=creeradmin">Créer Admin<img class="imagess" src="../asset/img/icones/ic-ajout.png"></img></a></li>
                      <li><a href="acceuil.php?lien=listejoueurs&&page=0">Liste Joueurs<img class="imagess" src="../asset/img/icones/ic-liste.png"></img></a></li>
                      <li><a href="acceuil.php?lien=questions">Créer Questions<img class="imagess" src="../asset/img/icones/ic-ajout.png"></img></a></li>
                    </ul>
                  </div>
                  <?php 
                    if(empty($_SESSION['Admin'])){
                     // header("location:../index.php");
                      echo "<script type='text/javascript'>document.location.replace('../index.php');</script>";
                      exit();
                      }
                  ?>
                     <form method="post" action="" style="height: 380px" id="form">
                   <div id="cadre7" style=""> 
                   <?php
                      // Si la variable lien existe dans l'url, la variable $lien = 'accueil'
                      if (!isset($_GET['lien']) )
                        $lien= 'accueil';
                      // Sinon $lien est égal à la valeur de la variable lien qui provient de l'url
                      else
                        $lien= $_GET['lien'];

                      // Quand $lien vaut :
                      switch($lien) {
                          case 'listequestions':
                            include 'listequestion.php';
                            break;
                            case 'modifier':
                            include 'modifier.php';
                            break;
                          case 'creeradmin':
                            include 'creeradmin.php';
                            break;
                          case 'listejoueurs':
                            include 'listejoueurs.php';
                            break;
                          case 'questions':
                            include 'questions.php';
                            break;
                        
                        }
                        
                      ?>
                   
                    
                    </div>
                    </form>
                    
                  </div>
             </div>
        </div>
    </div>
</body>
</html>