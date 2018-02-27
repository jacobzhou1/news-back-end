<?php

class news {
	public function defaultMethod() {
		$this->getMethod();
	}

	public function addMethod() {
		echo "This is news class add method";
	}

	public function deleteMethod() {
		echo "This is news class delete method";
	}

	public function updateMethod() {
		echo "This is news class update method";
	}

	public function getMethod($param = 'all') {
		$database = new database();
		if (is_numeric($param)) {
			$news_result = $database->getNews($param);
		} else {
			$news_result = $database->getNews();
		}
		
		echo json_encode($news_result);
	}
}

?>