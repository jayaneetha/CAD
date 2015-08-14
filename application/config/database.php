<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'heroku';
$active_record = TRUE;
//mysql://ba3c63fdc5533f:a24da439@us-cdbr-iron-east-02.cleardb.net/heroku_859a8699216795c?reconnect=true

/*
$db['default']['hostname'] = 'us-cdbr-iron-east-02.cleardb.net';
$db['default']['username'] = 'ba3c63fdc5533f';
$db['default']['password'] = 'a24da439';
$db['default']['database'] = 'heroku_859a8699216795c';

$db['default']['hostname'] = '127.0.0.1:3306';
$db['default']['username'] = 'root';
$db['default']['password'] = 'root';
$db['default']['database'] = 'IMCD_CAD';

$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = 'cad_';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
*/

//Heroku testing Environment
$db['heroku']['hostname'] = 'us-cdbr-iron-east-02.cleardb.net';
$db['heroku']['username'] = 'ba3c63fdc5533f';
$db['heroku']['password'] = 'a24da439';
$db['heroku']['database'] = 'heroku_859a8699216795c';
$db['heroku']['dbdriver'] = 'mysqli';
$db['heroku']['dbprefix'] = 'cad_';
$db['heroku']['pconnect'] = TRUE;
$db['heroku']['db_debug'] = TRUE;
$db['heroku']['cache_on'] = FALSE;
$db['heroku']['cachedir'] = '';
$db['heroku']['char_set'] = 'utf8';
$db['heroku']['dbcollat'] = 'utf8_general_ci';
$db['heroku']['swap_pre'] = '';
$db['heroku']['autoinit'] = TRUE;
$db['heroku']['stricton'] = FALSE;

//Localhost testing Environment
$db['local']['hostname'] = '127.0.0.1:3306';
$db['local']['username'] = 'root';
$db['local']['password'] = 'root';
$db['local']['database'] = 'IMCD_CAD';
$db['local']['dbdriver'] = 'mysqli';
$db['local']['dbprefix'] = 'cad_';
$db['local']['pconnect'] = TRUE;
$db['local']['db_debug'] = TRUE;
$db['local']['cache_on'] = FALSE;
$db['local']['cachedir'] = '';
$db['local']['char_set'] = 'utf8';
$db['local']['dbcollat'] = 'utf8_general_ci';
$db['local']['swap_pre'] = '';
$db['local']['autoinit'] = TRUE;
$db['local']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */