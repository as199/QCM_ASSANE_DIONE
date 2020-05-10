 <style type="text/css">
    .inputgener {
        margin-left: 12%;
        width: 40%;
        height: 32px;
        border-radius: 5px !important;
    }

    .checkgner {
        margin-left: 10%;
        border-color: blue;
    }

    .labgener {
        font-size: larger;
        font-family: inherit;
    }

    #typ {
        height: 30px;
        border-radius: 5px;
        font-size: large;
    }

    #nbrep {
        width: 69px;
        height: 25px;
        border-radius: 5px;
    }

    #btmodifier {
        
        background-color: aqua;
       
        height: 25px;
        border-radius: 5px;
    }

    .basm {
        height: 40px;

    }

    .country {
        display: none;
    }

    #validerm {
        width: 100px;
        height: 30px;
        background-color: aqua;
        font-size: larger;
        font-weight: bold;
        margin-left: 30px;
        margin-left: 210px;
    }
    #score{
    width: 50px;
    margin-left: 5%;
    height: 25px;
    border-radius: 4px;
    font-size: large;
    color: black;
    font-family: fantasy;
    }
    #btnadd{
     margin-left: 5%;
      height: 30px;
      width: 5%;
      background-image:url('./img/icones/ic-ajout-réponse.png');
      background-size:cover;

    }
    #question{
    overflow: scroll;
    height: 25px;
    margin-left: 11%;
    border-radius: 5px;
    width: 45%;
    font-size: large;
    padding: 5px;
    font-family: inherit;
    }
    .inputgener{
      font-size: large;
    font-weight: bold;
    }
    .checkgener{
      height: 20px;
    width: 20px;
    }
    .pts{
      margin-left: -1px;
    font-size: large;
    font-weight: bold;
    }
    .deletgener {
    width: 22px;
    height: 25px;
    background-image: url(./img/icones/ic-supprimer.png);
    background-size: cover;
}
  #delete{
    background-color: red;
        height: 25px;
    width: 70px;
    border-radius: 5px;
    float: right;
    margin-top: 4px;
  }
    </style>
 <div class="haute">
                            <div class="droitem">
                                <!-- <label for="type">Choisir la question</label> -->
                                <select id="typ" name="indice">
                                    <option disabled="" selected=""><?php if(!empty($_POST['indice'])){echo $_POST['indice'];}else{echo "Choisir la question";}  ?></option>
                                    <?php
                                  
                                    for ($i=1; $i <=count($questions) ; $i++) { 
                                           
                                             
                                  ?>
                                    <option><?php echo $i; ?> </option>
                                    <?php 
                                    }     
                                  ?>
                                </select>

                                <select id="typ" name="typ">
                                    <option disabled="" selected=""><?php if(!empty($_POST['typ'])){echo $_POST['typ'];}else{echo "Type de réponse";}  ?> </option>
                                    <option value="choixmultiple">choix multiple </option>
                                    <option value="choixsimple">choix simple </option>
                                    <option value="choixtext">choix text</option>
                                </select>
                                <input type="text" id="nbrep" name="nbrep" placeholder="Nbr reponse" pattern="^(1|2|3|4|5|6|7|8|9)[0-9]*$" value="<?php if(!empty($_POST['nbrep'])){echo $_POST['nbrep'];} ?>">
                                <input type="submit" id="btmodifier" name="modifier" value="Modifer"><input type="submit" id="delete" name="delete" value="supprimer">
                            </div>
                                

                        </div>
                        <div class="milieum"id="milieum" style=";width: 100%;height: 329px;overflow: scroll;">
                          
                            <?php
                            if (!empty($_POST['delete'])) {
                               $sms='';
                                  if (!empty($_POST['indice']) ) {
                                      $q=$_POST['indice'];
                                    unset($_POST['modifier']);
                                   
                                  
                                    $s=$q-1;
                                    $test=0;
                                    
                                    $score=$questions[$s]['score'];
                                    $data=file_get_contents("./json/dejajouer.json");
                                    $data=json_decode($data,true);
                                    if(!empty($data)){
                                    for ($i=0; $i <count($data) ; $i++) { 
                                      if($s==$data[$i]){
                                        $test=1;
                                      }
                                      
                                    }
                                  }
                                    if($test==1){
                                      $sms="cette questions ne peut pas être supprimer!";
                                      echo "<script language=\"javascript\">alert(\"".$sms."\");</script>\n";
                                    }else{
                                     
                                      unset($questions[$s]);
                                      $contenu=json_encode(array_values($questions));
                                      file_put_contents('./json/questions.json',$contenu);
                                    // var_dump($questions);
                                    
                                    }
                              }
                              else{
                                $sms="Veuillez choisir la question à supprimer!";
                                  echo "<script language=\"javascript\">alert(\"".$sms."\");</script>\n";
                                }
                            }
                            /*********************************************************************** */
                        if(!empty($_POST['modifier'])){
                             $sms="";
                          if (!empty($_POST['indice']) && !empty($_POST['typ']) && !empty($_POST['nbrep'])) {
                           
                            $q=$_POST['indice'];
                            unset($_POST['modifier']);
                            //var_dump($_POST);
                            $t=$_POST['typ'];
                            $n=$_POST['nbrep'];
                            $s=$q-1;
                            $test=0;
                            $score=$questions[$s]['score'];
                            $data=file_get_contents("./json/dejajouer.json");
                            $data=json_decode($data,true);
                            if(!empty($data)){
                            for ($i=0; $i <count($data) ; $i++) { 
                              if($s==$data[$i]){
                                $test=1;
                              }
                              # code...
                            }
                          }
                            if($test==1){
                              $sms="cette questions ne peut pas être modifier!";
                               echo "<script language=\"javascript\">alert(\"".$sms."\");</script>\n";
                            }else{
                             
                            ?><input type="text" id="question" value="<?php echo $questions[$s]['question'] ?>" name="question">
                              <input type="text" id="score" value="<?php echo $score;?>" name="score" placeholder="score">
                              <input type="hidden"  value="<?php echo $questions[$s]['id'];?>" name="id" >
                              <label class='pts'>pts</label><button type="button" id="btnadd" onclick="genere()"></button> <br><br>
                                <input type="hidden" id="type" value="<?php if(!empty($_POST['typ'])){echo $_POST['typ'];} ?>" name="type">
                                
                            <?php
                            
                            
                            if ($questions[$s]['type']==$t) {
                              if ($t=='choixmultiple') {
                                 $p=count($questions[$s]['rep']);
                                if($n>=$p){
                                for ($i=$p; $i <=$n ; $i++) { 
                                  for ($i=1; $i <=count($questions[$s]['rep']) ; $i++) { 
                                      $reponse=$questions[$s]['rep'][$i];
                                       echo "<div id='generer_$i'>";
                                      echo "<input class='inputgener' type='text' name='rep[$i]'value='$reponse' >
                                      <input class='checkgener' type='checkbox' value='$i' name='vrais[]' ><button type='button' class='deletgener' onclick='ondelete($i)'></button><br>";
                                      echo "<br>";
                                       echo "</div>";
                                  }
                                  
                              
                              for ($i=$p; $i <$n ; $i++) { 
                                    $t=$i+1;
                                  echo "<div id='generer_$t'>";
                                 echo "<input class='inputgener' type='text' name='rep[$t]'value=''placeholder='reponse$t' >
                                  <input class='checkgener' type='checkbox' value='$t' name='vrais[]' ><button type='button' class='deletgener' onclick='ondelete($t)'></button><br>";
                                  echo "<br>";
                                  echo "</div>";
                              }
                                }
                              }else{
                                for ($i=0; $i <$n; $i++) {
                                  $a=$i+1; 
                                      echo "<div id='generer_$i'>";
                                      echo "<input class='inputgener' type='text' name='rep[$i]'value='' placeholder='reponse$a' >
                                      <input class='checkgener' type='checkbox' value='$i' name='vrais[]' value='$a' ><button type='button' class='deletgener' onclick='ondelete($i)'></button><br>";
                                      echo "<br>";
                                      echo "</div>";
                                  }
                              }
                                # code...
                              }/********choixmultiple***************************/
                              elseif ($t=='choixsimple') {
                                 $p=count($questions[$s]['rep']);
                                if($n>=$p){
                                for ($i=$p; $i <=$n ; $i++) { 
                                  for ($i=1; $i <=count($questions[$s]['rep']) ; $i++) {
                                  $a=$i+1; 
                                      $reponse=$questions[$s]['rep'][$i];
                                      echo "<div id='generer_$i'>";
                                      echo "<input class='inputgener' type='text' name='rep[$i]'value='$reponse' >
                                      <input class='checkgener' type='radio' name='vrais' value='$i' ><button type='button' class='deletgener' onclick='ondelete($i)'></button><br>";
                                      echo "<br>";
                                      echo "</div>";
                                  }
                                  
                              
                              for ($i=$p; $i <$n ; $i++) { 
                                    $t=$i+1;
                                  echo "<div id='generer_$t'>";
                                 echo "<input class='inputgener' type='text' name='rep[$t]'value=''placeholder='reponse$t' >
                                  <input class='checkgener' type='radio' name='vrais' value='$t'><button type='button' class='deletgener' onclick='ondelete($t)'></button><br>";
                                  echo "<br>";
                                  echo "</div>";
                              }
                                }
                              }else{
                                for ($i=1; $i <=$n; $i++) {
                                  $a=$i+1; 
                                      echo "<div id='generer_$i'>";
                                      echo "<input class='inputgener' type='text' name='rep[$i]'value='' placeholder='reponse$i' >
                                      <input class='checkgener' type='radio' name='vrais' value='$i' ><button type='button' class='deletgener' onclick='ondelete($i)'></button><br>";
                                      echo "<br>";
                                      echo "</div>";
                                  }
                              }
                              }/*****************choixsimple********************/
                              else{
                                $reponse=$questions[$s]['rep'];
                                echo "<div id='generer_$i'>";
                                  echo "<input class='inputgener' type='text' name='text0'value='$reponse' >
                                  <br>";
                                  echo "<br>";
                                  echo "</div>";
                              }
                              
                            }/********************si le type ne correspond pas******/
                            else{
                              if($t=='choixmultiple'){
                                for($i=1;$i<=$n;$i++){
                                  $t=$i+1;
                                  echo "<div class='generer' id='generer_$i'>";
                                  echo "<input class='inputgener' type='text' name='rep[$i]'value=''placeholder='reponse$i' >
                                  <input class='checkgener' type='checkbox' value='$i' name='vrais[]' ><button type='button' class='deletgener' onclick='ondelete($i)'></button><br>";
                                  echo "<br>";
                                  echo "</div>";
                                }
                              }
                              elseif($t=='choixsimple'){
                                for($i=1;$i<=$n;$i++){
                                  $t=$i+1;
                                  echo "<div class='generer' id='generer_$i'>";
                                  echo "<input class='inputgener' type='text' name='rep[$i]'value=''placeholder='reponse$i' >
                                      <input class='checkgener' type='radio' name='vrais' value='$i' ><button type='button' class='deletgener' onclick='ondelete($i)'></button><br>";
                                    echo "<br>";
                                    echo "</div>";
                                }
                              }else{
                                echo "<div class='generer' id='generer_$i'>";
                                 echo "<input class='inputgener' type='text' name='text0'value='' ><br>";
                                echo "<br>";
                                echo "</div>";
                              }

                            }
                           
                          }
                        }else{
                          $sms="Veuillez remplir tous champs pour procéder à la modification de la question!";
                               echo "<script language=\"javascript\">alert(\"".$sms."\");</script>\n";
                        }
                        
                        }
                       ?>
                        </div>
                       
                        <script>
                         
                          function ondelete(n) {
                                 var target = document.getElementById('generer_'+n);
                                 target.remove();
                                 
                               }
                        </script>

                         <div class="basm">
                            <input type="hidden" name="save"
                                value="<?php if(isset($_POST['indice'])){echo$_POST['indice']; }    ?>"><input
                                type="submit" name="valider" id="validerm" value="Valider" <?php if(empty($_POST['score'])){ }?>>
                        </div>

                    <?php 
                        if (!empty($_POST['valider'])) {
                          if(!empty($_POST['score'])){
                          $p=$_POST['save'];
                          $po=$p-1;
                          unset($_POST['nbrep']);
                          unset($_POST['valider']);
                          unset($_POST['save']);
                          $tab=$_POST;
                          //var_dump($tab);
                          $questions[$po]=$_POST;
                          $contenu=json_encode(array_values($questions));
                          file_put_contents('./json/questions.json',$contenu);
                        }
                          # code...
                        }
                    ?>