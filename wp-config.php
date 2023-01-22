<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'folhacomercio');

/** MySQL database username */
define('DB_USER', 'folhacomercio');

/** MySQL database password */
define('DB_PASSWORD', 'teste');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'm{<?%<|nc>K~XXg{Q<elZBrJ.Ff8.=X0y2lP3INJ{mF(R_DL2SqiWR(u*x??*FoA');
define('SECURE_AUTH_KEY',  '@,4Q`Fu/ y%=vj!bMf5aU8Hag~V10W$D?CfPg>`pXI O5aLK%@k?b1u_oibo=rJK');
define('LOGGED_IN_KEY',    'k;lPFGyAxXYz:D^R`L@-t0m2]ffHT?=sE:?tYO%GF??6YGT57ZB2TzrTh>CL5oGY');
define('NONCE_KEY',        'BKhl<Zn[JJG/g82Z?fRTeo;BLvuY*4*4IY>}X0jBYuojRi]w+4B{v@$@iI)!*H$+');
define('AUTH_SALT',        '@vIhOaO;D[o:D.T{3i_S).sd%k_%94@RATx[FPGFYk}+DlDDyp7>FKeTt!FE(_gf');
define('SECURE_AUTH_SALT', '53{0]hW}^U/<Ef]z,(mn5LUR:L0jj=w-%+gSzb(~/o=$URASFA#NPHU3y0rG!]-W');
define('LOGGED_IN_SALT',   ';`++bk8Z#FmV]w=^;5$nt}E|Htl!+Ev}xrN0RocN0y8<8[F>3-|iS!>r$PN!]+aF');
define('NONCE_SALT',       '1P>cw21oUL66b<iK0{dG:~KMk9kubBw;a! K93F%jo?I%&Dbj#u4U*2zL,V,;LL,');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
