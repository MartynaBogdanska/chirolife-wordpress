<?php

Class Admin extends DMMM
{

  function __construct()
  {
    add_action( 'add_meta_boxes', array( &$this, 'create') );
    add_action( 'save_post', array( &$this, 'save') );

    // Loads the stylesheet for the right pages
    add_action( 'load-post.php', array( &$this, 'insertCSS') );
    add_action( 'load-post-new.php', array( &$this, 'insertCSS') );
    add_action('admin_menu', array( &$this, 'global_page_init') );
  }

  function create()
  {
    // Show the box on every post type
    add_meta_box( 'muck_box', 'Don\'t Muck My Markup', array( &$this, 'view'), get_post_type(), 'side', 'low' );
  }

  function view()
  {
    // Outputs the checkbox form control on each page and post
    if ( get_option('dmmm' ) == 'yes' ) {
      $output = 'You are disabling auto-formatting accross your entire site. To manage your auto-formatting on a per-page and post-post basis, please <a href="/wp-admin/tools.php?page=dont-muck-my-markup">disable</a> this global option then come back here.';
    }
    else {
      $output = '<input type="checkbox" name="dont_muck" id="dont_muck_chbx"' .  (self::checked() ? ' checked="checked"' : '') . '/><label for="dont_muck_chbx">Disable auto-formatting for this ' . get_post_type();
    }
    echo $output;
  }

  function save( $post_id )
  {
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
      return $post_id;

    update_post_meta( $post_id, '_dont_muck', isset( $_POST['dont_muck'] ) ? true : '' );
  }

  function insertCSS()
  {
    // Only load this stylesheet if they're on post.php inside the dashboard
    wp_enqueue_style( 'admin.css', plugins_url( 'css/admin.css', self::$plugin_url ) );
  }

  static function checked()
  {
    // We're not "caching" this in a static property because this method will be called potentially multiple times throughout the loop
    if ( get_option('dmmm' ) == 'yes' ) {
      return true;
    }
    else if ( get_post() )
    {
      $checked = get_post_meta( get_the_ID(), '_dont_muck', true);
      if ( ! empty( $checked ) )
        return true;
    }
    return false;
  }

  function global_page_init() {
    add_management_page( 'Don\'t Muck My Markup', 'Don\'t Muck My Markup', 'manage_options', 'dont-muck-my-markup', array( &$this, 'global_page') );
  }

  function global_page() {
    if ( isset( $_POST["dont_muck"])) {
      update_option('dmmm', 'yes');
    }
    else if ( $_POST) {
      update_option('dmmm', '');
    }
    echo '<div class="wrap">
    <h2>Don\'t Muck My Markup</h2>
    <form method="post" action="">
    <h2>Settings</h2>
    <table class="form-table"><tr><th scope="row">Site-wide Disable</th>
    <td>
    <label for="dont_muck_chbx"><input type="checkbox" name="dont_muck" id="dont_muck_chbx"' .  (self::checked() ? ' checked="checked"' : '') . '/>
    Disable auto-formatting for all pages and posts on the entire site.
    <p class="description">Leave this unchecked if you want to disable on a per-page and per-post basis.</p></label>
    </td></tr></table>

    <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p>
    </form>
    <p>If you\'d like more options for this plugin, please <a href="https://wordpress.org/support/plugin/dont-muck-my-markup">make an entry</a> about it at this plugin\'s support page (this is preferred, so others can join the conversation), or email me directly at <a href="mailto:martynchamberlin@icloud.com">martynchamberlin@icloud.com</a>.</p>
    </div>';
  }
}
