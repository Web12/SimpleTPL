# SimpleTPL
Simple template engine for PHP

### Quick Start and Examples
```php
<?php

require 'tpl.class.php';

// Debug on
tpl::$debug = true;

// Set templates directory
tpl::$dir   = 'tpl/';

// Assign value to variable
tpl::set('myvar', 'Hello World');

// Render template tpl/helloworld.tpl.php
tpl::view('helloworld');

?>
```

tpl/helloworld.tpl.php
```php
<?php

echo $myvar;

?>
```

### Available Methods
