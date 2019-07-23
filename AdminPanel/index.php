<?php
      include 'translation.php';
      include '../config/config.php';


      error_reporting(E_ALL);
	  ini_set('display_errors', 1);

      $ulist = new Userslist();

    ?>
    <table>
        <caption>Users List</caption>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>Job title</th>
            <th>Phone Number</th>
            <th>Message</th>
            <th>Sent</th>
        </tr>
        <?php
        
        $get_users = $ulist->getAll();
        	if($get_users){
        		while($row = $get_users->fetch_row()){
        ?>
        <tr>

            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[3]; ?></td>  
            <td><?php echo $row[6]; ?></td>
        </tr> 
    <?php
        }
    }
    ?>
    </table><br><br>

    <table>
        <caption>Employers List</caption>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>Message</th>
        </tr>

        <?php 

            $get_employers = $ulist->getAllEmp();

            if($get_employers){

            	while($row = $get_employers->fetch_row()){

         ?>

        <tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            
        </tr>

        <?php 
        	} 
        }
        ?>

    </table>

    
<style>


table {
    margin: 0 auto;
    width: 80%;
}

caption {

    font-size: 22px;
}

th, caption {
    text-align: center;
}

table, th, td {

    border: 1px solid #000;
    border-collapse: collapse;
}

th, td {

    padding: 5px;
    text-align: center;
}

tr:nth-child(even){
    background-color: #fff;
}

tr:nth-child(odd){
    background-color: #ddd;
}
</style>
