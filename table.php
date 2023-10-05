$host = 'localhost';
$user = 'root';
$password = '';
$db = 'cpct';

$dsn = "mysql:host=localhost;dbname=cpct;charset=UTF8";

try {
	$pdo = new PDO($dsn, $user, $password);

	if ($pdo) {
		// echo "Connected to the $db database successfully!";


	}
} catch (PDOException $e) {
	echo $e->getMessage();
}


$query = 'SELECT * FROM registration order by Sno ASC';

$statement = $pdo->query($query);

$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<tr>
 <?php foreach ($publishers as $publisher) { ?>

   
<td> <?php echo $publisher['Sno']; ?></td>
   <td><?php echo $publisher['fname'];?> </td>    
   <td><?php echo $publisher['dob']; ?> </td>

   <td><?php echo $publisher['gender']; ?></td> 
    <td><?php echo $publisher['email']; ?> </td> 
  

    
   </tr>

<?php }