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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ditto_housewares' );

/** MySQL database username */
define( 'DB_USER', 'dh_user' );

/** MySQL database password */
define( 'DB_PASSWORD', '!uv56n1Q1' );

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
define( 'AUTH_KEY',         '[!n6/3!!6]`u$2Mf@zoS7}A)^q6}gp8uqCB9@TjZX6jk5}[c{A+&QJQZ>az<PU?^' );
define( 'SECURE_AUTH_KEY',  'Ts^d>3?/Z2ob:Qi_vf=,jWaKZ/l4L)faRx^qDkvW[h`+:0kV 2I1zV5mn1[/L9Dl' );
define( 'LOGGED_IN_KEY',    'qn(A4C9ir1gZK]QuJ2FD0%ozVS5e8[g)[m^C3t4H9vr/VYE+4l~Eu|Y4`{(])kEa' );
define( 'NONCE_KEY',        '3OxHg|yY!tAkb(a-pmY^iiA|+|F:d=}((CJ^qG>!7/lk]m}bja$@Xe*8Re9czQcO' );
define( 'AUTH_SALT',        'V%!ad0$.4(F}-o8VD7-J;>wyGuc$X(D^*>Rk,y7i/x0Jq5=~Q46FTd2hP@`HI-;*' );
define( 'SECURE_AUTH_SALT', '-XEbWb!XXZ{cKznQs{`-+tkk8HhsVf66Szp``jgn%2lZ(N.VtrkOEiq{KBfD(6p-' );
define( 'LOGGED_IN_SALT',   'ACwX31?wNL`CXKwN#[ /_#^l huC]7k2Gbu)6WI!*=*{gmr[A!wiM|O^rQ8h!uX-' );
define( 'NONCE_SALT',       '@?W,tEi1u[h%87FWQ7FlQQX{}M78kJmJrW1v<r5D5aeSYeaKn)c=_&/S2K*}GH`q' );
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dh_';

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
define( 'WP_DEBUG', true );

define( 'FS_METHOD', 'direct' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
