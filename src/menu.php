<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
     .imagess{
        float: right;
}
  </style>
</head>
<body>
	
	  <div class="cadre8">
          <div class="cadre8a">
            <div id="moncercle1"><img id="preview1" src="img/<?php echo $photo;?>"> </span></div>
          </div>
          <div class="cadre8b">
            <br/>
            <div class="cadre8a1" >
              <label class="label12"><?php echo $prenom;?></label><br/><br/>
              <label class="label13"><?php echo $nom;?></label>
            </div>
            
          </div>
        </div>
         <ul>
            <li class="icones"><a  href="./listequestion.php">Liste Questions<img class="imagess" src="../asset/img/icones/ic-liste.png"></img></a></li>
            <li><a href="./creeradmin.php?lien=creeradmin">Créer Admin<img class="imagess" src="../asset/img/icones/ic-ajout.png"></img></a></li>
            <li><a href="./listejoueurs.php">Liste Joueurs<img class="imagess" src="../asset/img/icones/ic-liste.png"></img></a></li>
            <li><a href="./questions.php">Créer Questions<img class="imagess" src="../asset/img/icones/ic-ajout.png"></img></a></li>
          </ul>
</body>
</html>