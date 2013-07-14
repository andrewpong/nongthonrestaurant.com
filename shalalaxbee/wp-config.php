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
define('DB_NAME', 'pvobee_shalala');

/** MySQL database username */
define('DB_USER', 'pvobee_shalala');

/** MySQL database password */
define('DB_PASSWORD', 'pv294303');

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
define('AUTH_KEY',         'whd3^m)|PDBn?@ezX`Ws5:0n17z.8u=ok@#rQN+@+H:MN<8Ic<(d2#0RZJB,_GVZ');
define('SECURE_AUTH_KEY',  '%[o|O_|;.|YrF4%<eIx-2F .TYgW32[#_g,CEI>j@*Iy1P)CuI.K%D+L39DgtqW6');
define('LOGGED_IN_KEY',    'JjJ|_&0(8m5^F>rgn+2YF^J$A-{+@|0H1O!g8=?}- J=(YaEX7MGqmg:)9+#!MFw');
define('NONCE_KEY',        'gh-[;$MX!-`8EV6W69cr *l frKd2WM86P=.{aMNW|-AmV?]==~TsFa2}aDq|PD+');
define('AUTH_SALT',        '59dsnWO*1c|cT}]n2(ztz1Rno9S=A-7Ny|?!QI$R^19;3!yjb1^-6p{vms_<v>7q');
define('SECURE_AUTH_SALT', '?bWB&W-MfP;a|L+GcL8J):Hk}Dt|iN^p4ohP~/*XSY^*]1k^w.zBl7|=, y$g1^]');
define('LOGGED_IN_SALT',   'Iu#C11jswqo,Ds/?`jk|$l8Tik]CfdCVomK <90@fO:mup9~@a)(0N_N1^Tw<`R0');
define('NONCE_SALT',       '{Iu0cRe7_XWV`?;^rVR3DRE+`Ro$+Ma5uI%bD>zhR6`=fe[[XOwHnuRaJlez06H@');

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
