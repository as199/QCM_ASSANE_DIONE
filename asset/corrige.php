<?php
session_start();
/************************decodage de fichiers json*************************************** */
$questions = file_get_contents('json/ajouer.json');
$questions = json_decode($questions, true);

$data = file_get_contents('json/temp.json');
  $data = json_decode($data, true);
  /********************fonction pour voir si deux tableau ont le meme contenu************** */
 function identical_values( $arrayA , $arrayB){
    sort($arrayA);
    sort($arrayB);
    return $arrayA==$arrayB;
}
/**************************************************************************************** */
$tab2=array();
if (!empty($_POST['suivant'])) { 
    /********on vide des variable de session** */
    unset($_SESSION['bon']);
    unset($_SESSION['verif']);
    unset( $_SESSION['vrais']);
    /**************************************** */
    $p=$_SESSION['fin'];
    $a=$_POST['avoir'];
    $t=$a+1;
     $_SESSION['sms']="";
    unset($_POST['suivant']);
    unset($_POST['avoir']);
    unset($_POST['recordp']);
    
 include'../src/fonction.php';

    /****encodage de donner dans un fichier json pour voi les reponse choise par le joueur**** */
    $data[$a]=$_POST;
    $contenu=json_encode(array_values($data));
    file_put_contents('./json/temp.json',$contenu);
    /******************************************************************************************** */
    unset($_POST['question']);
    unset($_POST['reponse']);
    unset($_POST['type']);
    unset($_POST['score']);

     $tab=$_POST;
     array_push($_SESSION['jeu'],$a);
     unset($_SESSION['sms']);
     $tab1=array();
      $tab2=[];
     $verif=array();
     $q='';
     $tabv=array();
     $tabf=[];
     $tail=0;
     $m='';
     $k='';
     $monid=$_SESSION['id'];
     
     if ($a<$p-1) {
        if($questions[$a]['type']=="choixmultiple" ||$questions[$a]['type']=="choixsimple"){
         if(count($tab)==0){
         $_SESSION['sms']="veuillez repondre à cette question pour continuer";
        }
     }
     else{
         if(!isset($_POST['text0'])){
             $_SESSION['sms']="veuillez repondre à cette question pour continuer";
         }
     }
     if(!empty($_SESSION['sms'])){
        $_SESSION['moncores']=$_SESSION['moncores']+0;
        //header("location:./joueur.php?page=$t");
        echo "<script type='text/javascript'>document.location.replace('./joueur.php?page=$t');</script>";
     }
     else{
      
        $jouer=$questions[$a]['id'];
        $monscore=$questions[$a]['score'];
        foreach ($tab["rep"] as $key => $value) {
            # code..
            array_push($tab1,$value);
        }
        if ($questions[$a]['type']=='choixmultiple') {/***************** Debut if de choix multiple */
            if ((count($questions[$a]['vrais']))==1) {
                $q=$questions[$a]['vrais'][0] ;
                array_push($verif,$q);
                $result=identical_values($tab1,$verif);
                if($result==1){
                    $_SESSION['moncores']=$_SESSION['moncores']+$monscore;
                    array_push($_SESSION['trouver'],$jouer);
                }
                else
                {
                   $_SESSION['moncores']=$_SESSION['moncores']+0;
                }
            
            }
            else
            {
                for ($i=0; $i<count($questions[$a]['vrais']) ; $i++) { 
                     $q=$questions[$a]['vrais'][$i];
                    array_push($verif,$q);
                  }
                 $result=identical_values($tab1,$verif);
                if($result==1){
                     $_SESSION['moncores']=$_SESSION['moncores']+$monscore;
                     array_push($_SESSION['trouver'],$jouer);
                }
                else
                {
                    $_SESSION['moncores']=$_SESSION['moncores']+0;
                 }
                
            }
        
         }/***************** fin if de choix multiple */
         elseif($questions[$a]['type']=='choixsimple'){ /***************** Debut elseif de choix simple */
           
            $y=$_POST["rep"];
            
            $q=$questions[$a]['vrais'];
            if($y==$q){
                $_SESSION['moncores']=$_SESSION['moncores']+$monscore;
                array_push($_SESSION['trouver'],$jouer);
            }
            else
            {
                $_SESSION['moncores']=$_SESSION['moncores']+0;
            }
            
         }/***************** fin elseif de choix simple */
         else
         {/***************** debut else de choix text */
            $tr=$_POST['text0'];
            $p=$questions[$a]['rep'];
            if($p==$tr){
                $_SESSION['moncores']= $_SESSION['moncores']+$monscore;
                array_push($_SESSION['trouver'],$jouer);
            }
            else{
                $_SESSION['moncores']=$_SESSION['moncores']+0;
            }
              
         }/***************** fin else de choix text */
         # code...
      echo "<script type='text/javascript'>document.location.replace('./joueur.php?page=$t');</script>";
         //header("location:./joueur.php?page=$t");
        }
     }/***fin if2 */
     else
     {
         $jouer=$questions[$a]['id'];
        if($questions[$a]['type']=="choixmultiple" ||$questions[$a]['type']=="choixsimple"){
            if(count($tab)==0){
            $_SESSION['sms']="veuillez repondre à cette question pour continuer";
            }
        }
        else{
            if(!isset($_POST['text0'])){
                $_SESSION['sms']="veuillez repondre à cette question pour continuer";
            }
        }
        if(!empty($_SESSION['sms'])){
             $_SESSION['moncores']=$_SESSION['moncores']+0;
            header("location:./terminer.php");
        }
        else
        {
        /***debut else du  if 2 */
            $monscore=$questions[$a]['score'];
            foreach ($tab["rep"] as $key => $value) {
                 array_push($tab1,$value);
            }
            if ($questions[$a]['type']=='choixmultiple') {/***************** Debut if de choix multiple */
                if (count($questions[$a]['vrais'][$i])==1) {
                    $q=$questions[$a]['vrais'][0] ;
                    array_push($verif,$q);
                    $result=identical_values($tab1,$verif);
                    if($result==1){
                        $_SESSION['moncores']=$_SESSION['moncores']+$monscore;
                        array_push($_SESSION['trouver'],$jouer);
                       
                    }
                    else
                    {
                        $_SESSION['moncores']=$_SESSION['moncores']+0;
                    }
                }
                else
                {
                    for ($i=0; $i<count($questions[$a]['vrais']) ; $i++) { 
                        $q=$questions[$a]['vrais'][$i];
                        array_push($verif,$q);
                    }
                    $result=identical_values($tab1,$verif);
                    if($result==1){
                        $_SESSION['moncores']=$_SESSION['moncores']+$monscore;
                        array_push($_SESSION['trouver'],$jouer);
                        
                    }
                    else
                    {
                        $_SESSION['moncores']=$_SESSION['moncores']+0;
                    }
            
                }
            
            }/***************** fin if de choix multiple */
            elseif($questions[$a]['type']=='choixsimple'){ /***************** Debut elseif de choix simple */
                $y=$_POST["rep"];
            
                $q=$questions[$a]['vrais'];
                if($y==$q){
                    $_SESSION['moncores']=$_SESSION['moncores']+$monscore;
                    array_push($_SESSION['trouver'],$jouer);
                    
                }
                else
                {
                    $_SESSION['moncores']=$_SESSION['moncores']+0;
                }   
                
            }/***************** fin elseif de choix simple */
            else
            {/***************** debut else de choix text */
                $tr=$_POST['text0'];
                $p=$questions[$a]['rep'];
                if($p==$tr){
                    $_SESSION['moncores']= $_SESSION['moncores']+$monscore;
                    array_push($_SESSION['trouver'],$jouer);
                    
                }
                else{
                    $_SESSION['moncores']=$_SESSION['moncores']+0;
                }
                
            }/***************** fin else de choix text */
                
            echo "<script type='text/javascript'>document.location.replace('./terminer.php');</script>";
            //header("location:./terminer.php");
        /***fin else du  if 2 */
        }
    }
}/**debut if 1 */
/*****************button précédent */
if(!empty($_POST['precedent'])){
    $_SESSION['bon']='';
    $tab2=array();
    $data = file_get_contents('json/temp.json');
    $data = json_decode($data, true);
    $questions = file_get_contents('json/questions.json');
    $questions = json_decode($questions, true);
    $a=$_POST['avoir'];
   
    if($a==0){
        $p=0;
    }
    else
    {
        $p=$a-1;
    }
    $decrement=$questions[$p]['score'];
    if($data[$p]['type']=='choixmultiple'){
        $_SESSION['verif']=array();
        if(count($data[$p]['rep'])==1){
        $bon=$data[$p]['rep'][0];
        array_push($_SESSION['verif'],$bon);
        if(count($questions[$p])==1){
            $vrais=$questions[$p]['vrais'][0];
        }
        if($vrais==$bon){
            $_SESSION['moncores']=$_SESSION['moncores']-$decrement;
        }
        }else{
            for ($i=0; $i <count($data[$p]['rep']) ; $i++) { 
                $bon=$data[$p]['rep'][$i];
                array_push($_SESSION['verif'],$bon);
            }
            foreach ($questions[$p]['vrais'] as $key => $value) {
                array_push($tab2,$value);
            }
            $result=identical_values($_SESSION['verif'],$tab2);
            if($result==1){
                $_SESSION['moncores']=$_SESSION['moncores']- $decrement;
            }
        }
        
    }elseif($data[$p]['type']=='choixsimple'){
        
        $_SESSION['bon']=$data[$p]['rep'];
        $vrais=$questions[$p]['vrais'];
        if($vrais==$_SESSION['bon']){
            $_SESSION['moncores']=$_SESSION['moncores'] - $decrement;
        }
        # code...
    }
    else
    {
        $_SESSION['vrais']=$data[$p]['text0'];
        $vrais=$questions[$p]['rep'];
        if($vrais==$_SESSION['vrais']){
        $_SESSION['moncores']=$_SESSION['moncores'] - $decrement;
        }
    }
          //header("location:./joueur.php?page=$p");
          echo "<script type='text/javascript'>document.location.replace('./joueur.php?page=$p');</script>";
}
       
    
/**************************************************************************************************************** */
?>