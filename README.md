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

tpl::set('out', 'Hello World');
tpl::view('helloworld');
?>
```
