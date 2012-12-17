<?php
/*
Plugin Name: Brankic Twitter Widget 
Plugin URI: http://www.brankic1979.com
Description: Showing tweets from the user
Author: Brankic1979
Version: 1.2
Author URI: http://www.brankic1979.com/
 */
class BraTwitterWidget extends WP_Widget
{
    function BraTwitterWidget() {
        $widget_options = array(
        'classname'        =>        'bra-twitter-widget',
        'description'     =>        'Showing tweets of the user '
        );
        
        parent::WP_Widget('bra_twitter_widget', 'Brankic Twitter Widget', $widget_options);
    }
    
    function widget( $args, $instance ) {
        extract ( $args, EXTR_SKIP );
        $title = ( $instance['title'] ) ? $instance['title'] : 'Latest tweets';
        $username = ( $instance['username'] ) ? $instance['username'] : 'Brankic1979';
        $no_tweets = ( $instance['no_tweets'] ) ? $instance['no_tweets'] : '3';
        $unique_id =  $username . $no_tweets . $title ;
        $unique_id = preg_replace("/[^A-Za-z0-9]/", '', $unique_id);
        $root = plugin_dir_url( __FILE__ );
        echo $before_widget;
        echo $before_title . $title . $after_title;
        wp_enqueue_script("bra_twitter", $root."bra_twitter_widget.js");
        wp_enqueue_style("bra_twitter", $root."bra_twitter_widget.css");
        ?>
        <script type="text/javascript">
        /***************************************************
         ADDITIONAL CODE FOR TWITTER
        ***************************************************/
           jQuery(document).ready(function($) {
             $("#<?php echo $unique_id; ?>").tweet({
               join_text: "auto",
               username: "<?php echo $username; ?>",
               avatar_size: 0,
               count: <?php echo $no_tweets; ?>,
               auto_join_text_default: "", 
               auto_join_text_ed: "",
               auto_join_text_ing: "",
               auto_join_text_zigly: "",
               auto_join_text_url: "",
               template: "{text}{time}",
               loading_text: "loading tweets..."
             });
           })
        </script>
        <div class="tweets" id="<?php echo $unique_id; ?>"></div><!--END tweets-->    
        <?php 
        echo $after_widget;
    }
    
    function form( $instance ) {
        if (!isset($instance['title'])) $instance['title'] = "";
        if (!isset($instance['username'])) $instance['username'] = ""; 
        if (!isset($instance['no_tweets'])) $instance['no_tweets'] = ""; 

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
        <label for="<?php echo $this->get_field_id('username'); ?>">
        Twitter username: 
        <input id="<?php echo $this->get_field_id('username'); ?>"
                name="<?php echo $this->get_field_name('username'); ?>"
                value="<?php echo esc_attr( $instance['username'] ); ?>" 
                class="widefat"/>
        </label>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('no_tweets'); ?>">
        Number of tweets to show: 
        <input id="<?php echo $this->get_field_id('no_tweets'); ?>"
                name="<?php echo $this->get_field_name('no_tweets'); ?>"
                value="<?php echo esc_attr( $instance['no_tweets'] ); ?>" 
                class="widefat"/>
        </label>
        </p>
        <?php 
    }
    
}
    
function bra_twitter_widget_init() {
    register_widget("BraTwitterWidget");
}
add_action('widgets_init','bra_twitter_widget_init');