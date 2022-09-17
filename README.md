# SimpleTPL
Simple template engine for PHP

### Quick Start and Examples
```php
<?php

require 'tpl.class.php';

# Debug on
tpl::$debug = true;

# Set templates directory
tpl::$dir   = 'tpl/';

tpl::set('myvar', 'Hello World');
tpl::view('helloworld');

?>
```

tpl/helloworld.tpl.php
```php
<?php

echo $myvar;

?>
```
