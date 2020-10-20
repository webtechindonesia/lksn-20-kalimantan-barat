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
define( 'DB_NAME', 'db-dump-e' );

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
define( 'AUTH_KEY',         'DaW.YVMd,h+-DOLAaI<d3@xS.#1-f=kgoB@hv._r<4[jq@@IMx_P%R6(tQGR0`cu' );
define( 'SECURE_AUTH_KEY',  '>xtt*Lx5XXiNBJ$=M0IlP6nl~*h5-~N=52z(zF}`b?G}{T`9A!`PZ5em_u/p-<;$' );
define( 'LOGGED_IN_KEY',    'Y+AHg>/a!G><Ok.lg25mzOp^[VM[qvP)f?`/fo>4[L+n_EI&i=AA?qo1YXEaJwl2' );
define( 'NONCE_KEY',        'Ljw0Hxz%gY0%fv9arNu~FqsQdlv{dCC-j9hg*6,Y1M<ja9iv @/VZ-KF_d =~eMH' );
define( 'AUTH_SALT',        ')+ZI_[^O}RIRPE}FEE0Q>X@tdR?g}09hQ]3<g9uM z=7vzkGJiFUP7YLevuLv Q,' );
define( 'SECURE_AUTH_SALT', ';ZeId_5?+rs/W&0AIbqI&D%fCxYaYQmSN1._e7*]u,=FcP[-$$~ZIV1[q?F2VDz&' );
define( 'LOGGED_IN_SALT',   'dAu,)8>~sSpFD&6ryrq#?kK2:*Ig3$Q]+,z|F$`UmO.|C<%>14^9@RE.iNU|%|Sc' );
define( 'NONCE_SALT',       '+L!ufej881wqHv[h7R~C]6:YFj`S-QT3@kA7=N:|k<a(?9e[V_<%X/}8q;*IcO8h' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
