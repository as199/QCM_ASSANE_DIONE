
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
     <script type="text/javascript" src="./js/fonction.js" ></script>
   
    <title>Document</title>
    <style >
      #containerform{
        margin-left: auto;
        margin-right: auto;
        width: 60%;
       height: 590px;
        background-image: url(./img/icones/img-bg.jpg);
        background-repeat: no-repeat;


      }
      .div1{
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        height: 70px;
        background-color: rgb(5, 36, 38);
      }
      #icone{
        width: 10%;
        float: left;
        height: 70px;
        /*background-color: violet;*/
        background-image: url(./img/icones/image.jpeg);
        background-size: 100% auto;
        background-position: absolute;
      }
      #cadre2{
        width: 90%;
        height: 60px;
        float: right;
        background-color: yellow;
      }
      .formcompteuser{
        background-color: rgb(82, 86, 89);
       

      }
      .div2{
        margin-left: auto;
        margin-right: auto;
        width: 80%;
       
      }
      .div2a{
       width: 100%;
        height: 500px;
        margin-top: 5px;
         border-radius: 7px;
      }
      .div2b{
        width: 60%;
        height: 475px;
        background-color: white;
        float: left;
      }
      .div2c{
        width: 40%;
         height: 475px;
        background-color: white;
        float: right;
      }
      .div2b1{
        width: 100%;
        height: 50px;
      }
      .div2b2{
        width: 100%;
        height: 1px;
        border:1px solid rgb(228, 228, 228);
      }
      .prdiv2b3{
        margin-left: 20px;
    /* margin-right: auto; */
    height: 25px;
     width: 85%;
    border: 1px solid #0273dd;
    border: 1px solid rgba(0,0,0,0.4);
    background-color: rgb(247, 247, 247);
    border-radius: 8px;
      }
     
      .validercoldiv2b3{
        background-color: rgb(80, 191, 208);
        margin-left: 92px;
         height: 30px;
        width: 40%;
        border-radius: 5px;
        color: aliceblue;
        font-weight: 800;
      }
      #moncerclediv2c1{
      /*background: #bfd70e;*/
      border-radius: 50%;
      width: 180px;
      height: 180px;
      /* border: 2px solid rgb(80, 191, 208); */
      margin-left: 40px;
      margin-top: 40px; 
    }
    .btn6cadre2c{
   font-weight: bold;
    font-size: 30px;
    height: 70px;
    width: 50%;
    margin-left: 25%;
    color: white;
    margin-top: 10px;
}
#cadre2compteuser{
  padding-top: 10px;
}
.labeldiv2b1a{
    margin-left: 20px;
    font-size: 18px;
    font-weight: bolder;
    padding-top: 3px;
    font-family: sans-serif;
}
.labeldiv2b1b{
    margin-left: 20px;
    font-size: 13px;
    padding-top: 3px;
    font-family: sans-serif;
}
#preview img{
     border-radius: 50%;
      width: 180px;
      height: 180px;

   }
    </style>
</head>
<body >
  <form class="formcompteuser" method="post" action="" enctype="multipart/form-data" id="form">
    <div  id="containerform">
      <div class="div1">
          <div  id="icone">
            
          </div>
          <div id="cadre2compteuser">

                 <h2 class="btn6cadre2c" for="">
                    Le plaisir de jouer
                </h2>
          </div>
    </div>
    <div class="div2">
        <div class="div2a"><!-- contient les deux parties  -->
          
         <div class="div2b"><!-- contient la partie de gauche -->
              <div class="div2b1"><!-- debut div2b1 -->
                  <label class="labeldiv2b1a">S'INSCRIRE</label><br>
                  <label class="labeldiv2b1b">Pour tester votre niveau de culture générale</label>
              </div><!-- fin div2b1 -->
              <div class="div2b2"><!-- debut div2b2 -->
                
              </div><!-- fin div2b2 -->
              <div class="div2b3"><!-- debut div2b3 -->
                  <div class="coldiv2b3">
                    <label>Prenom</label><br/>
                    <input class="prdiv2b3" type="text" error="error1" value="<?php if(!empty($_POST['prenom'])){echo $_POST['prenom'];}?>" name="prenom" placeholder="Votre prenom " pattern="[A-Za-z]+" >
                    <div style="color: red;height: 10px;" id="error1"></div>
                  </div>
                  <div class="coldiv2b3">
                    <label>Nom</label><br/>
                    <input class="prdiv2b3" type="text" error="error2" value="<?php if(!empty($_POST['nom'])){echo $_POST['nom'];}?>" name="nom" placeholder="Votre nom " pattern="[A-Za-z]+" >
                    <div style="color: red;height: 10px;" id="error2"></div>
                  </div>
                  <div class="coldiv2b3">
                    <label>Login</label><br/>
                    <input class="prdiv2b3" type="text" error="error3" value="<?php if(!empty($_POST['login'])){echo $_POST['login'];}?>" name="login" placeholder="Votre login " >
                    <div style="color: red;height: 12px;" id="error3"></div>
                  </div>
                  <div class="coldiv2b3">
                    <label>Password</label><br/>
                    <input class="prdiv2b3" type="Password" error="error4" name="password" placeholder="Votre Password " >
                  </div>
                  <div class="coldiv2b3">
                    <div style="color: red;height: 10px;" id="error4"><label><?php if(!empty($errog1)){echo $errog1;}   ?></label></div>
                    <label>Confirmation Password</label><br/>
                    <input class="prdiv2b3" type="Password" error="error5" name="cpassword" placeholder="Votre Password " >
                    <div style="color: red;height: 10px;" id="error5"><label><?php if(!empty($errog)){echo $errog;}?></label></div>
                  </div>
                  <div class="coldiv2b3">
                    <label>email</label><br/>
                    <input class="prdiv2b3" type="email" error="error7" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>" name="email" placeholder="Votre email " >
                    <div style="color: red;height: 12px;" id="error7"></div>
                  </div>
                  <div class="coldiv2b3">
                       <label>avatar</label><input type="file"  onchange="handleFiles(files)" id="upload"  name="file" style="float: right;">
                       
                  </div>
                  <br/>
                  <div class="coldiv2b3">
                      <input class="validercoldiv2b3"  type="submit" name="validerr" value="Créer compte" >

                  </div>
              </div><!-- fin div2b3 -->
              
         </div><!-- fin  partie de gauche -->
            <div class="div2c"><!-- contient la partie de droite -->
                <div class="div2c1">
                   <div id="moncerclediv2c1"><span id="preview"></span></div>
                </div>
            </div><!-- fin  partie de droite -->
        </div><!-- fin  des deux parties  -->
    </div>
    <div class="div3"></div>
    </div>
    
  </form>

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
function deconnexion(){
	unset($_SESSION['user']) ;
	unset($_SESSION['status']) ;
  session_destroy();
  header("location:../index.php");
}
       
    </script>
    <?php 
    
           include("../src/fonction.php"); 
             if(!empty($_POST)){
              
                  /***************************************************/
                  $t='';
                   $message = array();
                  $nom=$_POST['nom'];
                  $prenom=$_POST['prenom'];
                  $login=$_POST['login'];
                  $password=$_POST['password'];
                  $cpassword=$_POST['cpassword'];
                   $email=$_POST['email'];
                  $type='joueur';
                  $errorg1='';
                  $data=file_get_contents("./json/base.json");
                  $data=json_decode($data,true);
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
                          $message['email']=$email;
                         $message['photo']=$photo;
                          $message['type']=$type;
                         $message['id']= date("dmYHis");
                         $_SESSION['prenom']=$prenom;
                         $_SESSION['nom']=$nom;
                         $_SESSION['photo']=$photo;
                        $js = file_get_contents('json/base.json');
                         $js =json_decode($js,true);
                         $js[]=$message;
                         $js= json_encode($js);
                         file_put_contents('json/base.json', $js);
                          if(empty($_SESSION['Admin'])){ //vérifie si y a quelqu'un qui c'est connecter
                          echo "<script type='text/javascript'>document.location.replace('../index.php');</script>";
                            exit();	
                        }
                         
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
</body>
</html>
 