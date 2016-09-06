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
define('DB_NAME', 'argento');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'ocmnce1995');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ZNOi?#QBxe@pAT6Jm=X3T%0R%!Ql<TJ ?}Y{sxhAY]YJdXIceZ]97_9>o~2m|AyX');
define('SECURE_AUTH_KEY',  '~V7F/hDP4u)3^R4svN]=d axZY*OrW>S cPOlO$-WlIB&6F{sk08&z#sk&[ixUtF');
define('LOGGED_IN_KEY',    'L1A=w#?&9+/23u6OPv>%zDW2K~h;Xgxiu3#`Owrh9x0no,hwj+Y9F6,@fD,L_xfI');
define('NONCE_KEY',        '`,6)Yy}^YA`YH{X6_z.fc*MdA B4840zZV&.N<Huh 4x9}@s]+bIa{K6d0WfLo`u');
define('AUTH_SALT',        '$~]bU~mz ua%%T[[G.cX=*r4xO=z^[=S.If/Q=7<&u9ypGtoI$0<JdEcHneWK+L,');
define('SECURE_AUTH_SALT', 'voLP,ae`1<nX2I#dpfBOR5KNq(<)W-f6YNPq0e:tvPW}u1*MbL@) nUC;Q~^Sf_o');
define('LOGGED_IN_SALT',   '6/jTx}!irPM!}KjTCFY{aF&<!Cb@M!L0+D>+?p8*M_,IPXB_hVI:gxiN$9j9$56,');
define('NONCE_SALT',       'K6.vu[??5hH=fu802;7kMrt8C?#^~uqEwd0q=,C!HUa+!p!D#KCyf~?&#!VNG7vX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
