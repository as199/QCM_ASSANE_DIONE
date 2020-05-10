<?php session_start() ;

if(empty($_SESSION['status'])){
   header("location:../index.php");
   exit();
}
include('../src/fonction.php');
/**************************************fonction pour melanger et reindexer un tableau********** */

/************************************************************************************* */
$id=$_SESSION['id'];

/*********************************************************************************************** */
 $trouver = file_get_contents('./json/trouver.json');
 $trouver= json_decode($trouver, true);
 
 $t=0;
 $test=0;
  $samatest=array();
foreach ($_SESSION['trouver'] as $indice => $contenu) {
array_push($samatest,$contenu);
}
//var_dump($samatest);
        
if(!empty($trouver)){
        //var_dump($trouver); 
        foreach ($trouver as $key => $value) {
            // var_dump($value) ;
                foreach ($value as $clef => $valeur) {
                    if($clef==$id){
                        $test=1;
                        $position=$key;   
                    }
            
                }
        }
          
        
        if($test==1){
            $quesjouer=$trouver[$position][$id];
        
           // var_dump($trouver[$position][$id]);
            
            for ($i=0; $i <count($samatest) ; $i++) { 
                $po=$samatest[$i];
                //echo $po;
                if(!in_array($po,$trouver[$position][$id])){
                    array_push($trouver[$position][$id],$po);
                }
                # code...
            }
            //var_dump($trouver[$position][$id]);
             $contenu=json_encode($trouver);
             file_put_contents('./json/trouver.json',$contenu);
        }else{

            $tab=array($id=>$_SESSION['trouver']);
            array_push($trouver,$tab);
            $contenu=json_encode($trouver);
            file_put_contents('./json/trouver.json',$contenu);
        }
    
} 


 $true = file_get_contents('./json/temp.json');

/*********************************************************************************************** */
$test=array();
if(!empty($_SESSION['moncores'])){
    $score=$_SESSION['moncores'];
}
$message=array();
$tab5=array();
if(!empty($_SESSION['jeu'])){
    foreach ($_SESSION['jeu'] as $key => $value) {
        array_push($tab5,$value);
    }
}
/*************pour la recuperation des reponse selection pour faire le précédent***************** */
    $data = file_get_contents('./json/temp.json');
    $data= json_decode($data, true);
    
/***************************charger les infos du jours et le score dans un fichiers json*************/
$photo = $_SESSION['photo'];
if(empty($_SESSION['moncores'])){
  $_SESSION['moncores']=0;
}
$score=$_SESSION['moncores'];
 $prenom=$_SESSION['prenom'];
 $nom=$_SESSION['nom'];
 $id=$_SESSION['id'];
 
  $message['prenom']=$_SESSION['prenom'];
    $message['nom']=$_SESSION['nom'];
    $message['id']=$_SESSION['id'];
   
    $message['score']=$_SESSION['moncores'];
$user = file_get_contents('./json/score.json');
$user =json_decode($user,true);

$p=0;
if(!empty($user)){
 $m=count($user);
}

 if(!empty($user)){
     for ($f=0; $f <$m ; $f++) { 
         if($user[$f]['prenom']==$prenom && $user[$f]['nom']==$nom  && $user[$f]['id']==$id ){
             if($user[$f]['score']<$score) {
              $user[$f]=$message;
              $user= json_encode($user);
             file_put_contents('./json/score.json', $user);
           }
         }else{
             array_push($user,$message);
              $user= json_encode($user);
             file_put_contents('./json/score.json', $user);
         }
     }
    
    }else{
          array_push($user,$message);
            $user= json_encode($user);
            file_put_contents('./json/score.json', $user);
     }
 }else{
     $user[] = $message;
    $user= json_encode($user);
     file_put_contents('../json/score.json', $user);

 }

/************enregistrement des questions déja jour pour la modification et la suppression************/
$tab = file_get_contents('./json/dejajouer.json');
$tab =json_decode($tab,true);
$tab= array_unique($tab5) ;
$tab= json_encode(array_values($tab));
file_put_contents('./json/dejajouer.json', $tab);
/******************decodage puis melanger l'ordre des question puis encodage************************** */
 $questions = file_get_contents('json/ajouer.json');
  $questions = json_decode($questions, true);
 //var_dump($_SESSION['mestrouver']);
  /************************************************************************************************* */
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Terminer</title>
    <style>
    *{
        padding:0px;
        margin:0px;
    }
    .sous{
        width:80%;margin-left:10%;
        margin-right:10%;
        height:550px;
        margin-top:25px;
        background-color: white;
    }
    .input6{
       background-image: url(./img/icones/img-bg.jpg);
       background-image:no-repeat;
        height:597px;
        width:100%;
    }
    .contenir{
     width: 20%;
    margin-right: 10%;
    height: 400px;
    /* background-color: red; */
    float: left;
    margin-top: 59px;
    margin-left: 100px;
    }
    #gauche{
    width: 60%;
    background-color: white;
    height: 550px;
    float: left;
    }
     #droit{
    width: 40%;
   
    height: 550px;
    float: right;
    }
    #gauche1{
    height:90px;
   
    }
     #droit1{
    height:90px;
    background-color:orange;
    }
    .score{
        height:90px;
       
    }
     #gauche2{
    height: 440px;
    background-color: white;
    margin-top: 10px;
    width: 90%;
    margin-left: 5%;
    overflow: scroll;
    }
    #droit2{
        height:440px;
        
        margin-top: 10px;
    }

    #gauche1a{
   
    height: 90px;
    width: 20%;
    float: left;
    }
     #preview1 {
    width: 90px;
    height: 90px;
    border-radius: 50px;
    }
    
    #gauche1b{
    width: 80%;
   
    height: 90px;
    float: right;
    }
     #label1{
     margin-left: 52px;
    font-size: larger;
    font-weight: 800;
    font-family: sans-serif;
     }
     #label2{
     margin-left: 52px;
     }
     .generer{
    height: 40px;
    margin-top: 5px;
    margin-bottom: 6px;
    
     }
     .textgenerer{
    width: 40%;
    height: 25px;
    border-radius: 5px;
    font-size: inherit;
    margin-top: 10px;
    font-weight: 700;
     }
     #inputgener{
         font-size: x-large;
        
    }
    .checkgener{
    width: 25px;
    height: 25px;
    float: left;
    }
    #inputgenerer{
    font-size: 25px;
    margin-left: 15px;
    font-weight: 800;
    }
    #label2{
     margin-left: 52px;
    font-weight: bolder;
    color: black;
    font-size: larger;
    }
     #label3{
     margin-left: 5px;
    font-weight: bolder;
    color: black;
    }
    .apreciation{
    height: 250px;
   
    }
    #bas{
    height: 100px;
    
    }
    .basgauche{
        float:left;
        width: 70%;
    
    height: 100px;

    }
    .basdroit{
        float:right;
        height: 100px;
    width: 30%;
    
    }
    .block{
        height:70px;
        width:100%;
    }
    .block2{
        height:60px;
        width:100%;
    }
    a{
    font-size: larger;
    color: black;
    }
    #btn{
    width: 80%;
    height: 35px;
    background-color: aqua;
    color: white;
    }
    </style>
</head>
<body id="body1">
    <div id="container2">
        <div class="input6">
            <div class="sous" style="">
               <div id="gauche">
                <div id="gauche1">
                    <div id="gauche1a">
                        <img id="preview1" src="./img/<?php echo $_SESSION['photos'];?>">
                    </div>
                    <div id="gauche1b"><br><br><label id="label1">Historique des questions répondues</label></div>
                </div>
                <div id="gauche2">
                <?php
                /******************************************** */
                   
                                        /*********************************************** */ 
                for ($i=0; $i <count($data); $i++) { //debut
                    if($data[$i]['type']=='choixmultiple'){
                        $result1=array();
                        $tabon=($questions[$i]['vrais']);
                        if (array_key_exists('rep', $data[$i])){
                        $verif =($data[$i]['rep']);
                        }
                        else{
                             $verif =($questions[$i]['rep']);
                        }
                        $result = array_intersect($tabon, $verif);
                       $result1 =array_values( array_diff($verif, $tabon));
                       
                        $tabdata=array();
                         ?><!--  affichage de la question-->
                        <label id='inputgener'><?php echo $data[$i]['question'];?></label><br>
                        <?php //<!-- fin affichage de la question-->

                        for ($j=0; $j <count($data[$i]['reponse']) ; $j++) { 
                            
                           
                         ?>  <!-- affichage des inputs et checkbox-->
                         <div class="generer">
                        <input class='checkgener' type='checkbox' name='rep[<?php echo $j; ?>]'<?php if (array_key_exists('rep', $data[$i])){ for ($k=0; $k <count($data[$i]['rep']); $k++){ if($data[$i]['rep'][$k]==$j+1){ echo "checked"; } }} ?> >
                        <label id='inputgener'<?php for ($m=0; $m <count($result) ; $m++) { 
                            if($result[$m]==$j+1){ echo"style='background-color:green'";}else{
                                for ($n=0; $n <count($result1) ; $n++) { 
                                    if((int)$result1[$n]==$j+1){echo"style='background-color:red'";}
                                }
                            }
                        } ?>  ><?php echo $data[$i]['reponse'][$j];?></label><br>
                        </div>
                        <?php //<!-- fin affichage des inputs et chexkbox-->
                        }
                    
                    }elseif ($data[$i]['type']=='choixsimple') {
                        $bon=$questions[$i]['vrais'][0];
                        if (array_key_exists('rep', $data[$i])){
                            $ver=$data[$i]['rep'][0];
                        }else{

                             $ver=100;
                        }
                        
                         $tabdata=array();
                        ?><!-- affichage de la question-->
                        <label id='inputgener'><?php echo $data[$i]['question'];?></label><br>
                        <?php //<!-- fin affichage de la question-->

                        for ($j=0; $j <count($data[$i]['reponse']) ; $j++) { 
                            if (array_key_exists('rep', $data[$i])){
                            array_push($tabdata,$data[$i]['rep'][0]);
                            }
                        ?><!-- affichage des inputs et radio-->
                        <div class="generer">
                        <input class='checkgener' type='radio' name='rep[<?php echo $j; ?>]'<?php 
                        if(!empty($data[$i]['rep'])){
                            if($data[$i]['rep'][0]==$j+1){
                                echo "checked";
                                
                                }}  ?>>
                        <label id='inputgener' <?php if($bon==$ver && $ver==$j+1){ echo"style='background-color:green'";}else{
                            if($bon!=$ver && $ver==$j+1){ echo"style='background-color:red'";}
                        }  ?> ><?php echo $data[$i]['reponse'][$j];?></label><br>
                        </div>
                        <?php //<!-- fin affichage des inputs et radio-->
                        }
                        
                    }else{
                        $bonn=$questions[$i]['rep'];
                         if (array_key_exists('text0', $data[$i])){
                        $verr=$data[$i]['text0'];
                         }else{
                             $verr="";
                         }

                        ?><!-- affichage de la question-->

                        <label id='inputgener'><?php echo $data[$i]['question'];?></label><br>
                        <?php //<!-- fin affichage de la question-->

                         ?><!-- affichage des inputs -->
                         <div class="generer">
                        <input class='textgenerer' type='text' name='rep[]' value="<?php echo $data[$i]['text0'];?>" 
                        <?php 
                        if(!empty($verr)){
                        if($bonn==$verr){
                            echo"style='background-color:green'";
                            }else{echo"style='background-color:red'";} } ?>><br><br>
                        </div>
                       <?php //<!-- fin affichage des inputs-->

                    }



                }//fin
                ?>
                </div>
               </div>
               <div id="droit">
                    <div id="droit1"><br><br><label id="label2"><?php echo $_SESSION['prenom'] ?></label><label id="label3"><?php echo $_SESSION['nom'] ?></label>
                    <label id="label3">vous venez de terminé votre jeu !!!!!!</label>
                    </div>
                    <div id="droit2">
                        <div class="score">
                        <br><label id="label2">Votre score est de :</label><label id="label2"><?php echo $_SESSION['moncores'];?></label>
                        </div>
                        <div class="apreciation"></div>
                        <div id="bas">
                            <div class="basgauche">
                                <div class="block"></div>
                                <a href="rejouer.php">Cliquez pour rejouer</a>
                            </div>
                            <div class="basdroit">
                            <div class="block2"></div>
                                <a href="./deconnect.php"><input type="submit" id="btn" value="Déconnexion" onclick="if(!confirm('Voulez-vous vraiment vous déconnecter ?')) return false;"></a>
                            </div>
                        </div>
                    </div>
               </div>
               
            </div>
        </div>
    </div>
</body>
</html>
<?php
 
?>
