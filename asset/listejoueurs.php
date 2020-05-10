
<div class="haute">
                      <div class="droite">
                        <label class="droites1">LISTE DES JOUEUR PAR SCORE</label>
                      </div>
                      
                    </div>
                    <div class="milieu"style=" overflow: scroll;height: 330px;" >
                      <div class="questions">
                        <table  class="tableaum">
                         
                          <tr style="">
                          
                            <th style="width: 150px;font-size: large;">Nom</th>
                            <th style="width: 150px;font-size: large;">Prénom</th>
                            <th style="width: 150px;font-size: large;">Score</th>
                           
                          </tr>
                           
                            <?php 
                                $messages = file_get_contents('./json/score.json');
                                $messages = json_decode($messages, true);
                                 if(empty($messages)){
                                   $nbjoueure=0;
                                   $nbages=0;
                                 }else{
                                   $nbjoueure=count($messages);
                                 
                               
                                $nbages=((int)($nbjoueure/15));
                                //sort($messages);
                                $columns = array_column($messages, 'score');
                                array_multisort($columns, SORT_DESC, $messages);
                                //var_dump($columns);
                                }
                                $page=0;
                                if(isset($_GET['page'])){
                                    $page=(int)$_GET['page'];
                                }
                                if ($page<$nbages){
                                  $nbf=($page*15+15);
                                }else{
                                  $nbf=$nbjoueure;
                                }
                                for ($i=$page*15; $i<$nbf ; $i++) {

                            ?>
    
                          <tr style="width: 150px;height: 25px;">
                                <td style="text-align: center;font-size: large;">
                                  <?php echo $messages[$i]['nom']; ?>
                                </td>
                                <td style="text-align: center;font-size: large;">
                                  <?php echo $messages[$i]['prenom']; ?>
                                </td>
                              
                                <td style="text-align: center;font-size: large;">
                                    <?php echo $messages[$i]['score'].'pts'; ?>
                                </td>
                         </tr> 

                                <?php }
                                $page++; 
                                ?>
                          
                      </table>
                      </div>
                    </div>
                    <?php
                        //if ($page<=$nbages) {
                         ?>
                            <div class="suivant5">
                                    <div class="suivantgaughe" style="height: 30px;float: right;">
                                      <a href="./acceuil.php?lien=listejoueurs&&page=<?php if($page<$nbages){echo $page;}else{echo $nbages; }  ?>"> <button type="button" style="background-color: aqua; ">suivant</button>  </a>
                                    </div>
                                    <div class="suivantprecedent">
                                    <a href="./acceuil.php?lien=listejoueurs&&page=<?php if($_GET['page']==0){echo $_GET['page'];}else{echo $_GET['page']-1;}  ?>"> <button style="background-color: aqua; " >precedent</label> </a>
                                    </div>
                            
                            </div>

                    <?php  // }
                    ?>