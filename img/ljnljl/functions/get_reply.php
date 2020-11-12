<?php 

/**
 * Получение отчёта в *.csv
 */

$_table = 'train';

function get_csv_customers($_table) {
	$db_record = $_table;
	$where = 'WHERE id > 400';

	/**
	 * Название экспортируемого файла и данные подключения
	 */
	$csv_filename = $db_record . '_db_export_' . date('Y-m-d H:i') . '.csv';
	$server = "localhost";
	$user = "mysql";
	$password = "mysql";
	$database = "yakuza2";
	
	$conn = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
		 die("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	
	$csv_export = '';
	
	mysqli_query($conn, "SET NAMES 'cp1251'");
	
	$query = mysqli_query($conn, "SELECT * FROM " . $db_record . " " . $where);
	$field = mysqli_field_count($conn);
	
	for ($i = 0; $i < $field; $i++) {
		 $csv_export .= mysqli_fetch_field_direct($query, $i)->name . ';';
	}
	
	$csv_export.= '
	';
	
	while ($row = mysqli_fetch_array($query)) {
		 for ($i = 0; $i < $field; $i++) {
			  $csv_export.= '"' . $row[mysqli_fetch_field_direct($query, $i)->name] . '";';
		 }
		 $csv_export .= '
	';
	}

	header("Content-type: text/x-csv");
	header("Content-Disposition: attachment; filename=" . $csv_filename . "");
	echo($csv_export);
}
if (isset($_POST['train'])){
    get_csv_customers("train");
}
?>