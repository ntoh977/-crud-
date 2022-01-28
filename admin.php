   <table width='50%'height='15%' border='0' class='table'>
<thead>
   <tr bgcolor='yellow'>
      <td>id</td>
      <td>Фамилия</td>
      <td>title</td>
      
   </tr>

   <?php 
require_once "config.php";
  $result = $pdo->prepare("SELECT * FROM users");
$result->execute();
if($result->rowCount() > 0){
    while($res = $result->fetch(PDO::FETCH_BOTH)){
    	echo '
    	<tr bgcolor="aqua">';
    	 
        echo '<td class = "mail">', $res['id'] , '</td>
        <td class = "login">', $res['username'] , '</td>
              <td class = "mail">', $res['surname'] , '</td>
             <td><a href=dell.php?id='. $res['id'] .'>Delete</a></td>
             <td><a href=update.php?id='. $res['id'] .'>UPDATE</a></td>
             ';
                '</tr>
    	';

    }
}

   ?>
   </thead>
   </table>
   <style type="text/css">

   	.table {
	width: 100%;
	margin-bottom: 20px;
	border: 1px solid #dddddd;
	border-collapse: collapse; 
}
.table th {
	font-weight: bold;
	padding: 5px;
	background: #efefef;
	border: 1px solid #dddddd;
}
.table td {
	border: 1px solid #dddddd;
	padding: 5px;
}
   </style>