<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['display_override'] = array(
    'class'    => 'Installer',
    'function' => 'verify',
    'filename' => 'Installer.php',
    'filepath' => 'hooks',
    //'params'   => array('beer', 'wine', 'snacks')
);
