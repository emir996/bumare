	<?php 
	 $lang="en";
	 if(isset($_GET["lang"]))
	 {
	 	$lang=$_GET["lang"];
	 	if( $_GET["lang"] == "de" )
	 	{
	 		include('languages/de.php');
	 	}
	 	else if( $_GET["lang"] == "ba" )
	 	{
	 		include('languages/ba.php');
	 	}
	 	else
	 	{
	 		include('languages/en.php');
	 	}
	 }
	 else
	 {
		include('languages/en.php');
	}
	?>