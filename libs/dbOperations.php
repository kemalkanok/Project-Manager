<?php
include 'dbOperationsSettings.php';
class dbOperations extends dbOperationsSettings {
	private $conn;
	function __construct(){
		$this->conn = new PDO("mysql:host={$this->server};dbname={$this->database}", $this->username, $this->password);
	}
	function Sql($sql,array $datas=null){
		$q=$this->conn->prepare($sql);
		$q->execute($datas);
		return $q;

	}
	/**
	 * creates a string which can be used for quick sql statements.
	 * @return string or null
	 * @param string $switch determines sql type cannot be null
	 * @param array $datas(string) gets datas from user can be null
	 * @param string $where gets where sentence can be null
	 * @param string $order_by gets order by sentence can be null
	 * @param string $having gets having sentence can be null
	 * @author @kemalkanok
	 * @todo start with switch
	 */
	function sql_prep($switch,array $datas = null,$where=null,$order_by = null , $having = null)
	{
		switch ($switch) {
			case 'Select':
				;
				break;
					
			default:
				;
				break;
		}
	}
}

?>