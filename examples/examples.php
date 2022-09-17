<?php

include ('../tpl.class.php');

# tpl::$debug = true;
tpl::$dir = __DIR__ . '/templates/';

tpl::setArray([
	'title'  => 'Site title', 
	'desc' 	 => 'Site description', 
	'site'   => 'www.Site.com',
	'search' => 'Search...',
]);

tpl::set('hello','Hello Word');

tpl::viewArray(['header','index','footer']);

?>