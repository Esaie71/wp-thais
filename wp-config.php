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
define('DB_NAME', 'thais');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '9|shei857R}_9fU@k9/tQZ;tEqoYk+I~WJaOJhU~cF5bJPC$/#;KGsSZGD#:Q9CM');
define('SECURE_AUTH_KEY',  'th4[1@ z<>#rljTfe?SVW+YrI7WS4Q)?`@zN4 <z--!>B5@qU[P1S:V=Bm?35|Y}');
define('LOGGED_IN_KEY',    'ixQ{dB7mB{L{gHJj=RmY%eA- Gp|I&v:@N{$41~~/0XmquN?^2{t]^Q2Nk I_21R');
define('NONCE_KEY',        '6AK7s]ExTFP>,d&Lpt(<*O@oz{4}>Bto[Z9Pqd)G7X^Bgc>yd;t>KU[6[u3~4F@`');
define('AUTH_SALT',        'fer YKN@IC~vb4J,~#rTsg&)XUQZoGB{!uT_g9clyrTRIEuZ.3_%lUn@m9g86mg}');
define('SECURE_AUTH_SALT', 'Z? UB(:MolLcQq0O(n9?-?K(Y!NUzfR4T/|BVWeZS!;6l/IWjL>qhtRSEnwUUsK ');
define('LOGGED_IN_SALT',   ']Y[bIUZcXyEduE:+`z T9(|&0$%x2JorH>QWFXo#:!*hB>Yy=]~7,eCads9@hbeU');
define('NONCE_SALT',       'Sy>jE.7KUVr9JSzF >1jw_Z*;<!Y:QK8pGsNv4ssm:PV~^h;k5=X]=}C H@f{Nb>');

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
