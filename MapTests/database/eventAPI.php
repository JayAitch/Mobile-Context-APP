<?php
class EventAPI{
	
		private $rc = 500;
		public $data = null;
		private $databse = null;
		private $table = null;
		//constructor
	public function __construct(){
		$this -> data = array();
		$this -> database = new mysqli('itsuite.it.brighton.ac.uk', 'jh1152' ,'jh1152', 'jh1152_appdata');
		$this -> table = 'eventsdb';
	}
	
	public function __destruct(){
		$this->database->close();
	}
	
	public function handleRequest(){
		if($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->getItem(); // return item
			}
		else if($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->postItem(); // create item
			}
			// ... PUT, DELETE
		else {
			$this->rc = 400; // bad request
			}
		http_response_code($this->rc); // set status code
		
		if($this->rc == 200) {
			header('content-type: application/json'); // set header
			echo json_encode($this->data); // serve data
			}
		
	}
	
	
	
	private function getItem() {
		if(isset($_GET['id'])/* $_GET parameter found */) {
			// check and sanitise parameter
			$getParam = $_GET['id'];

			if(true/* parameter ok */) {
				// build and execute SQL statement to read item from database
				$query = "SELECT * FROM " .$this->table." WHERE id =". $getParam;				
				if($result = mysqli_query($this->database, $query)/* query executed successfully */) {
					if($result!=null/* data returned*/) {
					// fill $this->data array with query results
					while ($row = mysqli_fetch_assoc($result)) {								
					$this->data[] = $row;
					}					
					
					// set status code 200 OK
					$this->rc=200;
					} else {
					// set status code 204 No Content
					$this->rc=204;
				}
				} else {
				// set status code 500 Internal Server Error
				$this->rc=500;
				}
			} else {
			// set status code 400 Bad Request
			$this->rc=400;
			}
		} else {
		// set status code 400 Bad Request
			$query = "SELECT * FROM " .$this->table;	
			if($result = mysqli_query($this->database, $query)/* query executed successfully */) {
				if($result!=null/* data returned*/) {
					// fill $this->data array with query results
					while ($row = mysqli_fetch_assoc($result)) {								
						$this->data[] = $row;
						}
					}	
				}
		$this->rc=200;
		}
	}
	

	
	
}

$lAPI = new EventAPI();
$lAPI->handleRequest();

?>