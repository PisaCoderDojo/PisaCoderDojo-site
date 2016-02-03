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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'user');

/** MySQL database password */
define('DB_PASSWORD', 'pass');

/** MySQL hostname */
define('DB_HOST', 'db');

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
define('AUTH_KEY',         'v!YGcr_[-f<.9+k`7-s-rli9zR<f-|$I4z?-I|i`eJh<U}x?/X[pGG3_icXA]|^j');
define('SECURE_AUTH_KEY',  'k}Xn`G0h(i]MsP8WO9]~kD5P($s1U*o%JfGHO*iP:z>9kl~vW3xt|SD5)42tY93Q');
define('LOGGED_IN_KEY',    '9+ieFQBP+C+Z.{%Xj0*[(uq`8c1J#aOZtAn<{_IBCLYy*,QMsn+:jWH4WEf*0UK`');
define('NONCE_KEY',        'i`U!%16-B.kNz|X/32YLh9-s#:&oD|2{6C3hKEPlGk*tA1,a=W4R/6?N1P%|c?$^');
define('AUTH_SALT',        '@?;%aKK$+ANMT~%3E0v*Z_%Xv,oD?++pA7I{b|sTw!6ZT8#[A|.[3?oE:f7YIv+q');
define('SECURE_AUTH_SALT', '^4{Ln8bs0{svY[4(9+H,pF-._$y9Ts+(+=T6&fH7-T,InU@Y eS-%Is?~+;hI!hI');
define('LOGGED_IN_SALT',   'hO.^k?|7UFM_G?1g~w`qV/Mq17t%=_T;|PFF-- *dK]??_c+%d51qsbR)IHV$~MI');
define('NONCE_SALT',       'F`|7O3bR{n^?Z]R{#+eH|KplUf.jLhgOY)bjm7;0a+A~4[3>`9=kh~9ZD,8*,TF=');

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
