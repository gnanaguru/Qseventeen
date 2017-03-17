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
define('DB_NAME', 'qseventeen');

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
define('AUTH_KEY',         's(v0}eY/=KPr^4Nx4V*7%AgAI>{{!C~OP.PgGNcP&w1)q3!Y`O67Ck[W(*YHMJ8(');
define('SECURE_AUTH_KEY',  'I{m%]>UZu.>sm[R!O8^YE`d]/k@pt1I)04CnH|2>Q&o]h%n/G%I!`6 kb2H+,Um1');
define('LOGGED_IN_KEY',    '::SxQ2a&|1x,u#VstF;6MHek73I(bE?Uu>c{|HD]JMY<2PxT?Tqv]w Wl/}J*~[X');
define('NONCE_KEY',        'X|Yhr?Me<8YYNAv40(A^NWaVb3wujaO2SBy=NzK7Pc*OM-6wU9V`rdO@qwDnwCm/');
define('AUTH_SALT',        'tT!QbU X4PoFMgrG$fV*J+ayUY`J=RtBj(,zmvOd]Y+J`^EFUTp>2H<*zNI`h&sR');
define('SECURE_AUTH_SALT', 'a];55X%~Tb{^XCl^[qJsv-Ex/-PXA|Zdmm:E~1CZtZd/s6znEG=J;~[hYi!nK}Hn');
define('LOGGED_IN_SALT',   'rX,LV<A.XM3]k:s)tnM]u|<#e:V6An-?`~-tjTx27R Z=:j+,geNv_wk<thpM[]>');
define('NONCE_SALT',       'TA.xbE;^b|Q],d%zur7W!V AC?6;Uw0vi];yu+{-[-m1[t%_o(tQ8uS?;]5H1 .1');

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
