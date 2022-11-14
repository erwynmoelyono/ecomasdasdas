<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'erwin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3d<QD` Edt4([PVyo3%nM?[f/!a7u*S1s%&ABwgds>Yn51)!?xN+rW|qq=D(<uu-' );
define( 'SECURE_AUTH_KEY',  '?sOexR&9U<t-3h59< ,<:D@e@QP[aN?)5Z(^+7`%Z*I3>?a!?5]J;9s8erm.$Y%:' );
define( 'LOGGED_IN_KEY',    '%]zvew:]QAWrf;(-//$~<>kDX=wbr0jU-T7E/`Pt+?6uD=-M+FS8RbWPW$y}DuSh' );
define( 'NONCE_KEY',        'CU3kVWTpGDL?9icnNvVOa78RJ`0YCyH3]n/d%K~#h7Qt}IP8jF>RY(kuTTVX%. m' );
define( 'AUTH_SALT',        '(;Ht-CNBFL;6Tk/J:{i|<(1jou2xwOXFl~}sg,rqg`9ZoGU?zeWMp=<|Fij[?mt[' );
define( 'SECURE_AUTH_SALT', '/6hD_5YIpWw8876LQ8q[Iu]*x,p+tfxC%2@-3~l:pzz8OUkJ$ojS,&y3w,gCK[>5' );
define( 'LOGGED_IN_SALT',   'sdqGFe3(NJ}_P6D^*X!~g8@A!e;:w>=oD#[@HI@`A L>0c#Zim)g92-3x}907o25' );
define( 'NONCE_SALT',       'gUh|[r*d/BhtluG:R8P)fGBTO^C4aJp6GpZZ}/= NTQdWQEB#~^b` @%~:Dc#WX]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false);
//Menghilangkan Notice dan Warning
ini_set('display_errors','off');
ini_set('error_reporting',E_ALL);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
