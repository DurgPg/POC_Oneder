<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'wp-demo2' );

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
define( 'AUTH_KEY',         'cGISsZ&B.auVdMalur:6PHx~H{]7<GRDB&kDzh>Ra^7y12z44+w eK>07X4jOvqk' );
define( 'SECURE_AUTH_KEY',  '+8ijb,iu1dlED7/x[ZdXAP_p]R?pn+s4mS@x<_Z55TPa84#:[tLsQ2eUNpJ$8qx3' );
define( 'LOGGED_IN_KEY',    'K7o/2/<YB8ep@f&[J:;(]{H #J)d363/Hxuc_){x5IMSyvmmUm!;|,)/[zI={x(*' );
define( 'NONCE_KEY',        'Hefw<}Z9o>@PG~[0H7*ViiIy-iLno9.3Fk(}9T?w{(fn!-M:T>K]T!!/.FS$~eA*' );
define( 'AUTH_SALT',        '2f65[K.K{PD:kE5.r@<fXk~}|rv=Is/hyTgUs7(<S:=H%fbT^e7.<dZfl.L%P.FG' );
define( 'SECURE_AUTH_SALT', 'Wm0(!j*uZK&!G|)5lJ?m|&*x/m~9fwb.rB{kc3l?A< [ftQB5AZ4fSg8d6.V$>`0' );
define( 'LOGGED_IN_SALT',   'mSqA/I|$7<EYNFxwSoKdj/`8#M5kaSojY1pJQb&SkBOY/XgLN7:lWTLj]1h9oiZh' );
define( 'NONCE_SALT',       'g#>E%,uROM6zmI3$tnk3PS?v4GZ|0lBiRK.!X_jbVMMrsD7alb?+,0J;g%9.1:b+' );

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
