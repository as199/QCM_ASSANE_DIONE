<?php
session_start();
 $questions = file_get_contents('./json/questions.json');
$questions= json_decode($questions, true);
$q=count($questions);
 $trouver = file_get_contents('./json/trouver.json');
$trouver= json_decode($trouver, true);
$id=$_SESSION['id'];
/*********************************************************************** */
$p=0;
if(!empty($trouver)){
   //var_dump($trouver); 
   foreach ($trouver as $key => $value) {
    // var_dump($value) ;
        foreach ($value as $clef => $valeur) {
           //echo $clef;
           
           if($clef==$id){
            
             $p=count( $trouver[$key][$id]);
             
            
           }
           
        }
    }
}
if($p==$q){
    //header("Location:./deconnecter.php");
    echo "<script type='text/javascript'>document.location.replace('./deconnecter.php');</script>";
}
/************************************************************************ */
$test=array();
unset($_SESSION['moncores']);

$_SESSION['trouver']=array();
function array_melange(&$array) {
    if (is_array($array)) {
        $keys = array_keys($array); 
        $temp = $array;
        $array = NULL;
        shuffle($temp); 
        foreach ($temp as $k => $item) {
            $array[$keys[$k]] = $item;
        }
        return;
    }
    return false;
}
 $data = file_get_contents('./json/temp.json');
$data= json_decode($data, true);
unset($data);
$contenu = json_encode($test);
file_put_contents('./json/temp.json',$contenu);


 $questions = file_get_contents('json/questions.json');
  $questions = json_decode($questions, true);
    array_melange($questions);
$contenu=json_encode(array_values($questions));
 file_put_contents('./json/questions.json',$contenu);
	
   // header("Location:joueur.php?page=0");
    echo "<script type='text/javascript'>document.location.replace('./joueur.php?page=0');</script>";
	exit();
?>