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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin_wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin_wp' );

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
define( 'AUTH_KEY',         'u;6q<V`EGT` h{&kmW+I)9EH7beX]mmY/_U+f9n%qvI?{LL`[cp%y*FWaP;jf@@Q' );
define( 'SECURE_AUTH_KEY',  'QJiMwKh}EXZN{61q`Gv:}oh-^Z+zzaxue?dB+E(0DX+R_5~#ZR0I(uO+*?UG3Ph<' );
define( 'LOGGED_IN_KEY',    ',&2O{`9 <2]IInzM|WhIL8I2=88QW$50ucfnJKA_f%#^d@ER<_Mrj-Z~;xmvXF4&' );
define( 'NONCE_KEY',        'ym2Ew~PO,a0h!0S%j YD?_Gs1zky/;>|sbAT0FrO|GjDsEo[F^n4M^*w&}?sG2B`' );
define( 'AUTH_SALT',        '(7(Fq]+F5Z@{.IMqKbEtvF#}zeUX7%:]&#V6GTj!@Bh{3(p*X>Y9Qp51OmEnQc;E' );
define( 'SECURE_AUTH_SALT', '(&oXEq]A3e>B..T,m/?IZmis,@1UVAq!AUH)HIW&tr&vW>Ywv3# @Hn5+#NDqKn*' );
define( 'LOGGED_IN_SALT',   'C yI/swcH[D:t<*g[5Zwa$Rm%W)j=bSec%[JV`|OD;%XBw<Zn;$<l]GZ+6T<(Yad' );
define( 'NONCE_SALT',       'Ek,XB!R]U}*KCP6l|`R{m|wz18+WJOn(jzdtb2]M_~|*y<R$Q <{OP6EB(j4)Q-w' );

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
