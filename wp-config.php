<?php
  define('DB_NAME', 'drizzlyowl');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_HOST', 'localhost');
  define('DB_CHARSET', 'utf8');
  define('DB_COLLATE', '');
  define('WPLANG', '');

	$table_prefix  = 'wp_';

	define('AUTH_KEY',         ';{k{kjL]JReo5vF~I4&J/u]%?AQD`YZaw{k$Rj],@h}*ySYc,bNjqCuN$MN|XGLL');
  define('SECURE_AUTH_KEY',  'KfHVd1*)c.a4~qVTZ-Xk KVf[I;;z|ExXU=p0hU+1C:q~7vf0ytR*n+o:|?3S>|=');
  define('LOGGED_IN_KEY',    'D+, &u[)w+pq?oDCE Lx-j-2;5)GG|J_Lol8d!kz:i}1SvWa0#3/v|K,ez#]bz.~');
  define('NONCE_KEY',        'SZB8{`@-jG=TzzV|=b?!h|-*toT2u,c2s^Yvi@<j_rB*-_<}ja)eTQD9<KN<VBx+');
  define('AUTH_SALT',        'oB`SV-Z1QD5Xn=rZ$pAzN+VDsIGZ&3yY,1N+C{xQF&P< ?O[T8~N@<jnbYO]iYY|');
  define('SECURE_AUTH_SALT', '%QN^y+CL;FKXu#r!{)uUL{-=gRH|j>,1+<4Apj#R+6c&us?dMHlB^A_@oVY:RGi0');
  define('LOGGED_IN_SALT',   '+41Ck&!y_D}tF-GLr.YJpG7k,6A!$Y}Uq.%iTCc9/YDMh?Q#BJcK8T#QegV|W&i`');
  define('NONCE_SALT',       'x4[[zoaW;]j|BrR+x5/aIw-M;&qOY[0&LbFwf/v+t,-QoSebw+6q4+K/YlKXMOW!');


	define('WP_HOME','http://localhost');
	define('WP_SITEURL','http://localhost/wordpress');

	define('WP_CONTENT_URL', 'http://localhost/content');

  /*
  Depending on your server configuration, you may find WordPress fails to find your content (themes and plugins).
  This is due to how your server returns `$_SERVER['DOCUMENT_ROOT']`. If this issue affects you, try swapping
  for the `dirname(__FILE__)` method below.
  */

  define('WP_CONTENT_DIR', realpath($_SERVER['DOCUMENT_ROOT'] . '/content'));

	if ( !defined('ABSPATH') ){
	 define('ABSPATH', dirname(__FILE__) . '/');
  }

	require_once(ABSPATH . 'wp-settings.php');
