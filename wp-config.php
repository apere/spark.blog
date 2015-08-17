<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Remove this line when going live */
define('WP_ENV', 'development');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0SneLsr:eyMD:0E9/~v+3|Ilb0g_TmZh(g%QrR[fBYE=?2+6vFAY-zn[&s|Aw#jz');
define('SECURE_AUTH_KEY',  '8f8xzLz_LVNBM3q6={BT}.|uICWHKfjqCSb@XRz7:8U,14b{K+I6_PBE[4k4&((#');
define('LOGGED_IN_KEY',    '+Oz=v90-!0Q-:[FrzhQa(U0w?GqHtU+3ZZd QS[oVj|9oWaG+MqvF8^@Ph[)g+tT');
define('NONCE_KEY',        '-:UHbb<-B()wZmcJ/bOh=J<d;zAbHZ63@/9k5$TKFkvh|EO;JLW=9i7j|LR[|w>5');
define('AUTH_SALT',        '>Pzy%,?,g?8a~`cQ`EoF[3&Q]D^cM**F5.TW1>T/SCnd+;j:x6^AH5WXX+.U%3md');
define('SECURE_AUTH_SALT', 'UDX+r<a jJolf?V|>^d!.+;yNQ0>^bR]3QBnL|_r:OlTpRaX~qOvq-*SF1b-6H({');
define('LOGGED_IN_SALT',   '_C7|HT`8XjStWC?}ccpFG^G^1-3RYp*11P3^GA.~b*jN2V*}uI=UJP@}I@QJaaOO');
define('NONCE_SALT',       'Zbf3Dkw HFn6n12eNk>~~Qqz9]>gvT%d25X+SY)X[.K_NC~O>:y7qDb[+C4dx<x%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
