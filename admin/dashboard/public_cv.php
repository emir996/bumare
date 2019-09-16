<?php 

	require_once '../../config/config.php';
	include '../inc/header.php';
	include '../inc/nav.php';

?>

	<div class="tab-pane">
		
		<div class="container container1">
		  <div class="row">
		    <div class="col-md-12 col-xs-12">
		    	<div class="job-header">

                    <div class="cv-header-1">
						<h3 class="jobs-heading">Create Public Profile</h3>
                    </div>
					
					<div class="cv-header-2">
						<input type="button" id="add_profile" class="btn btn-success" value="Create Profile"/>
                    </div><br>
					
					
			    </div>
			    <div class="job-body text-center">
			
			    	<ul class="list-group">
			    		<!-- Data loaded here -->
			    	</ul>

			    </div>
		    </div>
		  </div>
		</div>

    </div>
    
    <div id="profileModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <form method="POST" id="profileForm" enctype="multipart/form-data">
            <div class="modal-header">
               <h4 class="modal-title">Create Profile</h4>
            </div>

            <div class="modal-body">
               <div class="modal-body1">
                  <div class="form-group">
                    <label>Enter Name: </label>
                    <input type="text" name="p_name" id="p_name" class="form-control" required/>
                  </div>

                  <div class="form-group">
                    <label>Enter E-mail: </label>
                    <input type="email" name="p_email" id="p_email" class="form-control" required/>
                  </div>

                  <div class="form-group">
                    <label>Enter Description: </label>
                    <textarea style="min-height:200px;" type="text" name="p_description" id="p_description" class="form-control" required></textarea>
                  </div>
                  
                  <div id="custom-inputs" class="form-group">
                      <label>Job Skills:</label><br>
                      <input type="text" id="p_profession" name="p_profession" placeholder="Enter profession" style="width: 48%;"/>
                    
                      <input type="text" id="p_interest" name="p_interest" placeholder="Enter interest" style="width: 48%;" />
                  </div>

                  <div class="form-group">
                    <label>Enter CV: </label><br>
                    <span id="name_file"></span>
                    <input type="file" name="p_file" id="p_file"/>
                  </div>

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="p_checkbox" id="p_checkbox" />
                    <label class="custom-control-label" for="p_checkbox">Set Public</label>
                  </div>

                    <input type="hidden" name="p_id" id="p_id" value="0"/>
               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" id="close_modal" data-dismiss="modal">Close</button>
               <input type="submit" id="profileBtn" value="Create" class="btn btn-success">
            </div>
        </form>
         </div>
      </div>
</div>

    <?php include '../inc/modals.php'; ?>
<script>
    $(document).ready(function(){

        $("#profileForm").on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: '../ajaxcall/ajax.php',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response){
                    alert(response);
                    $("#profileModal").modal('hide');
                    window.location.reload();
                }
            });
        });

        $(document).on('click','button[data-role=update]', function(){

            var p_id = $(this).data('id');
            var p_name = $('#'+p_id).find('span[data-target=pName]').text();
            var p_email = $('#'+p_id).find('span[data-target=pEmail]').text();
            var p_profession = $('#'+p_id).find('span[data-target=pProfession]').text();
            var p_interest = $('#'+p_id).find('span[data-target=pInterest]').text();
            var p_file = $('#'+p_id).find('span[data-target=pFile]').text();
            var p_description = $('#'+p_id).find('p[data-target=pDescription]').text();

            $("#p_name").val(p_name);
            $("#p_email").val(p_email);
            $("#p_profession").val(p_profession);
            $("#p_interest").val(p_interest);
            $("#name_file").text(p_file);
            $("#name_file").css('display', '');
            $("#p_file").text(p_file);
            $("#p_description").val(p_description);
            $("#p_id").val(p_id);

            $(".custom-checkbox").css('display', 'none');
            $("#p_file").removeAttr('required');
            $(".modal-title").text('Update Profile');
            $("#profileBtn").attr('value', "Update");
            $("#profileModal").modal('show');
   
        });

        $("#profileModal").on('hidden.bs.modal', function(){
            
            $("#p_id").val(null);
            $("#p_name").val('');
            $("#p_email").val('');
            $("#p_profession").val('');
            $("#p_interest").val('');
            $("#p_file").val('');
            $("#p_description").val('');

            $("#profileBtn").attr('value', "Create");
            $(".custom-checkbox").css('display', '');
            $("#name_file").css('display', 'none');

        });

        getProfileData();  

    });

        /*function editProfile(){

            var p_id = $("#p_id").val();
            var p_name = $("#p_name").val();
            var p_email = $("#p_email").val();
            var p_profession = $("#p_profession").val();
            var p_interest = $("#p_interest").val();
            var p_file = $("#p_file").text();
            var p_description = $("#p_description").val();

            $.ajax({
                url: "../ajaxcall/ajax.php",
                method: "POST",
                data: {
                    p_id: p_id,
                    p_name: p_name,
                    p_email: p_email,
                    p_file: p_file,
                    p_profession: p_profession,
                    p_interest: p_interest,
                    p_description: p_description 
                },
                success: function(response){
                    alert(response);
                    //window.location.reload();
                }
            });
        }*/

    

    function getProfileData(){
        $.ajax({
            url: '../ajaxcall/fetch.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key:'getProfileData'
            }, success: function(response){
                if(response != "reached_max"){
                    $(".list-group").append(response);
                }
            }
        });
    }
</script>