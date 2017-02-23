<?php

define( 'DISALLOW_FILE_EDIT' , true ); 	// Disable File Editor - Security
define( 'WP_MEMORY_LIMIT'     , '128M' );
define( 'WP_MAX_MEMORY_LIMIT' , '512M' ); // admin area

// ** somes word that will define somes wp path
define( 'WP5M_WPSITE'          , 'http://' . $_SERVER['SERVER_NAME'] . '/' );
define( 'WP5M_WPCONTENT'       , 'wp-content' );
define( 'WP5M_WPTHEME'         , 'themes' );
define( 'WP5M_WPPLUGIN'        , 'plugins' );
define( 'WP5M_WPMUPLUGIN'      , 'mu-plugins' );
define( 'WP5M_WPMEDIAS'        , 'medias' );

// ** conf wp with word defined just before …
define( 'WP_HOME'          , WP5M_WPSITE );
define( 'WP_SITEURL'       , WP5M_WPSITE );
define( 'WP_CONTENT_URL'   , WP_SITEURL.WP5M_WPCONTENT );
define( 'WP_CONTENT_DIR'   , ABSPATH.WP5M_WPCONTENT.'/' );
define( 'WP_PLUGIN_DIR'    , WP_CONTENT_DIR.WP5M_WPPLUGIN );
define( 'WP_PLUGIN_URL'    , WP_CONTENT_URL.'/'.WP5M_WPPLUGIN );
define( 'WPMU_PLUGIN_DIR'  , WP_CONTENT_DIR.WP5M_WPMUPLUGIN );
define( 'WPMU_PLUGIN_URL'  , WP_CONTENT_URL.'/'.WP5M_WPMUPLUGIN );
define( 'UPLOADS', WP5M_WPMEDIAS );
