<?

function my_db_learn_conn( &$db_conn )
{
	$db_host 	= "localhost"; //host | 127.0.0.1 = localhost 
	$db_user 	= "root"; // user
	$db_pw 		= "php504"; // password
	$db_name 	= "employees"; // DB name
	$db_charset = "utf8mb4"; // charset
	$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

	$db_options = [
	PDO::ATTR_EMULATE_PREPARES		=> false
	,PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION
	,PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC
	];

	// PDO Class로 DB 연동
	$db_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}



	function db_destroy_learn_conn(&$db_conn)
	{
		$db_conn = null;
	}

?>