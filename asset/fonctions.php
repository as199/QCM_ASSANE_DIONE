<?php
  // fonction F3
function CorrigePhrases($texte)
{
//Nous allons tenter de recuperer l'ensemble des phrases.
if(preg_match_all("#[A-Za-z]{1}([^.!?]|([.][0-9]))*[.!?]#m", $texte,$phrases)){
//Recuperation des phrases et l'insertion dans un tableau...
  foreach ($phrases[0] as $value)
  {
    $value = preg_replace('#\s\s+#'," ", $value);// c'est une     espace
    $value = preg_replace('#\’\s+#',"’", $value);// C’  est
    $value = preg_replace('#\s+\’#',"’", $value);//C  ’est
    $value = preg_replace('#\'\s+#',"'", $value);//C'  est
    $value = preg_replace('#\s+\'#',"'", $value);//C  'est
    $value = preg_replace('#\(\s+#',"(", $value);//(   je suis belle)
    $value = preg_replace('#\s+\)#', ")",$value);//(je suis juste extraordinaire   )
    $value = preg_replace('#\s+,#', ",", $value);// une femme ambitieuse   ,que suis je
    $value = preg_replace('#,\s+#', ",", $value);//une femme battante,   que suis je
    $value = preg_replace('#\s+\.#', ".",$value);//il faut toujours etre patient  .
    $Tableau[]= $value;
  }
  foreach ($Tableau as $value)
  {
    if (preg_match("#^[a-z]#", $value))
    {
        $b=strtoupper($value[0]);
        $value = preg_replace("#^[a-z]#",$b, $value);
        $TabCorrige[] =$value; 
    }
        else
        {
            $TabCorrige[] =$value; 
        }
       
  }
  foreach ($TabCorrige as  $value) {
          echo $value;
        } 
return  $value;
}

else{
  echo "<p>ERROR cette phrase n'as pas de fin!!!</p>";
}

}
  function premier($value)
  {
    $tab=[];
    for ($i=2; $i <= $value; $i++) {
        $nbdiv=0;
        for ($j=1; $j <=$i ; $j++) {
           if ($i%$j==0) {
             $nbdiv++;
           }
        }
        if ($nbdiv==2) {
          $tab[]=$i;
        }
    }
    return $tab;
  }

  // Fonction qui permet de calculer la moyenne

  function moyenne($tab){
    $somme=0;
    $moyenne=0;
    for ($i=0; $i < count($tab); $i++) {
      $somme+=$tab[$i];
    }
    $moyenne=$somme/count($tab);
    return $moyenne;
  }

  // function affichage N

  function affichertab($nb1,$tab){
    echo "<table border=1>";
    $test=0;
    
    if((count($tab)-$nb1)<=15){
      $delim=count($tab);
    }else{
      $delim=$nb1+15;
    }
    for ($i=$nb1; $i < $delim; $i++) { 
      if($test==0){
        echo "<tr>";
        echo "<td>".$tab[$i]."</td>";
        $test++;
      }else{
        if ($test==3) {
          echo "<td>".$tab[$i]."</td>";
          echo "</tr>";
          $test=0;
        }else {
          echo "<td>".$tab[$i]."</td>";
          $test++;
        }
      }
    }
    echo "</table>";
  }

  // Afficher Calendrier
  function affichecalendar($tab){
    echo "<table style='border:1px solid black;'>";
    $d=0;
    for ($i=1; $i <= 4; $i++) { 
        echo '<tr>';
        for ($j=1; $j <= 3; $j++) { 
                $d++;
                echo '<td>'.$d.'</td>';
                echo '<td>'.($tab[($d-1)]).'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}




function verifcompteur($valeur,$longueur){
  $i=0;
  $is_valid=true;
  do {
      $i++;
  } while (isset($valeur[$i]));


  if ($i>$longueur) {
      $is_valid=false;
  }
  return $is_valid;
}


function is_minuscule($lettre){
  $minuscules = "azertyuiopqsdfghjklwxcvbnm";
  for($i=0;$i<26;$i++){
      if($minuscules[$i]==$lettre){
          return true;
      }
  }
  return false;
}

function est_caractere($car){
  return (($car >='a' && $car <='z') || ($car >='A' && $car <='Z'));
 }

 function est_minuscule($car){
          return ($car >='a' && $car <='z');
        }

function est_majuscule($car){
  return ($car >='A' && $car <='Z');
}

function convert_minuscule($car){
  // Verifier si le caractere est une lettre alphabet
  if(est_caractere($car)){
    // Verifier si le caractere est majuscule
    if (est_majuscule($car)) {
      // Defionition de l'alphabet
      $minuscules = "abcdefghijklmnopqrstuvwxyz";
      $majuscules = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      // Verification et correspondance
      for($i=0;$i<26;$i++){

        if($majuscules[$i]==$car){
            return $minuscules[$i];
        }
      }
    }else {
      return $car;
    };
  }else{
    return $error="c'est pas un caractere";
  }
}


function convert_majuscule($car){
  // Verifier si le caractere est une lettre alphabet
  if(est_caractere($car)){
    // Verifier si le caractere est majuscule
    if (est_minuscule($car)) {
      // Defionition de l'alphabet
      $minuscules = "abcdefghijklmnopqrstuvwxyz";
      $majuscules = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      // Verification et correspondance
      for($i=0;$i<26;$i++){

        if($miniscules[$i]==$car){
            return $majuscules[$i];
        }
      }
    }else {
      return $car;
    }
  }else{
    return $error="c'est pas un caractere";
  }
}

function comptemots($mot,$caractere){
  $i=0;
  $verifM=false;
  do {
      if ($mot[$i]==$caractere || $mot[$i]==strtoupper($caractere)) {
          $verifM=true;
          break;
      }
      $i++;
      
  } while (isset($mot[$i]));

  return $verifM;
}


function verifmot($mot){
  $i=0;
  while (isset($mot[$i])) {
    if(est_caractere($mot[$i])==FALSE){
      return FALSE;
    }
    $i++;
  }
  if($i==0 || $i==1){
    return FALSE;
  }
  return TRUE;
}


function est_chiffre($car){
	return ($car >'0' && $car <='9');
}

function verifnombre($mot){
  $i=0;
  while (isset($mot[$i])) {
    if(est_chiffre($mot[$i])==FALSE){
      return FALSE;
    }
    $i++;
  }
  if($i==0){
    return FALSE;
  }
  return TRUE;
}


 ?>
