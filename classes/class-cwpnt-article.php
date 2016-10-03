<?php

class CWPNT_Article extends CWPNT_Post_type {
	
	protected $slug = 'article';
	
	protected $args = array(
		'description'        => 'Description.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'article' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'taxonomies'         => array('post_tag'),
		'menu_position'      => null,
		'supports'           => array( 'title', 'author', 'editor' ),
	);
	
	protected $labels = array(
		'name'               => 'Articles',
		'singular_name'      => 'Article',
		'menu_name'          => 'Articles',
		'name_admin_bar'     => 'Article',
		'add_new'            => 'Add New', 'Article',
		'add_new_item'       => 'Add New Article',
		'new_item'           => 'New Article',
		'edit_item'          => 'Edit Article',
		'view_item'          => 'View Article',
		'all_items'          => 'All Articles', 
		'search_items'       => 'Search Articles',
		'parent_item_colon'  => 'Parent Articles:',
		'not_found'          => 'No Articles found.',
		'not_found_in_trash' => 'No Articles found in Trash.',
	);
	
	
	public function do_action_edit_form_after_title( $post ){
		
		ob_start();
		
		include $this->get_theme_dir() . '/includes/include-editor-subtitle.php';
		
		$primary_img_src = $this->get_theme_url() . '/images/placeholder.png';
		$secondary_img_src = $this->get_theme_url() . '/images/placeholder.png';
		include $this->get_theme_dir() . '/includes/include-editor-primary-secondary-images.php';
	
		
		include $this->get_theme_dir() . '/includes/include-editor-excerpt.php';
		include $this->get_theme_dir() . '/includes/include-editor-editor-header.php';
		
		$html = ob_get_clean();
		
		echo $html;
		
	} // end do_edit_form_after_title
	
	
	public function do_action_edit_form_after_editor( $post ){
		
		ob_start();
		
		include $this->get_theme_dir() . '/includes/include-editor-contact.php';
		include $this->get_theme_dir() . '/includes/include-editor-related.php';
		
		$html = ob_get_clean();
		
		echo $html;
		
	} // end do_action_edit_form_after_editor
	
	
	public function return_editor_summary( $post ){
		
		return 'summary field';
		
	} // end return_editor_summary

	
	
} // end class