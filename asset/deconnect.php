<?php
session_start();
$test=array();
unset($_SESSION['moncores']);
unset($_SESSION['trouver']);
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
	unset($_SESSION['Admin']) ;
	unset($_SESSION);
   // header("Location:../index.php");
    echo "<script type='text/javascript'>document.location.replace('../index.php');</script>";
	exit();
?>