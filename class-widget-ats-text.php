<?php
/*
Plugin Name: widget text class ats
Plugin URI: https://mihalica.ru/product/plagin-mats-widget-privyichnyiy-tekstovyiy-vidzhet-bez-redaktora/
Description: Простой текстовый виджет позволит вам запускать PHP и шорткод (shortcode) сразу после активации плагина (WordPress виджет по умолчанию этого не позволяет!)- widget text class ats совместим с новыми виджетами! Удобный вариант классического текстового виджета (без редакторов) после обновления WordPress 4.8. 
Version: 8.7.9
Author: ATs.M
Author URI: https://mihalica.ru/
License: Conditions:
*/
/*
* A simple text widget will allow you to run PHP and short code (shortcode), immediately after activation of the plugin widget text class ats (in WordPress 4.8 editors added!) - Compatibility with new widgets!  (classic text widget with PHP support)
*/

// and
include_once "mih-alica/texats.php";
// and below files

// Register our widget
add_action( 'widgets_init', 'ats_first_widget' );
function ats_first_widget() {
    register_widget( 'Ats_First_Widget' );
}
// class widget
class Ats_First_Widget extends WP_Widget {
function __construct() {

$args = array(
    'name' => 'RealMik: текст, html-php, шорткод',
    'description' => 'Текстовый виджет: работайте с php, html или шорткодами - всё включено!',
    'classname' => 'ats_text',
);
// design widget
    parent::__construct('ats_first', '', $args);
}
// The organization of the output of the widget on your site for visitors (in the Frontend)
function widget( $args, $instance ) {

    extract( $args );
    extract($instance);

$title = apply_filters('widgetats_title', $instance['title'] );
//$name = $instance['name'];
$title = isset( $instance['title'] ) ? $instance['title'] : false;
$text = apply_filters( 'widget_ats_text', $text );

    echo $before_widget;

// Display information name of the widget
if ( $title )
    echo $before_title . $title . $after_title;
    echo "<div class='textwidget'>$text</div>";
    echo $after_widget;
}
// In the administrative part of the widget (Backend)
function form($instance) {
    extract($instance);    
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>">title: заголовок</label>
<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( isset($title) ) echo esc_attr( $title ); ?>" class="widefat">
</p>
<p>
<label for="<?php echo $this->get_field_id('text'); ?>">info: информация</label>
<textarea class="widefat code" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" cols="20" rows="5"><?php if( isset($text) ) echo esc_attr( $text ); ?></textarea>
</p>
<tr>
<td class="tt-widget-label">правила:</td>
<br /><td class="tt-widget-content" width="57%"><span style="font-size:11px;font-style:italic;color:#00aa02;"><b>Введите текст, html ...пропишите php, либо шорткод в поле выше...<br />Спасибо, что Вы с нами!..</b></span>
</td>
</tr>

<?php }
// The preservation and subsequent updating of the widget settings: the data is cleared (erased) and are saved back to the database
function update($new_instance, $old_instance){
$new_instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
return $new_instance;
} }
// and below files atstext