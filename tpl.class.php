<?php
/**
 * @author      Web12 <info@web12.ru>
 * @copyright   Copyright (c) 2022
 * @license     Apache License 2.0
 */

/**
 * Class Simple Tpl
 */
class Tpl
{
    /**
     * @var array | Array of variables
     */
    private static $vars = [];

    /**
     * @var string | Finished render
     */    
    private static $render = '';

    /**
     * @var boolean | Debug mode
     */
    public static $debug = false;

    /**
     * @var boolean | Output or return finished render
     */
    public static $return = false;    

    /**
     * @var string | Templates folder
     */    
    public static $dir   = 'tpl/';

    /**
     * @var string | Templates file extension
     */    
    public static $ext   = '.tpl.php';


    /**
     * Render template
     *
     * @param string | Template filename
     */
    public static function view($template)
    {

        // Full path to the template
        $template = self::$dir . $template . self::$ext;
        # __DIR__ . '/' .
        
        // Check if template file exists
        if (self::$debug) {
            if (!is_file($template)) {
                throw new Exception('Template file ' . $template . ' not found!');
            }
        }

        // Imports variables
        if (sizeof(self::$vars) > 0) {
            extract(self::$vars);
        }

        // Render template
        ob_start();
        include($template);
        self::$render = ob_get_contents();
        ob_end_clean();

        // Returns a finished render
        if (self::$return) {
            return self::$render;
        }

        // Outputs the finished render
        echo self::$render;
    }


    /**
     * Render multiple templates
     *
     * @param array | Array of templates
     * Example: ['header', 'index', 'footer']
     */    
    public static function viewArray($templates)
    {
        foreach ($templates as $template) {
            self::view($template);
        }
    }


    /**
     * Assign value to variable
     *
     * @param string | Variable name
     * @param string | Variable value
     */    
    public static function set($name, $value)
    {
        self::$vars[$name] = &$value;
    }


    /**
     * Assigns variables
     *
     * @param array | Array of $name => $value 
     * Example: ['title' => 'My Site', 'desc' => 'Site description']
     */ 
    public static function setArray($array)
    {
        foreach ($array AS $key => $value) {
            self::set($key, $value);
        }
    }  


    /**
     * Clears variables and finished render
     */
    public static function clear()
    {
        self::$vars = [];
        self::$render = '';
    }

}
