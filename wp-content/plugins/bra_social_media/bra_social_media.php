<?php
/*
Plugin Name: Brankic Social Media Widget 
Plugin URI: http://www.brankic1979.com
Description: Showing social media icons - for more icons http://www.brankic1979.com/2011/12/free-social-media-icon-set/
Author: Brankic1979
Version: 1.1
Author URI: http://www.brankic1979.com/
*/
class BraZigSocialIconsWidget extends WP_Widget
{
	function BraZigSocialIconsWidget() {
		$widget_options = array(
		'classname'		=>		'bra-zig-social-media-widget',
		'description' 	=>		'Showing social icons and URL to profile pages of the user '
		);
		
		parent::WP_Widget('bra_zig_social_media_widget', 'Brankic Social Media Widget', $widget_options);
	}
	
	function widget( $args, $instance ) {
		extract ( $args, EXTR_SKIP );
		$title = ( $instance['title'] ) ? $instance['title'] : '';
        $icon_1_url = ( $instance['icon_1_url'] ) ? $instance['icon_1_url'] : '';
        $icon_2_url = ( $instance['icon_2_url'] ) ? $instance['icon_2_url'] : '';
        $icon_3_url = ( $instance['icon_3_url'] ) ? $instance['icon_3_url'] : '';
        $icon_4_url = ( $instance['icon_4_url'] ) ? $instance['icon_4_url'] : '';
        $icon_5_url = ( $instance['icon_5_url'] ) ? $instance['icon_5_url'] : '';
        $icon_6_url = ( $instance['icon_6_url'] ) ? $instance['icon_6_url'] : '';
        $icon_7_url = ( $instance['icon_7_url'] ) ? $instance['icon_7_url'] : '';
        $icon_8_url = ( $instance['icon_8_url'] ) ? $instance['icon_8_url'] : '';
        
        $icon_1_path = ( $instance['icon_1_path'] ) ? $instance['icon_1_path'] : '';
        $icon_2_path = ( $instance['icon_2_path'] ) ? $instance['icon_2_path'] : '';
        $icon_3_path = ( $instance['icon_3_path'] ) ? $instance['icon_3_path'] : '';
        $icon_4_path = ( $instance['icon_4_path'] ) ? $instance['icon_4_path'] : '';
        $icon_5_path = ( $instance['icon_5_path'] ) ? $instance['icon_5_path'] : '';
        $icon_6_path = ( $instance['icon_6_path'] ) ? $instance['icon_6_path'] : '';
        $icon_7_path = ( $instance['icon_7_path'] ) ? $instance['icon_7_path'] : '';
        $icon_8_path = ( $instance['icon_8_path'] ) ? $instance['icon_8_path'] : '';
        
        

		$root = plugin_dir_url( __FILE__ );
        //$root = str_replace("\\", "/", $root);
		echo $before_widget;
		echo $before_title . $title . $after_title;
        //wp_enqueue_script("bra_social_media_plugin_js", $root."bra_social_media.js");
        wp_enqueue_style("bra_social_media_plugin_css", $root."bra_social_media.css"); 
		?>
		<div class="social-bookmarks">                    
        <ul>
            <?php
            $i = 0;
            for ($i = 1 ; $i <= 8 ; $i++)
            {
                $icon_url = "icon_".$i."_url";
                $icon_path = "icon_".$i."_path";
                if ($$icon_url != "")
                { 
                    $icon_filename = $$icon_path;
                    $icon_filename = substr($icon_filename, 0, -4); 
                ?>
                <li class="<?php echo $icon_filename; ?>"><a target="_blank" href="<?php echo $$icon_url; ?>"><?php echo $icon_filename; ?></a></li>
                <?php
                }
            }
            ?>                        
        </ul><!-- END UL-->
    </div><!--END SOCIAL BOOKMARKS-->
		<?php 
		echo $after_widget;
	}
	
	function form( $instance ) {
        $root = plugin_dir_url( __FILE__ ); 
        if (!isset($instance['title'])) $instance['title'] = ""; 
        if (!isset($instance['icon_1_url'])) $instance['icon_1_url'] = "";
        if (!isset($instance['icon_1_path'])) $instance['icon_1_path'] = ""; 
        if (!isset($instance['icon_2_url'])) $instance['icon_2_url'] = "";
        if (!isset($instance['icon_2_path'])) $instance['icon_2_path'] = "";
        if (!isset($instance['icon_3_url'])) $instance['icon_3_url'] = "";
        if (!isset($instance['icon_3_path'])) $instance['icon_3_path'] = "";
        if (!isset($instance['icon_4_url'])) $instance['icon_4_url'] = "";
        if (!isset($instance['icon_4_path'])) $instance['icon_4_path'] = "";
        if (!isset($instance['icon_5_url'])) $instance['icon_5_url'] = "";
        if (!isset($instance['icon_5_path'])) $instance['icon_5_path'] = "";
        if (!isset($instance['icon_6_url'])) $instance['icon_6_url'] = "";
        if (!isset($instance['icon_6_path'])) $instance['icon_6_path'] = "";
        if (!isset($instance['icon_7_url'])) $instance['icon_7_url'] = "";
        if (!isset($instance['icon_7_path'])) $instance['icon_7_path'] = "";
        if (!isset($instance['icon_8_url'])) $instance['icon_8_url'] = "";
        if (!isset($instance['icon_8_path'])) $instance['icon_8_path'] = "";
        //echo $root."icons/*.*";
        $icons_paths = glob("../wp-content/plugins/bra_social_media/icons/*.*");
        //print_r($icons_paths);
		?>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>">
        Title: 
        <input id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>"
                value="<?php echo esc_attr( $instance['title'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        <p>
		<label for="<?php echo $this->get_field_id('icon_1_url'); ?>">
		URL 1: 
		<input id="<?php echo $this->get_field_id('icon_1_url'); ?>"
				name="<?php echo $this->get_field_name('icon_1_url'); ?>"
				value="<?php echo esc_attr( $instance['icon_1_url'] ); ?>"
                class="widefat"/>
		</label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_1_path'); ?>">
        Icon 1:
          <select name="<?php echo $this->get_field_name('icon_1_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_1_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_1_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        
        <label for="<?php echo $this->get_field_id('icon_2_url'); ?>">
        URL 2: 
        <input id="<?php echo $this->get_field_id('icon_2_url'); ?>"
                name="<?php echo $this->get_field_name('icon_2_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_2_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_2_path'); ?>">
        Icon 2:
          <select name="<?php echo $this->get_field_name('icon_2_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_2_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_2_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_3_url'); ?>">
        URL 3: 
        <input id="<?php echo $this->get_field_id('icon_3_url'); ?>"
                name="<?php echo $this->get_field_name('icon_3_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_3_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_3_path'); ?>">
        Icon 3:
          <select name="<?php echo $this->get_field_name('icon_3_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_3_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_3_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        
        <label for="<?php echo $this->get_field_id('icon_4_url'); ?>">
        URL 4: 
        <input id="<?php echo $this->get_field_id('icon_4_url'); ?>"
                name="<?php echo $this->get_field_name('icon_4_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_4_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_4_path'); ?>">
        Icon 4:
          <select name="<?php echo $this->get_field_name('icon_4_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_4_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_4_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_5_url'); ?>">
        URL 5: 
        <input id="<?php echo $this->get_field_id('icon_5_url'); ?>"
                name="<?php echo $this->get_field_name('icon_5_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_5_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_5_path'); ?>">
        Icon 5:
          <select name="<?php echo $this->get_field_name('icon_5_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_5_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_5_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        
        <label for="<?php echo $this->get_field_id('icon_6_url'); ?>">
        URL 6: 
        <input id="<?php echo $this->get_field_id('icon_6_url'); ?>"
                name="<?php echo $this->get_field_name('icon_6_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_6_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_6_path'); ?>">
        Icon 6:
          <select name="<?php echo $this->get_field_name('icon_6_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_6_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_6_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_7_url'); ?>">
        URL 7: 
        <input id="<?php echo $this->get_field_id('icon_7_url'); ?>"
                name="<?php echo $this->get_field_name('icon_7_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_7_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_7_path'); ?>">
        Icon 7:
          <select name="<?php echo $this->get_field_name('icon_7_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_7_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_7_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        
        <label for="<?php echo $this->get_field_id('icon_8_url'); ?>">
        URL 8: 
        <input id="<?php echo $this->get_field_id('icon_8_url'); ?>"
                name="<?php echo $this->get_field_name('icon_8_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_8_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_8_path'); ?>">
        Icon 8:
          <select name="<?php echo $this->get_field_name('icon_8_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_8_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_8_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
		<?php 
	}
	
}
	
function bra_zig_social_media_widget_init() {
	register_widget("BraZigSocialIconsWidget");
}
add_action('widgets_init','bra_zig_social_media_widget_init');