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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', '<your-password>' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'BXOhBF-?J-ydkN*,yo`Y:K];,g-om$I^x<l.Dt(1iAbvK}i2.>0`g3#!~a_GOXfc');
define('SECURE_AUTH_KEY',  '$3X?7[_fx<;i 7<01*;Th+`lA/Z.~V|Jig/wfJ*52:Y_0C1(+=;2u;Wanc,T2X>F');
define('LOGGED_IN_KEY',    'd]Q4AHhC_NV&@&P+=E^RsnfE;e~V?/)hA` 1QgA@VtFnY,,u_,k15-+QxXbyWItM');
define('NONCE_KEY',        'vO-[!PC;_U|ESwwTejJddZ[+N<,H90=+O{;+:cYfJH+< gX,>[^YbBli&H_ao{N*');
define('AUTH_SALT',        'JS~v<K7&{E<&;E4Jr),A-~7KV7{=WM`|(liU|GH2[|)7#+Oi.np_|1^0h]zO&q+*');
define('SECURE_AUTH_SALT', '0;(J/>T^qJHlO g#rC+]P+[@q{UA&2BfFXn IY-#0{1wLU9n#l-eK1,b?sn{Ki2q');
define('LOGGED_IN_SALT',   'xdawrA0P*,v%ec|YOmD+%4T*+^3(D?1ya-_G;53-{18|&:EXH]|G*zKbbywyD*mZ');
define('NONCE_SALT',       ')wwCdb<{<,#(A ~Dg<P+IbGk7Z+7c,8o-0]-lB~;;|`EwXoSI5g[~|EFirEUU$<:');
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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

/* Multisite */
define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
