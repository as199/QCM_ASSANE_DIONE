
               select=document.getElementById("typ");
               select.addEventListener("change",function(e){
                document.getElementById ("row").style.display="block";
                 console.log(e);
               var choix=document.getElementById ("choix");
               choix.innerHtml="";
               if(e.target.options.selectedIndex==2)
              { var newInput= document.createElement("input");
               newInput.setAttribute('type','text');
               newInput.setAttribute('placeholder', 'REPONSE');
               newInput.setAttribute('name','rep');
               choix.appendChild(newInput);
               
                 document.getElementById ("row").style.display="none";
                }
               });
               function genere(){
                 
               var choix=document.getElementById ("choix");
               choix.innerHtml="";
              var reponse =document.getElementById ("reponse").value;
               var typ =document.getElementById ("typ").value;
               //choixmultiple
                if(typ=="choixmultiple"){
              for (let index = 0; index <parseInt(reponse); index++) {
               var newInput= document.createElement("input");
               var newInput2= document.createElement("input");
               var newInput3= document.createElement("input");
               newInput.setAttribute('type','text');
               newInput2.setAttribute('type','checkbox');
               newInput3.setAttribute('type','hidden');
               newInput.setAttribute('name','rep['+index+']');
               newInput2.setAttribute('name','vrais['+index+']');
               newInput3.setAttribute('name','vrais['+index+']');
               newInput3.setAttribute('value','off');
               newInput.setAttribute('placeholder', 'REPONSE'+ index+1);
               newInput.style.width="60%";
               newInput2.style.width="20%";
               choix.appendChild(newInput);
               choix.appendChild(newInput3);
               choix.appendChild(newInput2);
              }
              }
           if(typ=="choixsimple"){
                //choixsimple
                for (let index = 0; index <=parseInt(reponse)-1; index++) {
               var newInput= document.createElement("input");
               var newInput2= document.createElement("input");
               newInput.setAttribute('type','text');
               newInput2.setAttribute('type','radio');
               newInput.setAttribute('name','rep['+index+']');
               newInput2.setAttribute('name','vrais['+index+']');
               newInput2.setAttribute('value','off');
               newInput.setAttribute('placeholder', 'REPONSE'+ index);
               newInput.style.width="70%";
               newInput2.style.width="10%";
               newInput.addEventListener('change',function(e){
                 newInput2.value=e.target.value;
               })
               choix.appendChild(newInput);
               choix.appendChild(newInput2);          
              }
              }
              if(typ=="choixtext"){
               alert(typ=="choixtext");
                        
              }
            }
               

 function handleFiles(files){
   var imageType = /^image\//;
   for (var i = 0; i < files.length; i++) {
   var file = files[i];
   if (!imageType.test(file.type)) {
     alert("veuillez sélectionner une image");
   }else{
     if(i == 0){
       preview.innerHTML = '';
     }
     var img = document.createElement("img");
     img.classList.add("obj");
     img.file = file;
     preview.appendChild(img); 
     var reader = new FileReader();
     reader.onload = ( function(aImg){ 
     return function(e) { 
     aImg.src = e.target.result; 
   }; 
  })(img);

 reader.readAsDataURL(file);
 }
 
 }
}
 