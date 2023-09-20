<?

	// $arr = [
	// 	[
	// 		"emp_no" => 10001
	// 		,"gender" => "F"
	// 	]
	// 	,[
	// 		"emp_no" => 10002
	// 		,"gender" => "M"
	// 	]
	// 	];


	// foreach($arr as $key => $item)
	// {
	// 	if($item["gender"] === "M")
	// 	{
	// 		echo($item["emp_no"]);
	// 		// print_r($item);
	// 	}
	// }

	// function my_db_conn( &$conn )
	// {
	// 	$db_host 	= "localhost"; //host | 127.0.0.1 = localhost 
	// 	$db_user 	= "root"; // user
	// 	$db_pw 		= "php504"; // password
	// 	$db_name 	= "employees"; // DB name
	// 	$db_charset = "utf8mb4"; // charset
	// 	$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
	// try
	// {
	// 	$db_options = [
	// 		PDO::ATTR_EMULATE_PREPARES		=> false
	// 		,PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION
	// 		,PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC
	// 		];
		
	// 		$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
	// }
	// catch( Exception $e )
	// {
	// 	$conn = null;
	// 	return false;
	// }

	// return true;
	// }

	// $conn = null;
	// if(my_db_conn($conn))
	// {
	// 	echo "DB connect Error";
	// 	exit;
	// }

?>