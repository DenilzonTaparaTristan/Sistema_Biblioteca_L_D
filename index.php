<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * @package CodeIgniter
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://codeigniter.com
 * @since Version 1.0.0
 */

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 */
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 */
switch (ENVIRONMENT) {
    case 'development':
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED); // Suprimir warnings de deprecated
        ini_set('display_errors', 1);
        break;
    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        break;
    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}

/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 */
$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 */
$application_folder = 'application';

/*
 *---------------------------------------------------------------
 * VIEW DIRECTORY NAME
 *---------------------------------------------------------------
 */
$view_folder = '';

/*
 * ---------------------------------------------------------------
 * DEFAULT CONTROLLER
 * ---------------------------------------------------------------
 * (This is not normally set here, but for special cases)
 */
	// You can define default routing here if needed

/*
 * ---------------------------------------------------------------
 * CUSTOM CONFIG VALUES
 * ---------------------------------------------------------------
 * (If you need custom config settings, uncomment below)
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';

/*
 * ---------------------------------------------------------------
 * Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */
if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}

$system_path = realpath($system_path) !== FALSE ? realpath($system_path) . DIRECTORY_SEPARATOR : $system_path . DIRECTORY_SEPARATOR;

if (!is_dir($system_path)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly.';
    exit(3); // EXIT_CONFIG
}

define('BASEPATH', $system_path);
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));

/*
 * ---------------------------------------------------------------
 * Resolve application and view directories
 * ---------------------------------------------------------------
 */
$application_folder = realpath($application_folder) !== FALSE ? realpath($application_folder) : $application_folder;
define('APPPATH', $application_folder . DIRECTORY_SEPARATOR);
define('VIEWPATH', is_dir($view_folder) ? $view_folder : APPPATH . 'views' . DIRECTORY_SEPARATOR);

/*
 * ---------------------------------------------------------------
 * Load the bootstrap file
 * ---------------------------------------------------------------
 */
require_once BASEPATH . 'core/CodeIgniter.php';
