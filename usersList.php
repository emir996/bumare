<?php

$servername="foodproject.zendev.se";
$username="foodproj_user";
$password="zendev123!!#";
$database="foodproj_germany";

date_default_timezone_set('Europe/Belgrade');
$conn = mysql_connect($servername, $username, $password);
if (!$conn) {
   die(mysql_error());
}
$db_selected = mysql_select_db($database, $conn);
if (!$db_selected) {
    die (mysql_error());
}
else{
    $result = mysql_query("SELECT * FROM users");

    ?>
    <table>
        <tr>
        <th>Nameee</th>
        <th>Email</th>
        <th>Job Title</th>
        <th>Phone Number</th>
        <th> Message</th>
        <th>Sent at</th>
</tr>
        <?php
        
    while($row=mysql_fetch_row($result))
    {
        
        ?>
    <tr>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[4]; ?></td>
    <td><?php echo $row[5]; ?></td>
    <td><?php echo $row[3]; ?></td> 
    <td><?php echo date('d.M.Y h i ', $row[6]); ?></td>  
    </tr> 
    <?php
    }
    ?>
    </table>
    <?php
//}



?>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
