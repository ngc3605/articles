<?php  


class Router {
	private $routes;

	public function __construct(){
		$routesPath = ROOT.'/config/routers.php';
		$this->routes = include($routesPath);
	}

	private function getURI(){
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}

	}
//принимает управление от front controller
	public function run(){
		$uri = $this->getURI();
	

		// $uri = 'php/myapp/article/222/ddd';
		// $pattern = '~php/myapp/article/([0-9]+)~';
		// $path = 'article/view/$1';
		// $a = preg_replace($pattern, $path, $uri);
		// echo $a.'<br>';

		foreach($this->routes as $URIpattern => $path){
			 if(preg_match($URIpattern, $uri)){
				
				
				$internalRoute = preg_replace($URIpattern, $path, $uri);
				//$seg = explode('/', $path); // for controller and action
			
				$segments = explode('/', $internalRoute); // for params
				
				
				$controllerName = ucfirst(array_shift($segments).'Controller');
			 	$actionName = 'action'.ucfirst(array_shift($segments));
			 
			 	$params = $segments;

			 	$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
			 	if(file_exists($controllerFile)){
			 		
			 		include_once($controllerFile);
			 	}
			 	$controllerObject = new $controllerName;
			 	
			 	$result = $controllerObject->$actionName($params);

			 	
			 	if($result != null){
			 		break;
			 	}
			 }

	}
}
}