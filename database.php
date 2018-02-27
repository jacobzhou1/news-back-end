<?php

class database {

	private $connection;

	private function getConnectionInstant() {
		// if connection has been built, use connection, else create a connection
		if (!$this->connection) 
		{
			$pdo = new PDO('mysql:host=localhost;dbname=news_db;charset=utf8mb4', 'root', 'root');
			$this->connection = $pdo;
		}

		return $this->connection;
	}

	public function getNews($id = 'all') {

		if (!is_numeric($id)) {
			// get all News
			$stmt = $this->getConnectionInstant()->query('SELECT * FROM news');
			$news = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			// get news by id
			$stmt = $this->getConnectionInstant()->prepare('SELECT * FROM news WHERE id=:id');
			$stmt->execute(
				array(
					':id' => $id
				)
			);
			$news = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		return $news;
	}





}





?>