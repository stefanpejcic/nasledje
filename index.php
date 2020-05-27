<?php
date_default_timezone_set("Europe/Belgrade");
define('APP_VERSION_REAL_ESTATE', '1.6.6');

$strict_development_mode = FALSE;
$strict_enable_error_reporting = FALSE;
 
if( (strpos(dirname(__FILE__), '\xampp') === FALSE && $strict_development_mode === FALSE) ||
    file_exists('install.txt') )
{
    define('ENVIRONMENT', 'production');
}
else
{
    define('ENVIRONMENT', 'development');
}

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ERROR | E_WARNING | E_PARSE);
		break;
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

if($strict_enable_error_reporting === TRUE)
{
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
}

	$system_path = 'system';
	$application_folder = 'application';

	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	$system_path = rtrim($system_path, '/').'/';

	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
	define('EXT', '.php');
	define('BASEPATH', str_replace("\\", "/", $system_path));
	define('FCPATH', str_replace(SELF, '', __FILE__));
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));
	
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

require_once BASEPATH.'core/CodeIgniter.php';
