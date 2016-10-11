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
define('DB_NAME', 'dietsaubo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1');

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
define('AUTH_KEY',         'R~}ObXn[.{3^yS#mZ;b-n4.<yLC+)Rj(j$xm/3:/k?.f=ICk?A)ZN`xx.t?r5!W{');
define('SECURE_AUTH_KEY',  ':m:*J,lTA/&  &u5]/#gumLc,^Z$7S? *b<lUE<ai|m!ZjhBid^;ZszD`V_r2GFl');
define('LOGGED_IN_KEY',    'd2-o)#M*#6n^0|>W5<LCUOyoch=wuW.57G|6,cS}k&^;ak:m!R0=J?]@F[aZUA@Y');
define('NONCE_KEY',        ')Na7]vYA4$[R09J*qNf?cp0+f9# +~B_:^L(a?*^*ygV0ofW1UJ4aHBj7]nw`T8;');
define('AUTH_SALT',        'hr5RGED{n%4@[ 4rGL^<.C6k+mF?u=/feNNJm&M{LG`[KNz5o(Y@(^at4cbUCdl2');
define('SECURE_AUTH_SALT', '7zClb=B.L@~+lN]Iapw_1YpsOH.eA1k^K/7 lY~4JIFHN.U+HeJu1~2P_aAl_E]$');
define('LOGGED_IN_SALT',   '@Vy`5E2N%=Mmt$]^PYd*e1h}IdVUA6^`Y.W=+t5b{),1Qhz2As>DGd~JPx,{0877');
define('NONCE_SALT',       'BRTZW[th`:9w7g#H>`]ER>00)Peq{t:=w*LTv6j1o~HhKVQ|ScrX]SR.,.BS2&-}');

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
