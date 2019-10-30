
<nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><img src="../../images/toggler.png"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand text-white" href="#"><img src="../../images/logo1.png" style="width:40px; height:40px;" /></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php" >Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link text-white" href="language.php">Languages <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link text-white" href="jobs.php">Jobs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link text-white" href="public_cv.php">Public CV <span class="sr-only">(current)</span></a>
      </li>
    </ul>
      

      <!--<button type="submit" class="btn add" data-toggle="modal" data-target="#addModal">Create New</button> button for inserting new sentence -->
      <a href="?action=logout" style="text-decoration:none;"><button class="btn-logout my-2 my-sm-0" type="submit">Logout</button></a>
    
  </div>

</nav>
<?php
  require 'urlmessages.php';
?>







