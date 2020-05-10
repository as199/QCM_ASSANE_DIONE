<?php
session_start();

    function aleatoire(){
        $characts = 'abcdefghijklmnopqrstuvwxyz';
        $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts .= '1234567890';
        $code_aleatoire = '';
            for($i=0;$i < 10;$i++) //10 est le nombre de caractères 
            {
            $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1);
                } 
                return $code_aleatoire; 
    }
    $data=file_get_contents("./json/base.json");
    $data=json_decode($data,true);
    if(!empty($_POST['recuperer'])){
        $sms='';
         $motdepasse='';
        $mail=$_POST['email'];
        $login=$_POST['login'];
        $generer=$_POST['genercode'];
        $code=$_POST['code'];
        
        if($code==$generer){
            for ($i=0; $i <count($data) ; $i++) { 
                if($login==$data[$i]['login'] && $mail==$data[$i]['email']){
                    $motdepasse=$data[$i]['password'];
                     $sms='';
                }
               
            }
            if(!empty( $motdepasse)){
                $pass= $motdepasse;      

            } else{
                    $sms="l'adresse Email ou le login n'existe pas!";
                }
    }
    else{
        $sms="le code est erroné réessayer!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Terminer</title>
    <style>
    *{
        padding:0px;
        margin:0px;
    }
    #body1{
        background-color: rgb(82, 86, 89);
    }
    #container2{
       background-image: url(./img/icones/img-bg.jpg);
        height: 550px;
        width: 80%;
        background-size: cover;
        margin-left: 10%;
        margin-right: 10%;
        padding-top: 39px;
        background-repeat: no-repeat;
    }
    .container1{
        background-color: honeydew;
        height: 500px;
        width: 80%;
        margin-left: 10%;
        margin-right: 10%;
    }
    .container3{
        
        height: 90px;
        width: 100%;
    }
    .container4{
         
        height: 340px;
        width: 80%;
        margin-left: 10%;
        margin-right: 10%;
    }
    .container5{
         
        height: 70px;
     }
     .contenu{
        padding: 26px
     }
     #label1{
         font-size:25px;
     }
     .contenubas{
            height: 84px;
            padding-top: 15px;
     }
     #recuperer{
        height: 70px;
        width: 20%;
        margin-left: 40%;
     }
     .contenumilieu{
         height:300px;
         width:80%;
         padding-bottom: 9px;
         margin-left: 10%;
        margin-right: 10%;
     }
     .colad{
        height: 55px;
    /* margin-top: 15px; */
         padding: 15px;
     }
     #label2{
         font-size: larger;
        font-family: sans-serif;
        margin-left: 10%;
     }
     #label3{
         font-size: larger;
        font-family: sans-serif;
        margin-left: 30%;
        background-color: bisque;
     }
     .prinput{
       width: 45%;
        height: 30px;
        margin-left: 20%;
        border-radius: 5px;
     }
     #recuperer{
       height: 50px;
    width: 20%;
    margin-left: 34%;
    background-color: cadetblue;
    color: white;
    font-size: x-large;
     }
     #mdp{
        font-size: larger;
         margin-left: 150px;
     }
     span{
        font-weight: 600;
     }
    </style>
</head>
<body id="body1">
    <div id="container2">
        <div class="container1">
            <div class="container3">
                <div class="contenu">
                    <a href="deconnecter.php"><button type="submit" class="retour">retour</button></a> 
                    <marquee behavior="" direction="">
                    
                        <label id="label1" for="">Pour recuperer votre mot de passe veuillez remplir le formulaire suivant</label>
                    </marquee> 
                     <label for="" style="color:red;font-size:15px;"><?php if(isset($sms)){echo $sms;}  ?></label>
                    
                </div>
            </div>
            <form method="post" action="" id="form">
            <?php $t=aleatoire();?>
            <div class="container4">
                <div class="contenumilieu" >
                        <div class="colad">
                            <label for="" id="label2">Entrer votre login</label><br><br>
                          <input class="prinput" type="text" error="error2" value="<?php if(!empty($_POST['login'])){echo $_POST['login']; } ?>" name="login" placeholder="Votre login " >
                          <div style="color: red;height: 10px;" id="error2"></div>
                        </div>
                        <div class="colad">
                            <label for="" id="label2">Entrer votre adresse Email</label><br><br>
                          <input class="prinput" type="email" error="error3" value="<?php if(!empty($_POST['email'])){echo $_POST['email']; } ?>" name="email" placeholder="Votre Email " >
                          <div style="color: red;height: 10px;" id="error3"></div>
                        </div>
                        <div class="colad" >
                            <label for="" id="label2">Entrer ce code de verification ci-dessous</label><br><br>
                            <label for="" id="label3"><?php echo $t;?></label> <input type="hidden" name="genercode" value="<?php echo $t;?>"> <br><br>
                          <input class="prinput" type="text" error="error4" name="code" placeholder="Votre Code " >
                          <div style="color: red;height: 10px;" id="error4"></div>
                        </div>
                        
                </div>
                <label for="" id="mdp"><?php if (!empty($pass)) {
                        echo "votre mot de passe est:<span> ".$pass."</span>"; 
                    } ?></label>
            </div>
            <div class="container5">
                <div class="contenubas">
                <input type="submit" value="Récuperer" id="recuperer" name="recuperer">
                </div>
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

       
    </script>
        </div>
        
        
    </div>

    
</body>
</html>