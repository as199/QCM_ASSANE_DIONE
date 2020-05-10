<?php 



 if (!empty($_POST)) {
  
   unset($_POST['submit']);
   $question = $_POST;
 include'../src/fonction.php';
  encoder("questions",$question);
//  echo "<br>";
//   echo "*************************************************************************************";
//var_dump($question);
}
unset($_SESSION);
?>


    <style >
    input[type=text], select, textarea {
    width: 60%;
   
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    
  }
  .nbrep{
    width: 7%;
    height: 30px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  #reponse{
    width: 7%;
    height: 30px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  #score{
    width: 7%;
    height: 30px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  .imagess{
        float: right;
}
#lab{
  width: 5%;
}
#valid{
  margin-left: 60%;
    height: 35px;
    width: 20%;
    background-color: aqua;
    font-size: 25px;
}
.gener {
    width: 25px;
    height: 25px;
    background-image: url(./img/icones/ic-ajout-réponse.png);
    background-size: cover;
}
#inpgener {
    width: 45%;
    height: 20px;
    margin-left: 52px;
}
#checkgener {
    width: 20px;
    height: 20px;
}
.deletgener {
    width: 22px;
    height: 25px;
    background-image: url(./img/icones/ic-supprimer.png);
    background-size: cover;
}


    </style>
<div class="haute">
                      <div class="droite">
                        <label class="droites1">PARAMETRER VOTRE QUESTION</label>
                      </div>
                      
                    </div>
                    <div class="milieu" style="overflow: scroll;height: 330px;">
                      <div class="questions">
                        
                          <!-- /*****************************/ -->
                            <div class="row">
                              <div class="col-25">
                                <label for="quetion">Quetions</label>
                              <!-- </div>
                              <div class="col-75"> -->
                                <input type="textarea" name="question" id="question"  error="error1" style="height: 60px;border-radius: 8px;width: 70%;" ></input>
                                <div style="color: red;height: 18px;" id="error1" ></div>
                              </div>

                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="score">Score</label>
                              <!-- </div>
                              <div class="col-75"> --> 
                                <input type="text" id="score" error="error2" name="score" pattern="^(1|2|3|4|5|6|7|8|9)[0-9]*$" >
                                <div style="color: red;height: 18px;" id="error2"></div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="type">Type</label>
                              <!-- </div>
                              <div class="col-75" id="ty"> -->
                                <select id="typ" name="type">
                                  <option value="choixmultiple">choix multiple </option>
                                  <option value="choixsimple">choix simple </option>
                                  <option value="choixtext">choix text</option>
                                </select>
                                <input type="hidden" name="id" value="<?php echo  date("dmYHis");?>">
                                  <button type="button" id="generer" class="gener" onclick="genere()"  ></button>
                              </div>
                            </div>
                           <div class="active">
                                <div class="hautgener" id="hautgener">
                                  <div class="divgener" id="row_0">
                                   
                                  </div>
                                
                              </div>
                              
                           </div>
                        
                       
                 
                   <script type="text/javascript">
                        var nbrow = 0;
                        var i=0;
                       function genere() {
                         nbrow++;
                         i++;
                         var choise=document.getElementById('select');
                         var divInputs =document.getElementById('hautgener');
                         var newInput= document.createElement('div');
                         newInput.setAttribute('class','divgener');
                         newInput.setAttribute('id','row_'+nbrow);
                         if(typ.value=="choixmultiple"){
                         newInput.innerHTML ='<input class="inpgener" type="text" name="rep['+i+']" id="inpgener" placeholder="reponse'+i+'"><input class="checkgener" type="checkbox" name="vrais[]" value="'+i+'" id="checkgener"><button type="button" class="deletgener" onclick="ondelete('+nbrow+')"></button>'
                                  ;
                          divInputs.appendChild(newInput);
                        }
                        if(typ.value=="choixsimple"){
                         newInput.innerHTML ='<input class="inpgener" type="text" name="rep['+i+']" id="inpgener" placeholder="reponse'+i+'"><input class="checkgener" type="radio" name="vrais" value="'+i+'" id="checkgener"><button type="button" class="deletgener" onclick="ondelete('+nbrow+')"></button>'
                                  ;
                          divInputs.appendChild(newInput);
                        }
                        if(typ.value=="choixtext"){
                         newInput.innerHTML ='<input class="inpgener" type="text" name="rep" id="inpgener" placeholder="reponse'+i+'">'
                                  ;
                          divInputs.appendChild(newInput);
                          if (i>0) {
                            generer.setAttribute('disabled','disabled');
                          }
                         // generer.setAttribute('type','hidden');
                        }
                       }
                       function ondelete(n) {
                         var target = document.getElementById('row_'+n);
                         target.remove();
                         
                       }
                    
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
                    </div>
                          <div class="bas">
                                <input type="submit" value="valider" id="valid">
                          </div>