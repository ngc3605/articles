<?php

require_once(ROOT.'/model/article.php');
class ArticleController {


	public function actionList(){

		$articlesList = Article::getListOfArticles();
	
	
		

		include_once(ROOT.'/views/v_articles.php');
		return true;
	}
	public function actionView(array $params){



		$article = Article::getArticleById($params[0]);
		
			include_once(ROOT.'/views/v_article.php');
		
		return true; 
	}

}