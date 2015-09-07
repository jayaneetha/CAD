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

$active_group = 'azure';
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
$db['imcd']['hostname'] = 'localhost';
$db['imcd']['username'] = 'imcdsorg_cad';
$db['imcd']['password'] = 'Getmeinside123';
$db['imcd']['database'] = 'imcdsorg_cad';
$db['imcd']['dbdriver'] = 'mysql';
$db['imcd']['dbprefix'] = 'cad_';
$db['imcd']['pconnect'] = TRUE;
$db['imcd']['db_debug'] = TRUE;
$db['imcd']['cache_on'] = FALSE;
$db['imcd']['cachedir'] = '';
$db['imcd']['char_set'] = 'utf8';
$db['imcd']['dbcollat'] = 'utf8_general_ci';
$db['imcd']['swap_pre'] = '';
$db['imcd']['autoinit'] = TRUE;
$db['imcd']['stricton'] = FALSE;

//Localhost testing Environment
$db['local']['hostname'] = '127.0.0.1:3306';
$db['local']['username'] = 'root';
$db['local']['password'] = 'root';
$db['local']['database'] = 'IMCD_CAD';
$db['local']['dbdriver'] = 'mysql';
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

//Database=IMCDDBMySQLDatabase;Data Source=ap-cdbr-azure-southeast-a.cloudapp.net;User Id=bd18de3af977d7;Password=bf62da20
//Azure
$db['azure']['hostname'] = 'ap-cdbr-azure-southeast-a.cloudapp.net';
$db['azure']['username'] = 'bd18de3af977d7';
$db['azure']['password'] = 'bf62da20';
$db['azure']['database'] = 'IMCDDBMySQLDatabase';
$db['azure']['dbdriver'] = 'mysql';
$db['azure']['dbprefix'] = 'cad_';
$db['azure']['pconnect'] = TRUE;
$db['azure']['db_debug'] = TRUE;
$db['azure']['cache_on'] = FALSE;
$db['azure']['cachedir'] = '';
$db['azure']['char_set'] = 'utf8';
$db['azure']['dbcollat'] = 'utf8_general_ci';
$db['azure']['swap_pre'] = '';
$db['azure']['autoinit'] = TRUE;
$db['azure']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */