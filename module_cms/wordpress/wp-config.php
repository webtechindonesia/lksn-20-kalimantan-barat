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
define( 'DB_NAME', 'db-dump-cms' );

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
define( 'AUTH_KEY',         'oc#MMJ2%=E_p3yVD@?MxMqj&%Yr/|x$~r*UQ>IiR-a-=}Lzn_* o6F|?OCZ<!F,U' );
define( 'SECURE_AUTH_KEY',  'tt}|s0-HI%A6N~Ua)m|kX?!wVq9<xa8LQ7~JV/V~D}:[:ljlE+r/HCnGb8x1VuPJ' );
define( 'LOGGED_IN_KEY',    '?[%+Gwh>iSz4R)z6a=O9YZ[vE=`Z^G%UWLM~P^rE~Jpxi]fKdJ!T)U2}l/pd8!Kr' );
define( 'NONCE_KEY',        'a|rT8s/.8wj>vrNR?RNNS_JM+mfjM>4-m|_(i1XTqCnt>q8ua:n4fj{| A GeMIp' );
define( 'AUTH_SALT',        '!HFuVj$vfVazd$cuCq8;ANjGPgSD39;tF&Gnt>!6<k.vDQ2OFdGq9zq<3l:?kXlc' );
define( 'SECURE_AUTH_SALT', 'Id)53zg[0e2TbH-k}gAxi.-7HWuE#u1sSzr}|*P>3#>%<o&5;+_H9`y?O9h{#;T[' );
define( 'LOGGED_IN_SALT',   'kBvWe62WK:c1<}`{5.xUUHSUH#]PB^?W.q(kO>JGk,]>#>:^s68-jguDy9=(Vh.n' );
define( 'NONCE_SALT',       '2=qNqo9[s~dc;zY>sTn+MU3p<?T<LAE/ub&QUAjfw$Em/$4rNafZE/,k%=FTo%/q' );

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
