<?php
$questions = file_get_contents('json/questions.json');
  $questions = json_decode($questions, true);
 // var_dump($questions[2]);
  if(isset($questions)){
     for ($i=0; $i <count($questions) ; $i++) {
    foreach ($questions as  $value) {
      # code...*
    }
  }
  }
  $initial=count($questions);
  //var_dump($questions);
 
?>
<div class="haute">
                      <div class="droite">
                        <label class="droite1">Nbre de question/jeu</label>
                      </div>
                       <div class="milieua"><input class="milieu1" type="text" name="nbre"  value="<?php if(isset($_POST['nbre'])){echo $_POST['nbre'];}else{echo $_POST['nbre']=$initial;}?>"></div>
                        <div class="gauche"><input class="gauche1" type="submit" name="valide1" value="OK"></div>
                    </div>
                    <div class="milieu" style="width: 100%;">
                      <div class="questions" style="overflow:scroll;height: 310px;">
                        <!-- <table  class="tableaum"> -->
                         <!--  <tr>
                            <th style="width: 150px;font-size: large;">Nom</th>
                            <th style="width: 150px;font-size: large;">Prénom</th>
                            <th style="width: 150px;font-size: large;">Score</th>
                          </tr> -->
                            <?php 
                            if(!empty($_POST['valide1'])){
                              unset($_SESSION['p']);
                              if(!empty($_POST['nbre'])){
                                if($_POST['nbre']>=5){

                                $_SESSION['p']=$_POST['nbre'];
                                $limite = file_get_contents('json/questionparjeu.json');
                                $limite = json_decode($limite, true);
                                  if(!empty($limite)){
                                    $limite[0]=$_POST['nbre'];
                                    $limite= json_encode($limite);
	                                  file_put_contents("../asset/json/questionparjeu.json", $limite);
                                  }else{
                                    $limite[]=$_POST['nbre'];
                                    $limite= json_encode($limite);
	                                  file_put_contents("../asset/json/questionparjeu.json", $limite);
                                  }
                                  
                                }else{
                                   $msg="le nombre de question par jeu doit etre au moins égale à 5";
                                      echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                                }
                              }else{
                                $msg="Veuillez saisir le nombre de question par jeu ";
                                      echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                              }
                              }
                              if(!empty( $_SESSION['p'])){
                                $messages = file_get_contents('./json/questions.json');
                                $messages = json_decode($messages, true);
                                 $n=$_SESSION['p'];
                                 $_SESSION['nbre']=$n;
                                 
                                $nbjoueure=count($messages);
                                // echo "le nombre est".$nbjoueure;
                                $m=$nbjoueure%$n;
                                //echo "le modulo est".$m;
                                
                                  $nbages=((int)($nbjoueure/$n));
                               
                                
                                $page=0;
                                if(isset($_GET['page'])){
                                    $page=(int)$_GET['page'];
                                }
                                if ($page<$nbages){
                                  $nbf=($page*$n+$n);
                                }else{
                                  $nbf=$nbjoueure;
                                }
                                for ($i=$page*$n; $i<$nbf ; $i++) {

                           
                              # code...
                            
    
                              if(($questions[$i]['type'])=="choixmultiple"){
                                $d= count($questions[$i]['vrais']);
                                
                                 $inp="input";
                                 $check="choix";
                                 $p=0;
                                 $que=($questions[$i]['question']);
                                  $t=$i+1;
                                    echo "<label class='labgener'> ".$t." .".$que."<label>";
                                    echo "<br>";
                                    
                                  for ($l=1; $l <=count($questions[$i]['rep']) ; $l++) {

                                    
                                   
                                   // $que=($questions[$l]['question']);
                                    $inp=($questions[$i]['rep'][$l]);
                                    $check=($questions[$i]['vrais']);
                                    ?>
                                    <input class="checkgner" type="checkbox" name="check<?php echo $l;?>" <?php for ($f=0; $f <$d ; $f++) {  if(($questions[$i]['vrais'][$f])==$l){echo "checked";}} ?>><label class="inputgner"><?php echo $inp; ?><label><br>
                                   <?php
                                   echo "<br>";
                                  }
                      }
                        elseif (($questions[$i]['type'])=="choixsimple") {
                                 $d=(int) $questions[$i]['vrais'];
                               $que=($questions[$i]['question']);
                              $t=$i+1;
                              echo "<label class='labgener'> ".$t." .".$que."<label>";
                              echo "<br>";
                              $inp="input";
                               $check="choix";
                               $tre="checked";
                                  for ($l=1; $l <=count($questions[$i]['rep']) ; $l++) {
                                    
                                    $inp=($questions[$i]['rep'][$l]);
                                    
                                    ?>
                                     <input class="checkgner" type="radio" name="check<?php echo $i.$l;?>" <?php if($l==$d){echo "checked";}?> ><label class="inputgner"><?php echo $inp; ?><label><br>
                                    <?php
                                    echo "<br>";
                                  }
                        }
                        else{
                            
                              $que=($questions[$i]['question']);
                              $d=$questions[$i]['rep'];
                              $t=$i+1;
                             echo "<label class='labgener'> ".$t." .".$que."<label>";
                          
                              for ($l=0; $l<1; $l++) {
                                
                              echo "<br>";
                               echo "<input class='inputgener' type='text' name='text$l'value='$d' >";
                               echo "<br>";
                               }
                        }
                          # code...
                        } 
                         $page++;  

                    
                      } 
                                ?>
                          
                     
                      </div>
                      <div class="suivantes1">
                        <div class="suivantgaughe" style="height: 30px;float: right;">
                          <a href="./acceuil.php?lien=listequestions&&page=<?php if($page<$nbages){echo $page;}else{echo $nbages; }  ?>"> <label style="background-color: aqua; ">suivant</label> </a>
                        </div>
                        <div class="suivantprecedent">
                            <a href="./acceuil.php?lien=listequestions&&page=<?php if($_GET['page']==0){echo $_GET['page'];}else{echo $_GET['page']-1;}  ?>"> <label style="background-color: aqua; " >precedent</label> </a>
                        </div>
                    </div>
                    </div>
                      
                      
                      </div>
                    
                    </div>       