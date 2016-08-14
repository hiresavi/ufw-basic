<?php
$id = $_REQUEST['id'];

$object = array(
	'name_prefix' => '',
	'name_first' => '',
	'name_middle' => '',
	'name_last' => '',
	'name_suffix' => '',
	'dob' => '',
	'about' => '',
	'mobile_number' => '',
	'created' => '',
	'email' => '',

);

//database creds 
$servername = 'localhost';
$username = 'homestead';
$password = 'secret';
$dbname = 'ufw-test';

//connect
$connection = new mysqli($servername, $username, $password, $dbname);

//catch & print errors
if ($connection->connect_error) {
	echo('Could not connect!'.$connection->connect_error);
	exit;
}

//Good if we got here

// echo('Connected!<br>');

//get to the individuals' table
// $connection->select_db('tblIndividual');

// query to get an individual's record
$sql = 'SELECT * FROM tblIndividual WHERE id = '.$id;

// echo $sql.'<br>';

//execute

$result = $connection->query($sql);

// var_dump($result);

if ($result->num_rows > 0) {
	$object = $result->fetch_assoc();
	// echo('<pre>');
	// print_r($object);
	// echo('</pre>');
}
else{
	echo("Oops! No such record found!");
	exit;
}



// $titleText = 'Default Title';
// $headerText = '';
// $descriptionText = '';
// $codeText = '';

//commenting to learn commenting on if-elseif
// if ($id == 1) {
// 	//if ID =  1, do this
// 	$object = array(
// 		'titleText' => 'Individual Users',
// 		'headerText' => 'This is about the Individual as an object',
// 		'descriptionText' => 'They are the most important objects in the UFW project',
// 		'codeText' => 'alert(Users)',
// 	);

// 	// $titleText = 'Individual Users';
// 	// $headerText = 'This is about the Individual as an object';
// 	// $descriptionText = 'They are the most important objects in the UFW project';
// 	// $codeText = 'alert(Users)';	
// } 
// elseif ($id == 2) {
// 	//if ID = 2, do this

// 		$object = array(
// 			'titleText' => 'Organization Users',
// 			'headerText' => 'This is about the Organization as an object',
// 			'descriptionText' => 'They are the second most important objects in the UFW project',
// 			'codeText' => 'alert(Users)',
// 		);	
// 	// $headerText = 'This is about the Organization as an object';
// 	// $titleText = 'Organization Users';
// 	// $descriptionText = 'They are the second most important objects in the UFW project';
// 	// $codeText = 'alert(Users)';	
// }


?>


<!DOCTYPE html>
<html>

<head>
<title><?php echo('Individual Member'); ?></title>
</head>

<body>

<h1><?php echo($object['name_prefix'].$object['name_first'].' '.$object['name_middle'].' '.$object['name_last']);
// Need to check for non-null suffix to insert a comma in the display
if($object['name_suffix'] != NULL){
	echo(', '.$object['name_suffix']);
}
	 
?>
</h1>
<p>
<?php 
// Need to check for non-null about text to show it
if($object['about'] != NULL){
	echo('About: '.$object['about']); 
}
?>
</p>


</body>

</html>