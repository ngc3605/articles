<?php

return array(
	'~php/myapp/article/([0-9]+)~' => 'article/view/$1',
	'~php/myapp/article~' => 'article/list',
	'~php/myapp/news~' => 'news/list'
);
