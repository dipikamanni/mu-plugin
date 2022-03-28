<?php
error_reporting(0);
add_filter( 'option_active_plugins', 'lg_disable_plugin' );

 function lg_disable_plugin($plugins){ 	
 	if(!is_admin()){
 		$get_ids = get_option('post_ids_plugin_off_on');
    	$plugin_list_loop = $get_ids['plugin_list'];    
	    foreach($plugin_list_loop as $plugin_list){      
	      	$slug_to_compare = $plugin_list['slug'];
	      	$post_id_custom  = $plugin_list['post_id'];
	      	// home page 
	      	if( $_SERVER['REQUEST_URI'] == '/'){
		        $listPluginRender = get_post_meta($post_id_custom,'active_plugin_list',true);
		        $listPluginList = $listPluginRender;		        
		        $x=0; 
		        foreach ($listPluginList as $plugin){
		          $x++;
		          $handle_plugin = $x.'_plugin';        
		          $value = get_post_meta($post_id_custom, $handle_plugin.'_key',true);	        
		          if($value == 'false' || $value == ''){
		          
		          }else{
		            if( !in_array( $plugin, $plugins ) ){
		              $plugins[] = $plugin;
		            }           
		          }
		        }       
		        $plugins_post_home = $plugins;
		        return $plugins_post_home; 
	      	}
	     	// other pages
	      	if( $_SERVER['REQUEST_URI'] == '/'.$slug_to_compare.'/'){
		        $listPluginRender = get_post_meta($post_id_custom,'active_plugin_list',true);
		        $listPluginList = $listPluginRender;
		        $x=0; 
		        foreach ($listPluginList as $plugin){
		          $x++;
		          $handle_plugin = $x.'_plugin';        
		          $value = get_post_meta($post_id_custom, $handle_plugin.'_key',true);
		          if($value == 'false' || $value == ''){
		          
		          }else{
		            if( !in_array( $plugin, $plugins ) ){
		              $plugins[] = $plugin;
		            }           
		          }
		        }        
		        $plugins_post_home = $plugins;
		        return $plugins_post_home; 
	      	}
	      	// Blog Pages..
	      	if( $_SERVER['REQUEST_URI'] == '/blog/'.$slug_to_compare.'/'){
		        $listPluginRender = get_post_meta($post_id_custom,'active_plugin_list',true);
		        $listPluginList = $listPluginRender;
		        $x=0; 
		        foreach ($listPluginList as $plugin){
		          $x++;
		          $handle_plugin = $x.'_plugin';        
		          $value = get_post_meta($post_id_custom, $handle_plugin.'_key',true);
		          if($value == 'false' || $value == ''){
		          
		          }else{
		            if( !in_array( $plugin, $plugins ) ){
		              $plugins[] = $plugin;
		            }           
		          }
		        }        
		        $plugins_post_home = $plugins;
		        return $plugins_post_home; 
	      	}
	    }
 	}
  return $plugins;
}