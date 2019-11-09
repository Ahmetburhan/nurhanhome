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
define( 'DB_NAME', 'test' );

/** MySQL database username */
define( 'DB_USER', 'test' );

/** MySQL database password */
define( 'DB_PASSWORD', 'eU6AC3pt1pByMyBk' );

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
define( 'AUTH_KEY',         'QUdjxF;U% 3RbObz[eEfd825Ytlzyka.85/rvy+k1(,L-^:XG*>>`g%:^_{|KGoR' );
define( 'SECURE_AUTH_KEY',  'oVoV ~Hr/f12k{1;m()9%u{2NCG;2/6;hL@zEp=z#R2<XnE)5* PxG0v5EM.Id1S' );
define( 'LOGGED_IN_KEY',    '2<t1Q_0r-Li/O[;AJe&a(a=K{{M/Pr^jjdg)BeLLv9EMS>DYP^f287 &riZ4`mb>' );
define( 'NONCE_KEY',        ' r|`vm{0g1<g6JaA&tmsFUOUh#kpO@]r/T!_T)^;GkYaOic9f#%J2/G!w.K6 UD{' );
define( 'AUTH_SALT',        '1ufU6DJ(jszR2pW$43f;0[H; -[5YA>xI1Am.?)J`2(GHS2R}jn$61Y^P70N5nzo' );
define( 'SECURE_AUTH_SALT', 'lm{3[<3*s:x^PbZtlkwJk,qtiV&CX*<PW1i  9=iF<KPwggLKBK=h`A=I_97gITO' );
define( 'LOGGED_IN_SALT',   'Ij5vS7X =Beq|}F@_y$_#RXi4|,hPYz=+fML.;:P~/lKy-5OsUFK1=u4X#:hKt0u' );
define( 'NONCE_SALT',       'u9~&d?XCQvp~Ic!apbAAPsw<@cGc!d vpu%|0-zEC!D,w<:GM]YQ<#S3b*&}!]9v' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
