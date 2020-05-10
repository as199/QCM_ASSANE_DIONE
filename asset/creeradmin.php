 <div class="haute">
<div class="partie1">
                        <div class="col1">
                          <label class="titre3">S'INSCRIRE</label><br/>
                          <label>Pour proposer des quizz</label>
                        </div>
                       <div class="trait"></div>
                       <div class="colad">
                         
                          <input class="prinput" type="text" error="error1" name="prenom" placeholder="Votre prenom " pattern="[A-Za-z]+" >
                          <div style="color: red;height: 10px;" id="error1"></div>
                        </div>
                        <div class="colad">
                          
                          <input class="prinput" type="text" error="error2" name="nom" placeholder="Votre nom " pattern="[A-Za-z]+" >
                          <div style="color: red;height: 10px;" id="error2"></div>
                        </div>
                        <div class="colad">
                          <input class="prinput" type="text" error="error3" name="login" placeholder="Votre login " >
                          <div style="color: red;height: 10px;" id="error3"></div>
                        </div>
                        <div class="colad">
                          <input class="prinput" type="Password" error="error4" name="password" placeholder="Votre Password " >
                          <div style="color: red;height: 10px;" id="error4"></div>
                        </div>
                        <div class="colad">
                          <input class="prinput" type="Password" error="error5" name="cpassword" placeholder="Votre Password " >
                          <div style="color: red;height: 10px;" id="error5"></div>
                        </div>
                        <div class="colad">
                          <input class="prinput" type="email" error="error6" name="email" placeholder="Votre email " >
                          <div style="color: red;height: 10px;" id="error6"></div>
                        </div>
                        <div class="colad">
                             <label>avatar</label><input type="file" onchange="handleFiles(files)" id="upload"  name="file" style="float: right;" >
                        </div>
                        <br/>
                        
                        </div>
                       <div class="partie2">
                       <div id="moncercle"><span id="preview"></div>
                      <div class="bbas" style="clear:both;margin-top: 200px;margin-left: 45%;">
                       <div class="col">
                            <input class="validerrs"  type="submit" name="validerr" value="Créer compte" style=" height: 35px; background-color: aqua;font-size: large;" >
                        </div>
                      </div>
                       </div>
                  </div>
</div>
<script>
   const inputs=document.getElementsByTagName("input");
     for(input of inputs){
       input.addEventListener("keyup",function(e){
        if(e.target.hasAttribute("error")){
           var idDivError=e.target.getAttribute("error");
             document.getElementById(idDivError).innerText=""
        }

       })
     }
   document.getElementById("form").addEventListener("submit",function(e){
    const inputs=document.getElementsByTagName("input");
    var error=false;
    for(input of inputs){
      if(input.hasAttribute("error") ){
        var idDivError=input.getAttribute("error");
              if(!input.value){
                document.getElementById(idDivError).innerText="champs obligatoire"
                 error=true;
                }
       
      }

    }
    if(error){
      e.preventDefault();
      return false;
    }
          
        })

       
    </script>
<?php 
             if(!empty($_POST)){
                  /***************************************************/
                $message = array();
                  $nom=$_POST['nom'];
                  $prenom=$_POST['prenom'];
                  $login=$_POST['login'];
                  $password=$_POST['password'];
                  $cpassword=$_POST['cpassword'];
                  $email=$_POST['email'];
                  $type='administrateur';
                  $errorg1='';
                  $data=file_get_contents("./json/base.json");
                  $data=json_decode($data,true);
                  $t=0;
                  for($i=0;$i<count($data);$i++){
                    if($data[$i]['login']==$login){
                      $t=1;
                    }
                  }
                   if($t!=1){
                   if($password==$cpassword){
                     if(strlen($password)>=8){
                      $target_dir = "img/";
                  $target_file = $target_dir . basename($_FILES["file"]["name"]);
                  $uploadOk = 1;
                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                 
                  if(isset($_POST["submit"])) {
                      $check = getimagesize($_FILES["file"]["tmp_name"]);
                      if($check !== false) {
                          
                          $uploadOk = 1;
                      } else {
                          $msg= "le fichier n'est pas un image.";
                          echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                          $uploadOk = 0;
                      }
                  }
                 
                  
                  if ($_FILES["file"]["size"] > 500000) {
                      $msg= "Désoler votre fichiers est trop grand.";
                      echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                      $uploadOk = 0;
                  }
                  
                  if($imageFileType != "jpg" && $imageFileType != "png"  ) {
                      $msg= "Désoler seul les formats jpg et png sont autorisés";
                      echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                      $uploadOk = 0;
                  }
                  
                  if ($uploadOk == 0) {
                      $msg= "Désolé votre fichiers n'a pas été télécharger.";
                      echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                  
                  } else {
                    
                      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                          
                          $photo=basename( $_FILES["file"]["name"]);
                        
                      } else {
                          $msg="Désolé des erreurs on arreter le telechargement de votre fichier.";
                          echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                      }
                  }
                         $message['prenom']=$prenom;
                         $message['nom']=$nom;
                         $message['login']=$login;
                         $message['password']=$password;
                         $message['photo']=$photo;
                          $message['type']=$type;
                          $message['email']=$email;
                         $message['id']= date("dmYHis");
                         $_SESSION['prenom']=$prenom;
                         $_SESSION['nom']=$nom;
                         $_SESSION['photo']=$photo;
                        $js = file_get_contents('json/base.json');
                         $js =json_decode($js,true);
                         $js[]=$message;
                         $js= json_encode($js);
                         file_put_contents('json/base.json', $js);
                         
                       
                        }
                        else{
                          $msg="le mot de passe dois contenir au moins 8 caractére";
                          echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                         
                        }
                      }
                      else{
                        $msg="les deux mots de passe doivent etre identiques";
                          echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                           
                          
                        }
                      }else{
                          $msg="ce login existe déjà";
                          echo "<script language=\"javascript\">alert(\"".$msg."\");</script>\n";
                      }
                  }
           ?>