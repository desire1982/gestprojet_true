

     <!--FENETRE MODALE DE NATURE -->





     <div class="modal fade" id="ajoutNAT_M" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                     <h4 class="modal-title" id="myModalLabel"> <b> FICHE DES NATURES </b> </h4>
                 </div>
                 
                 <div class="modal-body" id="ajoutNature_body">

                           <!-- Nav tabs -->
                           
                     <ul class="nav nav-tabs">
                         <li role="presentation" class="active"><a data-toggle="tab" href="#Nature">Nature</a>
</li>
                         <li role="presentation"><a data-toggle="tab" href="#Recherche">Recherche</a></li>
                         <li role="presentation"><a data-toggle="tab" href="#Message">Messages</a></li>
                     </ul>

                        <!-- Tab panes -->
                     <div class="tab-content">

                     <!-- Tab panes Nature -->  
                         <div id="Nature" class="tab-pane fade in active">
                             <div class="row">
                                 <div class="col-md-4">
                     <div class="form-group">
                         <label for="nature"><span class="glyphicon glyphicon-user"></span> Nature</label>
                         <input type="text" class="form-control" id="id_nature" onkeyup="verifnature();" name="id_nature" placeholder="Enter la nature">
                         <span id="name_status"></span>
                         
                     </div>
                                 </div>
                                 <div class="col-md-4">
                     <div class="form-group">
                         <label for="Lib_nature"><span class="glyphicon glyphicon-eye-open"></span> Libelle</label>
                         <input type="text" class="form-control" id="lib_nature" name="lib_nature" placeholder="entrer le libelle">
                     </div>
                                 </div>
                        <!-- Affichage du message d'erreur-->         
                         <div class="col-md-12" id="message_nature"></div>        
                        <!-- FIN Affichage du message d'erreur-->
                                 </div>
                                     <div class="row">
                                         <div class="col-md-8 col-md-offset-4">
                     <input type="submit" value="enregistrer" class="btn btn-success" id="enr_nature"/>
                                         </div>
                                      </div>


                         </div>

                          <!-- Tab panes Recherche -->  


                         <div id="Recherche" class="tab-pane fade">
                             <div class="form-group">
                                 <label for="nature"><span class="glyphicon glyphicon-user"></span> Nature</label>
                                 <input type="text" class="form-control" id="id_nature" name="id_nature" placeholder="Enter la nature">
                             </div>
                             <div class="form-group">
                                 <label for="Lib_nature"><span class="glyphicon glyphicon-eye-open"></span> Libelle</label>
                                 <input type="text" class="form-control" id="lib_nature" name="lib_nature" placeholder="entrer le libelle">
                             </div>
                             <input type="submit" value="rechercher" class="btn btn-success" id="enr_nature"/>


                         </div>
                         
                         
                      <!-- Tab panes Message -->    
                         <div id="Message" class="tab-pane fade">
                             <div class="form-group">
                                 <label for="nature"><span class="glyphicon glyphicon-user"></span>Message</label>
                                 <input type="text" class="form-control" id="id_nature" name="id_nature" placeholder="Enter la nature">
                             </div>
                             <div class="form-group">
                                 <label for="Lib_nature"><span class="glyphicon glyphicon-eye-open"></span> Libelle du message</label>
                                 <input type="text" class="form-control" id="lib_nature" name="lib_nature" placeholder="entrer le libelle">
                             </div>
                             <input type="submit" value="rechercher" class="btn btn-success" id="enr_nature"/>


                         </div>
                         
                     </div>

