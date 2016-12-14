<?php
/*
   Plugin Name: Manager les tags
   Description: Gerer les mots clés avec peu d’articles.
   Author: David Degliame
   Author URI: http://degliame.net
   Version: 2016.07.01 
   Source from : Daniel Roch, SEOmix
*/

defined('ABSPATH') or die('Cheatin\' uh?'); 

if(realpath(dirname(__FILE__))!=realpath(WPMU_PLUGIN_DIR))
{
  wp_die('<p>This is not a <i>plugin</i> but a <i>mu-plugins</i>, please drop it in :<br/>'.'<b>'.realpath(WPMU_PLUGIN_DIR).'</b><br />Thanks.</p>' );
}


/**
* Supprimer de la fonction get_the_terms tout mot-clé ayant moins de 3 articles
* © Daniel Roch
*/
   function seomix_seo_the_tag_limit($terms) 
   {
      if ( !is_admin() )
      {
         foreach($terms as $k => $tag)
         {
            //s’il s’agit d’un tag
            if ( $tag->taxonomy == 'post_tag' )
            {
               //On élimine les tags de moins de 3 articles
               if ( $tag->count<3 ) unset($terms[$k]);
            }
         }
      }
      return $terms;
   }

   add_filter( "get_the_terms", 'seomix_seo_the_tag_limit', 10, 1 );
        

/**
* Supprimer de la fonction get_terms tout mot-clé ayant moins de 3 articles
* Notamment utile pour la génération du sitemap de WordPress SEO
* © Daniel Roch
*/
   function seomix_seo_tag_get_terms($terms)
   {
      if ( !is_admin() )
      {
         foreach( $terms as $k => $tag )
         {
            if( $tag->taxonomy == "post_tag" ) 
            {
               if( $tag->count<3 ) unset( $terms[$k] );
            }
         }
      }
      return $terms;
   }

   add_filter( 'get_terms', 'seomix_seo_tag_get_terms');


/**
* Rediriger automatiquement les mots-clés de moins de 3 articles vers l’accueil
* © Daniel Roch
*/
   function seomix_seo_tag_redirect () 
   {
      if ( is_tag () ) 
      {
         $term_id = get_query_var( 'tag_id' );
         $term = get_term_by ('id', $term_id, 'post_tag');
         $termcount = $term->count;
         $homeurl = home_url();
         
         if ($termcount < 3 ) 
         {
            wp_redirect( $homeurl , '301' );
            die;
         }
      }
   }

   add_action( 'template_redirect', 'seomix_seo_tag_redirect' );
