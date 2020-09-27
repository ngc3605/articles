<?php 


require_once(ROOT.'/core/db.php');


class Article{


	public static function getArticleById($id){
		$db = DB::DBconnection();
	
		$result = $db->prepare('SELECT * FROM article WHERE id=:id');
		$result->execute(array('id' => $id));

		return $result->fetch();
	}

	public static function getListOfArticles(){

		$db = DB::DBconnection();
		$result = $db->query('SELECT * from article');
		$allArticles = [];
		$i = 0;
		while($row = $result->fetch()){
			$allarticles[$i]['title'] = $row['title'];
			$allarticles[$i]['content'] = $row['content'];
			$allarticles[$i]['db_create'] = $row['db_create'];
			$allarticles[$i]['author'] = $row['author'];
			$i++;
		}
		return $allarticles;
	}

}