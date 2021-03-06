<?php

class CWPNT_Site {
	
	protected $theme_dir;
	protected $theme_url;
	
	
	public function get_theme_dir() { return $this->theme_dir; }
	public function get_theme_url() { return $this->theme_url; }
	
	
	public function set_theme_dir( $dir ) { $this->theme_dir = $dir; }
	public function set_theme_url( $url ) { $this->theme_url = $url; }
	
	
	public function __construct( $debug = false ){
		
		if ( $debug ){
			
			$this->do_errors();
			
		} // end if
		
		$this->set_theme_dir( get_stylesheet_directory() );
		$this->set_theme_url( get_stylesheet_directory_uri() );
		
	} // end __construct
	
	public function do_init(){
		
		add_action( 'init', array( $this , 'do_register_menus' ) );
		
		if ( is_admin() ) {
			
			add_action( 'admin_menu', array( $this ,'do_remove_menu_items' ), 99 );
			
			add_action( 'admin_enqueue_scripts', array( $this , 'do_action_admin_enqueue_scripts' ) , 10 );
			
		} // end if;
		
	} // end init
	
	public function do_register_menus(){
		 
		 register_nav_menu('newsletter-menu' , 'Newsletter Menu');
		 register_nav_menu('newsletter-menu-extra' , 'Newsletter Menu Extra');
		 
	 } // end do_register_menus
	 
	 
	 public function do_action_admin_enqueue_scripts( $hook ){
		
		//wp_enqueue_script('media-upload');
   	 	//wp_enqueue_script('thickbox');
		//wp_enqueue_style('thickbox');
		wp_enqueue_style( 'cwpnt-admin' , $this->get_theme_url() . '/css/admin.css' , array(), CAHNRSWP_Theme_Newsletter::$version );
		wp_enqueue_script( 'cwpnt-admin' , $this->get_theme_url() . '/js/admin.js', array(), CAHNRSWP_Theme_Newsletter::$version, true );
		
	} // end 
	 
	 
	 public function do_remove_menu_items(){
		 
		 remove_menu_page( 'edit.php' );
		 
	 } // do_remove_menu_items
	 
	 
	 public function do_errors(){
		 
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		 
	 } // end do_errors
	 
	 
	 public function return_subtitle( $make_link = true ){
		 
		 $txt = get_bloginfo( 'description' );
		 
		 $link = get_option( 'cwpnt_description_link' , false );
		 
		 if ( $make_link ){
			 
			 $txt = '<a href="#">' . $txt . '</a>';
			 
		 } // end if
		 
		 return $txt;
		 
	 } // end return_subtitle
	 
	
} // end class