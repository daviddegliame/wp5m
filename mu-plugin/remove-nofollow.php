<?php /*
Plugin Name: Remove NoFollow
Description: on enleve le nofollow dans les commentaires.
Author: David Degliame
Author URI: http://degliame.net
Version: 2016.03.17 

*/

defined('ABSPATH') or die('Cheatin\' uh?'); 

strtolower(basename(__FILE__))!='index.php' && strtolower(basename(__FILE__))!='alicia.php' 
or wp_die('<p>You have to rename this file before continuing because its name is not secure:</p>'.'<p>'.trailingslashit(dirname(__FILE__)).'<b>'.basename(__FILE__).'</b></p>'.'<p>Try this one: <input value="'.uniqid('baw-keys-').'.php" size="30"/><p>');
if(realpath(dirname(__FILE__))!=realpath(WPMU_PLUGIN_DIR))
{
  wp_die('<p>This is not a <i>plugin</i> but a <i>mu-plugins</i>, please drop it in :<br/>'.'<b>'.realpath(WPMU_PLUGIN_DIR).'</b><br />Thanks.</p>' );
}

/**
Enlever le nofollow du site
**/

// Etape 1, on enleve le nofollow codé en dur dans les commentaires
	function dd_remove_nofollow1($text)
	{
		return str_replace('" rel="nofollow">', '">', $text);
	}
	add_filter('comment_text', 'dd_remove_nofollow1');

// Etape 2, on desactive l'ajout en dur du nofollow lors de l'enregistrement des comm'
	remove_filter('pre_comment_content', 'wp_rel_nofollow', 15);

// Etape 3, on enleve l'attribut nofollow de la fonction qui ajoute le nom & url de l'auteur
	function dd_remove_nofollow2($text)
	{
		return str_replace(' nofollow', '', $text);
	}
	add_filter('get_comment_author_link', 'dd_remove_nofollow2');