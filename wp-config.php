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
define( 'DB_NAME', 'roop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'IUT& *i7Uip@|w4zCp-$LveA]zb_s!@iBwkq:mO1BZ#cA^vh? 7<Fw:!{x,%5{QJ' );
define( 'SECURE_AUTH_KEY',  'xEPc#/dz_@Ai#1T!3Og^W11vn#U=grzp^`L%BpUS|r1&jG][0]-C?MrZUm/MfP&C' );
define( 'LOGGED_IN_KEY',    '~pNF;/F#p*+Bq <rT`}_n(++CZs|U_t;88hHzP1-JT`8XIK|}5w_@;Z(Vc$CQ)QA' );
define( 'NONCE_KEY',        'JFL/dht{xXWR<xB@7LEi6-0iQu0$(6]PA+<t-@smfno=o/z8d.Nx56%`dpbyd@y+' );
define( 'AUTH_SALT',        'T Wj,WO{a`WDa]={`%ZW@>zI@Wku`NP08H2ruuY=X>Ar[Kz%oi_5vb-b_K+#sF+C' );
define( 'SECURE_AUTH_SALT', '|5D1sG1?3WkX|v^;aA,o{lqA8K0Op*FA20{;zD/jP83LDqK<V}26A_Nh@0w_t7Bj' );
define( 'LOGGED_IN_SALT',   'Bd]kBg[eYFC`it8bAH-Cd,Rt9V~eAZ=iB,RWIKq-&CR(`.S?q0TFWP]P052QsZ)!' );
define( 'NONCE_SALT',       'da-(;_0&55if~VFdv;Imx:4z_Y #c3k^)tjnZ#Jp+[vF#g(n1 H:gkn{u1^EO|#N' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
