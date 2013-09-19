<?php
/**
 * @author Konstantinos Tsatsarounos
 * <br />
 * <b> You can use this class for access any MySQL Database </b>
 * @method insert
 * @method get
 * @method delete
 * @method doQuery
 * @method doLastQuery
 * @property currentQuery - query Object
 * @property currentQuery - array
 */
class Database {
	public $currentQuery = NULL;
	
	private $db = false;
	public $lastQuery = array('queryString' => "", 'queryObject' => NULL );	
	
	
	/**
	 * @param string $host Example: locahost 
	 * @param string $database - The name of the database
	 * @param string $username - Database username
	 * @param string $password - Database password
	 * @return Database
	 */
	public function __construct( $host = 'localhost', $database, $username, $password = ''){
		
		try{
			$this->db = new PDO("mysql:dbname=$database;host=$host", $username, $password);
		}
		catch (PDOException $exc){
			echo 'Exception code: '
					.$exc->getCode()
					.' in file'.$exc->getFile()
					.' '.$exc->getMessage()
					.' line: '.$exc->getLine();
		}
		
		if($this->db){
			return $this;
		}
	}
	
	/**
	 * @param string $table
	 * @param array $data
	 */
	public function insert( $table ,array $data ){
		$columns = $this->FormatDataForQuery( array_keys($data) );
		$values = $this->FormatDataForQuery( array_values($data), "'" );		
		
		$sql = "insert into $table ( $columns ) values( $values );";
		$this->setLastQuery( $sql, $this->db->query($sql) );				
	}
	
	/**
	 * @param string $table
	 * @param string or array $columns
	 * @return multitype: multidimension array
	 */
	public function get($table, $columns){
		$data = array();
		if(is_array($columns)){
			$columns = $this->FormatDataForQuery($columns);
		}
		
		$sql = "select $columns from $table;";
		foreach ( $query = $this->db->query($sql) as $row ){
			array_push($data, $row);
		}
		$this->setLastQuery( $sql, $data );		
		
		return $data;
	}
	
	/**
	 * @param string $query
	 * @return Database
	 */
	public function doQuery($query){
		if( is_string($query) ){
			$this->currentQuery = $this->db->prepare($query);
			$data = $this->currentQuery->execute();
			$this->setLastQuery($query, $data);
		}
		return $this;
	}
	
	/**
	 * @param string $table
	 * @param string $condition
	 */
	public function delete($table, $condition ){
		if(is_string($condition)){
			$sql = "delete from $table where $condition";
			$this->setLastQuery( $sql, $this->db->query($sql) );
		}
	}
	
	/**
	 * @param array $data
	 * @param string $encloseTo
	 * @return string - formatted string
	 */
	private function FormatDataForQuery( array $data, $encloseTo = "" ){		
		$values = array();		
		$counter = 0;
		
		foreach ( $data as $key => $value ){			
			$values[$counter] = "{$encloseTo}{$value}{$encloseTo}";
			$counter++;
		}				
		
		$values = implode( ', ' , $values );	
		
		return $values;
	}
	
	/**
	 * Do the last Query again - useful for updates
	 * @return Database
	 */
	public function doLastQuery(){
		$this->currentQuery = $this->db->prepare($this->lastQuery['queryString']);
		$this->currentQuery->execute();
		return $this;
	}
	
	private function setLastQuery( $queryString, $queryObject ){
		$this->lastQuery['queryString'] = $queryString;
		$this->lastQuery['queryObject'] = $queryObject;
	}	
}