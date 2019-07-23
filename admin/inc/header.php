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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script>

    $(document).ready(function(){

        $("#add_new").on('click', function(){
            $("#jobManager").modal('show');
        });

        $("#jobManager").on('hidden.bs.modal', function(){
                     
            $("#editRowId").val(0);
            $("#job_profession").val('');
            $("#job_interest").val('');
            $("#job_description").val('');
            //$(".modal-title").text('Add Job');
        });

        getTableData();

        getExistingData(0, 20);

        getApplicationsData();

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
            url:'../ajaxcall/ajax.php',
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

       

    

    function isNotEmpty(caller) {
        if(caller.val() == ''){
            caller.css('border', '1px solid red');
            return false;
        } else {
            caller.css('border', '');

            return true;
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
                  if(response != "Job Updated Successfully"){
                     alert(response);
                     $("#jobManager").modal('hide');
                     window.location.reload();
                  } else {
                     $("#profession_"+editRowId.val()).html(profession.val());
                     $("#interest_"+editRowId.val()).html(interest.val());

                     profession.val();
                     interest.val();
                     description.val();

                     $("#jobManager").modal('hide');  
                     $("#manageBtn").attr('value', 'Save').attr('onclick', "manageData('updateRow')");

                        }
                    }
               });
            }
        }

      function getValue(id){
      var value = $("#public_"+id).prop("checked");

      $.post('jobs.php', {public:{
        id: id,
        value: value
      }}, function(data){
            window.location.reload();
         });
   
    }

    function showText(text_id, text_value){
		$("#tb_value").val(text_value);
		$("#txt_id").val(text_id);
		$("#editModal").modal('show');
	}

    </script>

    </head>
    <body>