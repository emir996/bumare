<?php
    require 'urloperations.php';
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../../assets/css/adminstyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>

    <script>

    $(document).ready(function(){

        $("#add_job").on('click', function(){
            $("#jobManager").modal('show');
        });

        $("#jobManager").on('hidden.bs.modal', function(){
                     
            $("#editRowId").val(0);
            $("#job_profession").val('');
            $("#job_interest").val('');
            $("#job_description").val('');
            //$(".modal-title").text('Add Job');
        });

        $("#add_profile").on('click', function(){
            $("#profileModal").modal('show');
            $(".modal-title").text('Create Profile');
        });

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

        getTableData();

        getExistingData(0, 20);

        getApplicationsData();

        getProfileData();

        $('.heading-message').slideUp(1500);

    });

    function search_text(){

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search_input");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_text");
        tr = document.getElementsByTagName("tr");

        for(i = 0; i < tr.length; i++){
            td = tr[i].getElementsByTagName("td")[3];
            if(td){
                txtValue = td.textContent || td.innerText;
                if(txtValue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function changeView($this){
		var selectedText = $('option:selected', $this).text().toLowerCase();
		//var val = $($this).val();

		console.log(selectedText);
		//console.log(val);
		//console.log(txt);

		if(selectedText != 'all'){
			$('tbody tr').hide();
			$("tr[data-language="+selectedText+"]").each(function(){
				$(this).show();
			})
		} else {
			$('tbody tr').show();
		}
		
	}

    function check(){

        var question = confirm("Are you sure, you will delete this forever?");

        if(question){
            return true;
        } else {
            return false;
        }
    }

    

    function getTableData(){
        $.ajax({
            url:'../ajaxcall/fetch.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key:'getTableData'
            }, success: function (response) {
                    if(response != 'reached_max'){
                                        
                        $("tbody").append(response);
                    }  
                }
            });
        }

        function getExistingData(start, limit){
        $.ajax({
            url:'../ajaxcall/fetch.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key:'getExistingData',
                start:start,
                limit:limit
            }, success: function (response) {
                    if(response != 'reachedMax'){
                        $('#data-list').append(response);
                        start += limit;
                        getExistingData(start, limit);
                    }
                }
        });
    }

        function getApplicationsData(){
            $.ajax({
                url: '../ajaxcall/fetch.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'getApplicationsData'
                },success: function(response){
                    if(response != 'reachedMax'){
                        $('#data-list1').append(response);
                    }
                }
            });
        }

        function getProfileData(){
            $.ajax({
                url: '../ajaxcall/fetch.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key:'getProfileData'
                }, success: function(response){
                    if(response != "reached_max"){
                        $("#list-profile").append(response);
                        }
                    },
                    complete: function(){
                        var numProfile = $("#list-profile .list-info").length;
                        var limitPerPage = 2;
                        $("#list-profile .list-info:gt("+(limitPerPage - 1)+")").hide();
                        var totalPages = Math.ceil(numProfile / limitPerPage);

                        if(numProfile > limitPerPage){

                            //creating pagination list
                            //for previous
                            $(".pagination").append("<li id='previous-page' class='page-item'><a class='page-link'>Previous</a></li>");
                                // just for 1
                            $(".pagination").append("<li class='page-item current-page active'><a class='page-link' href='javascript:void(0)'>"+1+"</a></li>");
                                // for rest number 
                                for(var i = 2; i <= totalPages; i++){
                                    $(".pagination").append("<li class='page-item current-page'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>");
                                }
                                //for next button
                            $(".pagination").append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
                            // end of pagination

                            $(".pagination li.current-page").on("click", function(){

                                    if($(this).hasClass("active")){
                                        return false;
                                    } else {
                                        var currentPage = $(this).index();
                                        $(".pagination li").removeClass("active");
                                        $(this).addClass("active");
                                        $("#list-profile .list-info").hide();

                                        /*   p1    p2   p3
                                            0 1 | 2 3 | 4 
                                        */

                                        var grandTotal = limitPerPage * currentPage;

                                        for(var i = grandTotal - limitPerPage; i<grandTotal; i++){
                                            $("#list-profile .list-info:eq("+i+")").show();
                                        }
                                    }
                            });
                            $("#next-page").on('click', function(){
                                var currentPage = $(".pagination li.active").index();
                                if(currentPage === totalPages){
                                    return false;
                                } else {
                                    currentPage++;
                                    $(".pagination li").removeClass("active");
                                    $("#list-profile .list-info").hide();

                                    var grandTotal = limitPerPage * currentPage;

                                        for(var i = grandTotal - limitPerPage; i<grandTotal; i++){
                                            $("#list-profile .list-info:eq("+i+")").show();
                                        }
                                        $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass("active");
                                    }
                                });
                            $("#previous-page").on('click', function(){
                                var currentPage = $(".pagination li.active").index();
                                if(currentPage === 1){
                                    return false;
                                } else {
                                    currentPage--;
                                    $(".pagination li").removeClass("active");
                                    $("#list-profile .list-info").hide();

                                    var grandTotal = limitPerPage * currentPage;

                                        for(var i = grandTotal - limitPerPage; i<grandTotal; i++){
                                            $("#list-profile .list-info:eq("+i+")").show();
                                        }
                                        $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass("active");
                                    }
                            });
                        }
                    }
                });
            }

    function isNotEmpty(caller) {
        if(caller.val() == ''){
            caller.css('border', '1px solid red');
            return false;
        } else {
            caller.css('border', '');

            return true;
        }
    }

    function manageData(key){
         var profession = $("#job_profession");
         var interest = $("#job_interest");
         var description = $("#job_description");
         var editRowId = $('#editRowId');

         if(isNotEmpty(profession) && isNotEmpty(interest) && isNotEmpty(description)){
            $.ajax({
               url:'../ajaxcall/ajax.php',
               method: 'POST',
               dataType: 'text',
               data: {
                  key:key,
                  profession: profession.val(),
                  interest: interest.val(),
                  description: description.val(),
                  rowId: editRowId.val()
               }, success: function (response) {
                  if(response == "Job Updated Successfully"){

                    $("#profession_"+editRowId.val()).html(profession.val());
                     $("#interest_"+editRowId.val()).html(interest.val());

                     profession.val();
                     interest.val();
                     description.val();

                     $("#jobManager").modal('hide');  
                     $("#manageBtn").attr('value', 'Save').attr('onclick', "manageData('updateRow')");
                     
                  } else {
                      alert(response);
                      $("#jobManager").modal('hide');
                      window.location.reload();                      

                        }
                    }
               });
            }
        }

    function edit(rowId){
        $.ajax({
               url:'../ajaxcall/ajax.php',
               method: 'POST',
               dataType: 'json',
               data: {
                  key:'getRowData',
                  rowId: rowId
               }, success: function (response) {
                  $("#editRowId").val(rowId);
                  $("#job_profession").val(response.profession);
                  $("#job_interest").val(response.interest);
                  $("#job_description").val(response.description);
                  $("#jobManager").modal('show');
                  

                  $(".modal-title").text('Edit Job');                  
                  $("#manageBtn").attr('value', 'Save Changes').attr('onclick', "manageData('updateRow')");
               }
            });
        }


      function getValue(id){
      
        var value = $("#public_"+id).prop("checked");
        
        $.post('public_cv.php', {public:{
        id: id,
        value: value
      }}, function(data){
            
         });
   
    }

    function showText(text_id, text_value){
        $("#txt_id").val(text_id);
		$("#tb_value").val(text_value);
		$("#editModal").modal('show');
	}

    </script>

    </head>
    <body>