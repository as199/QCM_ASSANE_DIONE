<?php 
    session_start();
    // if (empty($_SESSION['prenom'])) {
    // header('Location:index.php ');
//  if(empty($_SESSION['Admin'])){ //vérifie si y a quelqu'un qui c'est connecter
//      header('location: Login.php');
//      exit();
//   }
//     // }

include("./src/fonction.php");
// if(isset($_GET['status']) && $_GET['status']!="logout" ){
         
//           is_connecter();
         
//        }


    
    //var_dump($_POST);
    if(isset($_POST['soumettre'])){ 
     
        $login=$_POST['login'];
         $password=$_POST['password'];
         $result=connexion($login,$password);
         
         if($result=="error"){
          $tres="login ou mot passe incorrect";
         }else{
          
          if($result=="accueil"){
            $_SESSION['photo']=$_SESSION['user']['photo'];
            $_SESSION['prenom']=$_SESSION['user']['prenom'];
            $_SESSION['nom']=$_SESSION['user']['nom'];
            $_SESSION['Admin']='admin';
             header ("location:./asset/acceuil.php");
          }
          if($result=="jeux"){
             $_SESSION['Admin']='joueur';
            $_SESSION['photo']=$_SESSION['user']['photo'];
            $_SESSION['prenom']=$_SESSION['user']['prenom'];
            $_SESSION['nom']=$_SESSION['user']['nom'];
            $_SESSION['id']=$_SESSION['user']['id'];
            $_SESSION['jeu']=array();
            $_SESSION['trouver']=array();
            //array_push($_SESSION['trouver'],$_SESSION['id']);
             header ("location:./asset/joueur.php?page=0");
          }

         }
         
         }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>mini</title>
    <style type="text/css">
      .error{
        color: red;
       font-size: larger;
      }
    </style>
</head>
<body id="body1">
    <div id="container2">
        <div class="input6">
          <!-- <img src="./images/icones/icone4.jpg"> -->
        </div>
        <div class="input7">
            <div class="input8">
                <label class="btn6" for="">
                Le plaisir de jouer
            </label>
            </div>
        </div>
    </div>
     <form method="post" action="" id="form" >
   <div class="container1">
        <div class="container">
    <div class="menu1">
       <div class="input5">
           <label class="btn5" > Login Form</label><label class="error"><?php if(!empty($tres)){echo $tres;} ;?></label>
       </div>
    </div>
    <div class="menu2">
         <div class="input1">
             
          <input class="btn1" type="text" error="error1" name="login" placeholder="login" ><!-- <img src="./images/icones/ic-login.png" alt="password" >
             --><div style="color: red" id="error1"></div>
        </div>
        
        <div class="input2">
            <input class="btn2" type="password" error="error2" name="password"  placeholder="password">
            <div style="color: red" id="error2"></div>
        </div>
    </div>
    <div class="menu3">
        <div class="input3">
            <input class="btn3" type="submit" value="Connexion" name="soumettre" >
        </div>
         </form>
        <div class="input4">
           <a class="btn4" href="./asset/compteuser.php"> S'inscrire pour jouer</a>
        </div>
        <div>
         <a class="mdpo" href="./asset/recuperer.php">mot de passe oublié!</a>
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

</body>
</html>
