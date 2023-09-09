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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testword' );

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
define( 'AUTH_KEY',         'dK`;]fVDwfMhw~VVH ,kR[DsK=;yPr35U149E(w_T#LYpc&2f=]yu)Saw>5$vtsi' );
define( 'SECURE_AUTH_KEY',  'H$J%@:O5!]XMNv3XCLPp0[1(NL.z?{i5hN/ng 9]b=h|;RL;QS myPZ5WP?V[[UB' );
define( 'LOGGED_IN_KEY',    'g?EEu(ey@T:*7^S1RdLW[a03CU(.U;T|m=y0O@p-?oE5jxm. Yye= U;<GeSe6ze' );
define( 'NONCE_KEY',        ',C&-]8$Dj_b k(7)8@E4zrg}d`1N0U:@?[! M<M=B!$?*-V_a:o70Uzwufk>pO@1' );
define( 'AUTH_SALT',        'k=i,]!>!ND~8=^P<8[(/<a#&j_!_Z}I2l)(LpIO9LB4@#L:*boKe<^O0LZQVcVn#' );
define( 'SECURE_AUTH_SALT', 'BO$9;D=mKKRlBZ9c^FW30Jm8)TSnSO_.X[yf.{lARAD<XTh=j^%V^:aHG{dvnDc&' );
define( 'LOGGED_IN_SALT',   '}GtG#NAYv[HwCjHqu!O>ie+D&gE;vvZKIkF#ei9$~-H;G(A+7UataCE/r0z5Z9(d' );
define( 'NONCE_SALT',       'm3}h468_?A?=,TZD|3|dguteZk.b,gL?G&}sutoDQs2RO<Q_4>4nsw`cvvS;)lPp' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
