<?php

  // function affichertab($nb1,$tab){
  //   echo "<table border=1>";
  //   $test=0;
    
  //   if((count($tab)-$nb1)<=5){
  //     $delim=count($tab);
  //   }else{
  //     $delim=$nb1+5;
  //   }
  //   for ($i=$nb1; $i < $delim; $i++) { 
  //     if($test==0){
  //       echo "<tr>";
  //       echo "<td>".$tab[$i]."</td>";
  //       $test++;
  //     }else{
  //       if ($test==9) {
  //         echo "<td>".$tab[$i]."</td>";
  //         echo "</tr>";
  //         $test=0;
  //       }else {
  //         echo "<td>".$tab[$i]."</td>";
  //         $test++;
  //       }
  //     }
  //   }
  //   echo "</table>";
  // }


function connexion($login,$pass){
	$users=getData();
	foreach ($users as $key => $user) {
		if($user['login']===$login && $user['password']===$pass){
			$_SESSION['user']=$user;
			$_SESSION['status']="login";
			if($user['type']==="joueur"){
				
				return "jeux";
				
			}
			else
			{
				
				return "accueil";
			}
			
		}

	}

	
	return "error";
	
}
function veriflogin($login){
	$users=getdatas($file="base");
	foreach ($users as $key => $user) {
	if($user['login']===$login ){
		return "vrai";
	}else{
		return "faux";
	}	
	}
}

function is_connect(){
	if(!isset($_SESSION['status'])){
		header("location:../index.php");
	}
}
function is_connecter(){
	if(!isset($_SESSION['status'])){
		header("location:index.php?status=logout");
	}
}

function deconnexion(){
	unset($_SESSION['user']) ;
	unset($_SESSION['status']) ;
	session_destroy();
}

function getData($file="base"){
	$data=file_get_contents("./asset/json/".$file.".json");
	$data=json_decode($data,true);
	return $data;
}
function getDatas($file="base"){
	$data=file_get_contents("./json/".$file.".json");
	$data=json_decode($data,true);
	return $data;
}
function encoder($file,$tab){
	$js = file_get_contents("../asset/json/".$file.".json");
	$js =json_decode($js,true);
	$js[]=array_unique($tab);
	$js= json_encode(array_values($js));
	file_put_contents("../asset/json/".$file.".json", $js);
}

?>