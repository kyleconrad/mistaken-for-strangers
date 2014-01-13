<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'mistakenforstrangers_com_1');

/** MySQL database username */
define('DB_USER', 'pcem3quk');

/** MySQL database password */
define('DB_PASSWORD', '2U^NZj9!');

/** MySQL hostname */
define('DB_HOST', 'mysql.mistakenforstrangers.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_SITEURL', 'http://www.mistakenforstrangers.com');
define('WP_HOME','http://www.mistakenforstrangers.com');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hIAiqk*NUDxDO4zzn@bIyQ0pUAaI`kD33&/#n_+;o$JALZj"UD?))NsiQW7G6b@h');
define('SECURE_AUTH_KEY',  'e8str$~|+_L8GyvhH5DG|S*VnsTPTQ51OAk2;`T;jaiGYP?M%aVY*Tio8wiSMbs(');
define('LOGGED_IN_KEY',    'n0%5mAiUh&b7/@v"?wr)FQ#Wr:(GbN)U/82cX6/"eaFNL(WW2SdMc)M&zMUs"c01');
define('NONCE_KEY',        '@va4I#MPaZr(R6;FdU)TDOFBV1/2%uo0(|b@#4~zpGZ9u(2%kDY`fvh$7$X67Os|');
define('AUTH_SALT',        'DJVO(eghtd^w6Ku)zD?;ozlT3p_VZ944y#!b6cWdx8r;3M~@)ISO6Zpi):O*guhy');
define('SECURE_AUTH_SALT', 'yPCwy#WGgR:ms$@uE_5@(11BrC/wB9HN&Uf*pg#eMdUGU`Vz3&w7+7ODNfRE2X2f');
define('LOGGED_IN_SALT',   'R"&!#EdtvOoeniehCft3I;p;Z15_0c!1gu~W+OUqFtd|vj(K|sIfgZ)3&?BVb5)A');
define('NONCE_SALT',       'Q4p@|Ha:Dr7`ik"#f:VTEq20oqtga6O_$U96oofKg|S#A&B3Ah5a&bf)evppKUa+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_cehj6z_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

