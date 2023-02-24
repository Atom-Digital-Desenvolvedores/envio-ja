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
define( 'DB_NAME', 'envio-ja' );

/** Database username */
define( 'DB_USER', 'Admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin123' );

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
define( 'AUTH_KEY',         'nt$o`u$gca&U[$o3W;dJC7>wx&Qk!d COKYBWWdb&H,7ryy_0uc!^)vH)b]X(xx}' );
define( 'SECURE_AUTH_KEY',  ')D~ohOf$_LL44vabNryD19@g]7qeWX^eK:nw!+xH(R/<cb*;RDhbge0hiu).#?@s' );
define( 'LOGGED_IN_KEY',    'QKY%IUkXFJ2KEJ `DDJ-#s.wdT>*U=SHD}LR>>,+Sby]Z!V^lYEl5,1+hu)`)x.`' );
define( 'NONCE_KEY',        '[q+$J#,VnmfQxptAVjp2m-=l1{Uh-rty_T}%Nl8-B$;?r3xb8H=u. aw|J-<`:HX' );
define( 'AUTH_SALT',        'y</8k(^}vjim|i0-V$JRHIZ;o7/4rMNo;U]9FC8.lvT$(c)<eBVj}U33Az81_zO ' );
define( 'SECURE_AUTH_SALT', 'c5a>b8z8SQCkVVL^a?x@7!ca_yilh_7+bPU kz[)Je-DW,(#aDJt$/mDc({O]emz' );
define( 'LOGGED_IN_SALT',   '$#C|]2AJis!]>dkm*O<svUlz>yUwI12:XE3|xqy( oY0=Jbm_@k!v:m0FlJkM:3$' );
define( 'NONCE_SALT',       'e-yI2V1Ng&~b<{ cL@AVOuAo{95OQ6s[%]kP&mUi)G<aAr`2^^1w~8V!z6RTt||:' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ej_';

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
