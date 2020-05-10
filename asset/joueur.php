<?php 
session_start();
//unset($_SESSION['moncores']);
if(empty($_SESSION['status'])){
   header("location:../index.php");
   exit();
}

//unset($_SESSION['trouver']);
$_SESSION['points']=0;
 $_SESSION['score']=0;
$_SESSION['photos']= $_SESSION['photo'];
$_SESSION['prenoms']=$_SESSION['prenom'];
$_SESSION['noms']=$_SESSION['nom'];
$_SESSION['id']=$_SESSION['id'];
$id=$_SESSION['id'];

/********************************traitement pour interdire les questions deja trouver********************************************* */
 $tabdejatrouver=array();
$dejatrouver = file_get_contents('json/trouver.json');
$dejatrouver= json_decode($dejatrouver, true);
//var_dump($dejatrouver);
/************les question à jouer************* */
 $ajouer = file_get_contents('json/ajouer.json');
$ajouer= json_decode($ajouer, true);
/**************les questions****************** */
 $questionsall = file_get_contents('json/questions.json');
  $questionsall = json_decode($questionsall, true);
  /************************************* */
  /**************les questions a jouer****************** */
 $contenu = file_get_contents('json/ajouer.json');
  $contenu = json_decode($contenu, true);
  /************************************* */
  /******on verifier et parcours les questions deja trouver de l'utilisateur si ca existe */
  if(!empty($dejatrouver)){
    for ($d=0; $d <count($dejatrouver) ; $d++) { 
      foreach ($dejatrouver[$d] as $key => $value) {
        if($key==$id){
          //echo"deja jouer".$key."et je suis id".$id;
          
          $tabdejatrouver=$dejatrouver[$d][$key];
          //var_dump($tabdejatrouver);
        }
      }
    }
    //var_dump($tabdejatrouver);
  }
  /******************on vide le tableau a jouer***************************** */
  $vider=array();
  $vide= file_get_contents('json/ajouer.json');
  $vide = json_decode($vide, true);
   $contenu=json_encode($vider);
     file_put_contents('./json/ajouer.json',$contenu);
  /******************************************************* */
   /*****************on parcour les questions pour retrouver les non trouver ********/
  if(!empty($questionsall)){
    $questionajouer=array();
     //var_dump($questionsall);
    for ($t=0; $t <count($questionsall) ; $t++) { 
      if(!in_array($questionsall[$t]['id'],$tabdejatrouver)){
        $fr=$questionsall[$t];
        array_push($questionajouer,$fr);
        $remplir= file_get_contents('json/ajouer.json');
        $remplir = json_decode($remplir, true);
        $remplir=json_encode($questionajouer);
          file_put_contents('./json/ajouer.json',$remplir);
        /******************************** */
       }else{
       
      }
    }
   
  }
   /**************decodage des questions a jouer****************** */
 $question= file_get_contents('json/ajouer.json');
  $question = json_decode($question, true);
  
     $questions=$question;
  
  /************************************* */
  /**********maintenant on verifie si les questions de jeu est vide */
 
/********************************************************************************************************************************* */
$po=[];
$tab2=array();
$tab=array();
$verif=[];
$t=0;
$q='';
$tab2=array();
 $limite = file_get_contents('json/questionparjeu.json');
$limite = json_decode($limite, true);
$_SESSION['fin']= $limite[0];
$data = file_get_contents('json/trouver.json');
$data = json_decode($data, true);

for ($i=0; $i <count($data) ; $i++) { 
  foreach ($data[$i] as $key => $value) {
  //echo $key;
 // echo"<br>";
}
}
// foreach ($data as $key => $value) {
//   echo $key;
// }

//var_dump($tab2);
/******************************** */

/********************************* */
//$index=isset($_GET['page'])?$_GET['page']:1;
 
 //var_dump($questions[3]);
 $question = file_get_contents('json/trouver.json');
$question = json_decode($question, true);
 //var_dump($question);
  
$data = file_get_contents('json/dejajouer.json');
  $data = json_decode($data, true);
$interdit = file_get_contents('json/trouver.json');
  $interdit = json_decode($interdit, true);
  
//print_r($interdit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">

  <style>
    .inputgener {
      width: 30%;
      height: 30px;
    }

    .checkgener {
      width: 10%;
      height: 20px;
    }

    #preview1 img {
      border-radius: 50%;
      width: 90px;
      height: 80px;
      overflow: cover;
    }

    .haute {
      height: 50px;
      background-color: aqua;
    }



    .dropbtn {
      background-color: #3e8e41;
      color: white;
      padding: 9px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    .dropdown {
      position: relative;
      display: inline-block;
      width: 50%;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #f9f9f9;
      min-width: 395px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      min-height: 248px;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: red;
    }

    .minip {
      margin-top: -2px;
      font-size: larger;
      font-family: fantasy;
      font-style: italic;
      color: aliceblue;
    }
    .suivantts{
      width: 100%;
    height: 40px;
    font-size: 18px;
    }
    .checkgener{
      float: left;
    width: 25px;
    height: 25px;
    }
    .div1{
      height:40px;
    }
    .inputgener{
      font-size: x-large;
    font-weight: 700;
    }
  </style>
  <title>Document</title>
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
        <div class="creer">
          <div class="pp2">
            <div id="moncercle12"><img id="preview1" style="   width: 60px;height: 60px;"
                src="./img/<?php echo $_SESSION['photo'];?>">
              <p class="minip"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']   ?> </p>
            </div>

          </div>
          <div class="pp1">
            <h4 class="titre1">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ<br />
              JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</h4>
          </div>

        </div>
        <div class="deconnexion"><a href="deconnecter.php"><input class="deconnecter" type="submit"
              onclick="if(!confirm('Voulez-vous vraiment vous déconnecter ?')) return false;" name="deconnexion"
              value="Déconnexion"></a></div>
      </div>
      <div id="cadres5">
        <form method="post" action="corrige.php">
          <div id="cadres15">
            <?php 
            if(count($questions)<$_SESSION['fin']){
              $_SESSION['fin']=count($questions);
            }
            if(empty($_SESSION['fin'])){
              $_SESSION['fin']=0;
            }
            ?>
            <div class="zone1">
              <input type="hidden" name="avoir" value="<?php if(!empty($questions)){echo $_GET['page'] ;}?>">
              <label class="question1"><span>QUESTION <?php if(!empty($questions)){ echo $_GET['page']+1;}else{echo"0";}?> /<?php if(!empty($questions)){ echo $_SESSION['fin'];}else{echo "0";} ?>
                </span> </label><input type="hidden" name="question" id="" value="<?php echo $questions[$_GET['page']]['question']; ?>"><br />
              <label class="question2"><?php if(!empty($questions)){ echo $questions[$_GET['page']]['question']; }?></label></br></br>
               <input type="hidden" name="score" value="<?php  echo $questions[$_GET['page']]['score'];  ?>">
               <input type="hidden" name="type" value="<?php echo $questions[$_GET['page']]['type'];  ?>">
              <label style="color:red;"><?php  ?></label>
              <input type="hidden" name="recordp" value="<?php echo $questions[$_GET['page']]['question']['score'];  ?>">
            </div>
            <?php 
                    if(empty($_SESSION['Admin'])){
                      header("location:../index.php");
                      exit();
                      }
                      if(empty($questions)){
                        $sms="Bravo vous avez épuisé le stock de questions du jeu !!!";
                        ?>
                          <marquee DIRECTION="left" HEIGHT="8%" WIDTH="100%" BGCOLOR="#458c1f"><label style="font-size:20px;"><?php echo $sms; ?> </label></marquee>
                        <?php
                      }
                  ?>
            <div class="zone2"><input class="zone2a" disabled="disabled" name="score"
                value="<?php if(!empty($questions)){ echo $questions[$_GET['page']]['score'] ;}?>"></input></div>
            <div class="zone3" style="padding-left: 10%;">
              <?php
              /********************************verifier s'il dois jouer cette question */
                      
                      if(!empty($questions)){

                  if(($questions[$_GET['page']]['type'])=="choixmultiple"){
                        $inp="input";
                     $check="choix";
                        for ($i=1; $i <=count($questions[$_GET['page']]['rep']) ; $i++) {
                          $inp=($questions[$_GET['page']]['rep'][$i]);
                          ?>
                            <div class="div1">
                            <label class='inputgener' ><?php echo $inp ;?></label><input type="hidden" name="reponse[]" value="<?php echo $inp ;?>">
                            <input class='checkgener' type='checkbox' name='rep[]' value='<?php echo $i ;?>'<?php
                              if(!empty($_SESSION['verif'])){
                                if(count($_SESSION['verif'])==1){
                                  if($i==$_SESSION['verif'][0]){
                                    echo "checked";
                                  }
                                }else{
                                  foreach ($_SESSION['verif'] as $key => $value) {
                                  if($i==$value){echo "checked";}}
                                }
                              }
                            ?>><br>
                            </div>
                           <?php
                        }
                      }
                        elseif (($questions[$_GET['page']]['type'])=="choixsimple") {
                          $inp="input";
                           $check="choix";
                              for ($i=1; $i <=count($questions[$_GET['page']]['rep']) ; $i++) {
                                $inp=($questions[$_GET['page']]['rep'][$i]);
                               ?>
                               <div class="div1">
                                <label class='inputgener' ><?php echo $inp ;?></label><input type="hidden" name="reponse[]" value="<?php echo $inp ;?>">
                                <input class='checkgener' type='radio' name='rep' value='<?php echo $i ;?>' <?php  if(!empty($_SESSION['bon'])){if($_SESSION['bon']==$i){echo "checked";}};?> '>
                               </div>
                               <?php
                              }
                        }
                        else{
                            
                           
                              for ($i=0; $i<1; $i++) {
                              ?>
                                <div class="div1">
                               <input class='inputgener' type='text' name='text<?php echo $i ;?>'value='<?php
                                if(!empty($_SESSION['vrais'])){echo $_SESSION['vrais'];} ?>'>
                               </div>
                               <?php
                              }
                        }
                      }
                          
                      
                         ?>



            </div>
            <div class="zone4">
              <div class="zone4g">
              <?php 
              
              if($_GET['page']>0) { 
                        ?>
                 <input class="suivantts" style="background-color: rgb(57, 221, 214);" type="submit" name="precedent"
                  value="precedent">
                  <?php
                       }else{

                       }
                        ?>
              </div>
              <div class="zone4d">
                <?php if(count($questions)<$_SESSION['fin']){$_SESSION['fin']=count($questions);}
                if($_GET['page']<$_SESSION['fin']-1 ) { 
                        ?>
                <input class="suivantts" style="background-color: rgb(57, 221, 214);" type="submit" name="suivant"
                  value="Suivant">
                <?php
                       }else{
                        ?>
                <a href="#"><input class="suivantts" style="background-color: rgb(57, 221, 214);display:<?php if(empty($questions)){echo "none" ; }?>" type="submit"
                    name="suivant" value="Terminer"></a>

                <?php
                      
                       } 
                        
                       ?>
              </div>
            </div>
          </div>
        </form>
        <div id="cadres25">
          <div class="dropdown" style="float:left;">
            <button class="dropbtn">Top Scores</button>
            <div class="dropdown-content" style="left:0;">
              <table class="tableaum">
                <?php 
                               $messages = file_get_contents('./json/score.json');
                                $messages = json_decode($messages, true);
                                $columns = array_column($messages, 'score');
                                if(!empty($messages)){
                                array_multisort($columns, SORT_DESC, $messages);}
                                if(count($messages)<5){
                                  $r=count($messages);
                                }
                                else{
                                  $r=5;
                                }
                               for ($i=0; $i <$r ; $i++) {

                            ?>

                <tr style="width:50%;height: 35px;">
                  <td style="text-align:width:50%; center;font-size: large;"><?php echo $messages[$i]['prenom']; ?>
                  <td style="text-align: center;font-size: large;"><?php echo $messages[$i]['nom']; ?>
                  </td>

                  <td style="text-align: center;font-size: large;"><?php echo $messages[$i]['score'].'pts'; ?>
                  </td>
                </tr>
                               <?php } ?>
              </table>
            </div>
          </div>
          <div class="dropdown" style="float:right;">
            <button class="dropbtn" style="float:width: 100%;">Mon meilleur score</button>
            <div class="dropdown-content">
              <table class="tableaum">
                <?php 
                              $tab=array();
                               $messages = file_get_contents('./json/score.json');
                                $messages = json_decode($messages, true);
                               
                                $columns = array_column($messages, 'score');
                                 array_multisort($columns, SORT_DESC, $messages);
                               for ($i=0; $i <count($messages) ; $i++) {

                                if($messages[$i]['prenom']==$_SESSION['prenom'] && $messages[$i]['nom']==$_SESSION['nom']&& $messages[$i]['id']==$_SESSION['id']){
                                  $t= $messages[$i]['score'];
                                   
                                 array_push($tab,$t);
                                    # code...
                                 }
                               }
                               if(!empty($tab)){
                               $score=max($tab);
                               }else{
                                 $score=0;
                               }
                            ?>

                <tr style="width:50%;height: 35px;">
                  <td style="text-align: right;width:50%;font-size: large;"><?php echo $_SESSION['prenom']; ?>
                  <td style="text-align: right;font-size: large;"><?php echo $_SESSION['nom']; ?>
                  </td>

                  <td style="text-align: right;font-size: large;"><?php echo $score.'pts'; ?>
                  </td>
                </tr>
                <?php   ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php   ?>
    </div>

  </div>
  </div>
</body>

</html>
<script>
  document.querySelector("#bouton").onclick = function () {
    if (document.querySelector("#mondiv1").style.display = (window.getComputedStyle(document.querySelector(
        '#mondiv1')).display == 'block')) {
      document.querySelector("#mondiv1").style.display = (window.getComputedStyle(document.querySelector('#mondiv1'))
        .display == 'none');
      document.querySelector("#mondiv").style.display = (window.getComputedStyle(document.querySelector('#mondiv'))
        .display == 'none');

    } else {
      document.querySelector("#mondiv").style.display = (window.getComputedStyle(document.querySelector('#mondiv'))
        .display == 'none') ? "block" : "none";

    }
  }
  document.querySelector("#bouton1").onclick = function () {
    if (document.querySelector("#mondiv").style.display = (window.getComputedStyle(document.querySelector('#mondiv'))
        .display == 'block')) {
      document.querySelector("#mondiv").style.display = (window.getComputedStyle(document.querySelector('#mondiv'))
        .display == 'none');
      document.querySelector("#mondiv1").style.display = (window.getComputedStyle(document.querySelector('#mondiv1'))
        .display == 'none') ? "block" : "none";

    } else {
      document.querySelector("#mondiv1").style.display = (window.getComputedStyle(document.querySelector('#mondiv1'))
        .display == 'none') ? "block" : "none";

    }

  }
</script>