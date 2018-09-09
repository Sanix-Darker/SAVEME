<?php 
	// A test file for your app



	//Add the line of SAVEME's inclusion here
	include('SAVEME/index.php');

	echo "<center><br><br><br><br><h2>Test App</h2></center>";

	try
	{
    	$BD = new PDO("mysql:host=localhost",  'root','');
    	// set the PDO error mode to exception
    	$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	//Create database
    	$sql = "CREATE DATABASE databases;";
    	//Create the table tables
    	$sql .="DROP TABLE IF EXISTS `tables`;
				CREATE TABLE IF NOT EXISTS `tables` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(200) NOT NULL,
				  `email` varchar(150) NOT NULL,
				  `number` varchar(100) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;";

    	// use exec() because no results are returned
    	$BD->exec($sql);
    	echo "Database created successfully<br>";
    }
	catch(PDOException $e)
    {
    	echo $sql . "<br>" . $e->getMessage();
    }
	$BD = null;

	// Database connection
	try{
		$BD = new PDO('mysql:host=localhost;dbname=databases', 'root','');
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	$Request = $BD->query('SELECT * FROM tables');
	while ($data = $Request->fetch()) {
		echo 'Name:'.$data['name'].'| Email:'.$data['email'].'| Phone Number:'.$data['number'].'|<br><hr>';
	}

?>