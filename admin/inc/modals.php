
<!--EDIT Central Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">


<!-- Change class .modal to change the size of the modal -->
<div class="modal-dialog">

<form action="../crud/update.php" method="POST" name="modal_v_form">

    <div class="modal-content" role="document">
      <div class="modal-header">
        <h4 class="modal-title w-100 text-center" id="myModalLabel">Edit</h4>
        
      </div>
      
	    <div class="modal-body">
	      	<input type="hidden" name="txt_id" id="txt_id"/>
	      	
		        <div class="form-group shadow-textarea">
		  			   <label for="text">Text</label>
		  			   <textarea class="form-control z-depth-1" id="tb_value" name="tb_value" rows="3" required></textarea>
				    </div>
			
	    </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" name="btn_update" class="btn btn-primary btn-sm">Save changes</button>

      </div>

    </div>
  </form>
</div>
</div>
<!-- End of Modal -->

<!-- INSERT CENTRAL MODAL -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="../crud/create.php" method="POST">

        <div class="modal-header">
          <h4 class="modal-title text-center">Insert New</h4>
        </div>
       

        <div class="modal-body text-center modal_body">

          <div class="form-group">
            <label for="txt_key">Field for key text:</label>
            <input type="text" class="form-control" id="txt_key" name="txt_key" placeholder="" required/>
          </div>

          <div class="form-group">
            <label for="txt_value">Field for text:</label>
            <textarea type="text" class="form-control" id="txt_value" name="txt_value" placeholder="Type Your Text Here..." required></textarea>
          </div>

          <div class="form-group">

            <select id="sel_lang" name="sel_lang" class="form-control" required>
              <option value="">Choose your language</option>
          <?php 
          	$getLang = $text->getAllCatLang();
            if($getLang){
              while($rw=$getLang->fetch_object()){
                echo "<option value='{$rw->id}'>$rw->language</option>";
              }
            }
          ?>

            </select>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btn_insert" name="btn_insert">Insert</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

        </form>

      </div>
    </div>
  </div>


<!-- Job MODAL -->

<div id="jobManager" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Add Job</h4>
            </div>

            <div class="modal-body">
               <div class="modal-body1">
                  <div class="form-group">
                    <label>Enter Profession: </label>
                    <input type="text" name="profession" id="job_profession" class="form-control" required/>
                  </div>

                  <div class="form-group">
                    <label>Enter Interest: </label>
                    <input type="text" name="interest" id="job_interest" class="form-control" required/>
                  </div>

                  <div class="form-group">
                    <label>Enter Description: </label>
                    <textarea style="height:200px;" type="text" name="description" id="job_description" class="form-control" required></textarea>
                  </div>

                    <input type="hidden" id="editRowId" value="0"/>
               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" id="close_modal" data-dismiss="modal">Close</button>
               <input type="button" id="manageBtn" onclick="manageData('add_new')" value="Insert" class="btn btn-success">
            </div>
         </div>
      </div>
</div>

  <!-- end of modal -->

