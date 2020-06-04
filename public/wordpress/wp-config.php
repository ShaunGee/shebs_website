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
define( 'DB_NAME', 'scotchbox' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'w_>L@if)vJl#wMOrFuG(a,U^$sW8L@I4L7>j&4j}N^3^5F-)6.Am1)L18+Rxz0}o' );
define( 'SECURE_AUTH_KEY',  '$^0d>top`qvfhRa~WqV4a# Kk8{kv3:L=@_{6B|q,}F4,AlWpU27r+TO-`>cs Sq' );
define( 'LOGGED_IN_KEY',    'A#Un}5!r8blPC#OI:G8bJc6B>g.a5@>]MEbTE(K)nwr1Ee/=D8Bjavj{h+(`uwo3' );
define( 'NONCE_KEY',        '~9[Pp<k3CJkZ{^3Y,lOMX6:dl_PW~K%g^$2altK[+!h9>%e1TP2OvC[ x3N q ~t' );
define( 'AUTH_SALT',        ': ~%[XX`m#wA*U@DaNV}Onk )>i0;G%*#Rw`7t2.I[(qvh&J2>qvM9(Kk =BZE6l' );
define( 'SECURE_AUTH_SALT', 'jn }*=Jn25vU2#]!,uaX{ViucL!,-[T/9vdO]M1pCg;rUsHE?22eV?!J4~9iU-mD' );
define( 'LOGGED_IN_SALT',   '_?eHilc[<0g64zzp#`WO(YExQN^|FN[1u<y6^[ak8/%D?O_;*2RRsI+yEa)bIP1`' );
define( 'NONCE_SALT',       '[fh4#PDw#eHbIklq6,(<#R^-; 6W[Zv?!i}!Z~j?5da!N;SlTVS4,)FQHTuc@xWY' );

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
