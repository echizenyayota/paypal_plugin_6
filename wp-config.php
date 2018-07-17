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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']}l# maC]15}OrvyR7U!wGZ4l/MAkgRKFC5q$],*#fF*u/GoVXTmO3$a[Qplh^g@' );
define( 'SECURE_AUTH_KEY',  '23N+_k)H{PO`w1gC!DBt8l]*p,jtqSdSm0B3WAs.>qS17g(V@/M5M3K7L-[yXMHQ' );
define( 'LOGGED_IN_KEY',    'NhPfeaba@_BmiR!PJruUY[fyj#8Lh+}tp=!r+vO+9M{~ J:-i%,QE(3ZNGE#~6J(' );
define( 'NONCE_KEY',        'g?Aq..eB:H}2;oMY3d}iFrg ]{M_o{1F:]^~Xz=&aB3QPL8L&{0{1J70O6m*Y,Pb' );
define( 'AUTH_SALT',        'o>ripX?m4ev$nR^II8~7L+n/-q,T@LGp~xHuN?n%M|{zniB:`3[w+a]jXzm=3Z^E' );
define( 'SECURE_AUTH_SALT', 'HnIXdV#b;Poag91T3(Y,:KT1u0?D~{/y+1#vAf3w{r6/}nDK;~++96z6YiTsiYi#' );
define( 'LOGGED_IN_SALT',   '<ymUUqbYs^q6F&ul~,6.H03IYyPJZpmAeZ)hQ3UL:Za_8x!$MswY<,K]sPI|&zWp' );
define( 'NONCE_SALT',       'jXr >XDxPFMhhx#JOD0kYRTO|3W{=?zA@m-mxT&DI&s&[Msq>hi&?WZW?oUS<oqC' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
