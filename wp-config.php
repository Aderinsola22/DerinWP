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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'derin' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '9*[dGrvjogUU2tG~q7<r^vFD)u{2KFRs-[),CLlw 6gjArgAG`y1(C)kEAUG5|ZX' );
define( 'SECURE_AUTH_KEY',  'd(kIewkaRyMc41e#g!#<R`Prm;AO&,8ph{0/iqNS([` *$`mJY~vw-jaQ; &mz>*' );
define( 'LOGGED_IN_KEY',    'j;gK&a)vI;zz+U@([#8+NG%A:g_dj$)fNcAX^1P,K8Kd:W-0njoC1UdS^cQ^Zv1E' );
define( 'NONCE_KEY',        'kQ#&8J[}]nBTgV{%Ro_q V#ltj*k>#[rl-&q*]}*BzBYZzP|ZRF%/m?5lRW+(B*y' );
define( 'AUTH_SALT',        'e#iv6ij#E0:SZo)h[V<BUvUBUTVb3(:&p;`UT$9p6%)8T$[##exgiapCOAg.)m9=' );
define( 'SECURE_AUTH_SALT', 'o=w>gVNu$lBv+&AK2Nu^/a&4EjAq?o&(SQp6HA4v:C[tL2f`i|~o=VmFIqRt.t+`' );
define( 'LOGGED_IN_SALT',   '2?O/lpt}C<rw~]cBV /=LHcf=K0dAjU{#aN*VW5i/|b1)h$D[Nv<NtdKgTb#Bp3 ' );
define( 'NONCE_SALT',       'yoKWh41OIS/?gaOk,h7U|d5aF`o8TTg%AQ%e#yf1UfHR>k~wcq7zXlHvs$r}gUh;' );

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
