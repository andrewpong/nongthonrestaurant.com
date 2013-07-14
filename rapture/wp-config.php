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
define('DB_NAME', 'pvobee_rapture');

/** MySQL database username */
define('DB_USER', 'pvobee_rapture');

/** MySQL database password */
define('DB_PASSWORD', '20011902');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'P)!.PdQSFRF0v/bPu6P }h=&KN+R+G>$>/R2&Eaox}6`K7Y`<M*/0mJ2bU4OTC#7');
define('SECURE_AUTH_KEY',  '*^ q]2t5v0AII6+M@t#!6Z4W{DcD-y8nD]G-/3oPi{w(-8ucQE&8MU3Ho+Hm~ts2');
define('LOGGED_IN_KEY',    'obd0TgEFeqX5]SPO9SOOG|:#-AN<m`ZZvpG~{5[Eat^iPudEVF[mGzhW4%G]#pay');
define('NONCE_KEY',        '5XYHF%(o/Xbg]Snwx>zn7EuZXMBe>aVlUt/DU Y*7|X&z,f+A4K<}P_(T<%[JyJ2');
define('AUTH_SALT',        'VRS~EC[#(cQRu4XO0Mqt)p6l&56|>Km/3n:BsDzP8bk;9HX0[q eb))rlz6C71|9');
define('SECURE_AUTH_SALT', 'Bg|ky;{J2qBPI^y/I_RZVowBL08=*M|RYJm/KB6Nl9ZVC:A+G` mEcC#L:MCY~3E');
define('LOGGED_IN_SALT',   'NX1.y]:*Ic+)]R@/KPsa}xqEu,D=G{R=GUm?GSm7@`Ft Pe!6&wmOiKF`ErD^FIp');
define('NONCE_SALT',       'PD@BUh1YZ,^/>1x|dsG2IqXtRcS-MQ{%3]+0jwYR@Ad:U]80|2L:0{bEg( ely45');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
