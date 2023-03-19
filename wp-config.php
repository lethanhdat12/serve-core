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
define( 'DB_NAME', 'admin_bds' );

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
define( 'AUTH_KEY',         'zR.W#{^iQJv% *]jt:-THiB:Z7lmO6ps }0i]/:n8G>8VNaq;;`tOt/]yGDT.yzP' );
define( 'SECURE_AUTH_KEY',  '[~Z@A<*gK73cgx7yJbVIcF;%>}#;~P^VzF>)zu3EHa69bXIx:9&0;XN^=^~%.gl|' );
define( 'LOGGED_IN_KEY',    '@5PqB_J}5@DU(C_}Ox6B%IC+D %J._5bGB%lg^WZR+taa0.LpJp!;L!|>p~dE]{}' );
define( 'NONCE_KEY',        'LN5`},p@IOln1>h@ i)`r|KN5Y5_iK1kyWP+n6WK>C-M|N^jgBKjBS#3V0Dwx6tF' );
define( 'AUTH_SALT',        'OCNv+bH5$dAGTW RCX#zoL^LNB)Nt$_3LK;Flvr /P 3qN^{2@,%$/Xf4rxoO;a]' );
define( 'SECURE_AUTH_SALT', 'v~<gjS@m(tjEbr!4=0r/JKQ]94bsN.t#fzOH!sSVp4QztTg ~B&G(:&8Ygg>TI|5' );
define( 'LOGGED_IN_SALT',   'X@: EEr6XXT}Pd$`!W<Ax!T7lR+QgQ|INKr:R#s}GRI(U.1ig!!sEXlhYrYADr5U' );
define( 'NONCE_SALT',       '6a;rmswWi-pr/)+Elwsx<o3teLrJGH3zl6)H$#:CfZl5*LrKKcG=@<dAShvzeJyv' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
