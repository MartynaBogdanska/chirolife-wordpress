<?php
if ( ! class_exists( 'License_Menu') ) {

    class License_Menu{

    /**
     * A reference the class responsible for rendering the license page.
     *
     * @var    usm_License_Page
     * @access private
     */

        private $license_Page;

        private $page_title   = '';
        private $menu_title   = '';
        private $capability   = 'manage_options';
        private $menu_slug    = '';

        public function __construct($page_title, $menu_title, $capability, $menu_slug, $license_Page) {

            $this->page_title 	 = $page_title;
            $this->menu_title 	 = $menu_title;
            $this->capability 	 = $capability;
            $this->menu_slug  	 = $menu_slug;
            $this->license_Page  = $license_Page;

            $this->init();
        }   


        public function get_menu_slug(){
        	return $this->menu_slug;
        }

        public function init() {
            add_action( 'admin_menu', array($this,'add_admin_page'));
        }
     
        /**
         * Creates the submenu item and calls on the Submenu Page object to render
         * the actual contents of the page.
         */
        public function add_admin_page() {
            add_plugins_page( $this->page_title, $this->menu_title, $this->capability, $this->menu_slug, array( $this->license_Page, 'render'));
        }
    }
}
?>