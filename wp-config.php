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
define( 'DB_NAME', 'etcetera_wp' );

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
define( 'AUTH_KEY',         'EfA}Ez=SB@];a)[]YN3YNd}N+hRk$GgDxt6J3v^##,dr~2;^/u3-IN)dQzG[KhU-' );
define( 'SECURE_AUTH_KEY',  '4&ZLLMO-r0uEUPW,0Zyv(5rQ|7uFexTYO4ix!!_bjRCj(^jFIuAOr BcFZTdSWJ&' );
define( 'LOGGED_IN_KEY',    '4:d]@|zyJVC<F$(11^;lt??bu)VkF/4v>]D8fTWVS@{1M:%#V/bI6oOcQp9GVg+@' );
define( 'NONCE_KEY',        '*Gq) BH^N.Hdeta4K7O[U9b0p&?3F8So_YD_L-tjEJ2}!-vsHiGxRQsO4,jp)*SF' );
define( 'AUTH_SALT',        'HJ]A&+oUs2,v=PxEx}>{p;,7k]q_LB?c2NoBmxSyTmG#OPw5Dyn_d:<!r2Gi3Z5.' );
define( 'SECURE_AUTH_SALT', '?TYDa|PaHG[TB[_go8l*zF64?Ka;jtS**(q |,Ms:qTS|Iq<BVv.j;vX92$w[mv3' );
define( 'LOGGED_IN_SALT',   'bbT+mQEsp73i=/ZbJA=86Qtwl~aRIbkQsPnO6#Af{9wb4L%s`LWHN@r@:[m>=*&P' );
define( 'NONCE_SALT',       '{EVVKUg.;*CD O.&Fi^L`q|%`skI1B]<RdoOAy#$Gy^qmNd($zH6ym2VW^S;q<i~' );

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
