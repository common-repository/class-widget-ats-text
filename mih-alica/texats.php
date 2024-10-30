<?php
/** код для втавки шорткода в виджет - the code for the pearl shortcode in widget */
// Enable shortcodes in widget_ats_text
add_filter('widget_ats_text','do_shortcode');
/** код для втавки шорткода в виджет - the code for the pearl shortcode in widget */
/** = Добавляет простой текстовый виджет в админпанель Вордпресс. Adds a simple text widget in WordPress adminpanel
  * Позволяет использовать PHP код и короткий код (шорткод), делает управление более интуитивным! Allows you to use PHP code and short code (shortcode), make the control more intuitive!
  * Без редакторов: это очень важно. После обновления Вордпресс 4.8. Новый виджет с текстовыми редакторами! Without editors: it is very important. After updating WordPress 4.8. New widget with text editors!
  * Simple text widget in WordPress adminpanel. Allows you to use PHP and short code (shortcode), make the control more intuitive! Without editors:
  * it is very important. After updating WordPress 4.8. New widget with text editors! 
  * = Простой текстовый виджет в админпанель Вордпресс. Позволяет использовать PHP и короткий код (шорткод), делает управление более интуитивным! Без редакторов: это очень важно. с * * * текстовыми редакторами!
  * Simple text widget in WordPress adminpanel. Allows you to use PHP and short code (shortcode), make the control more intuitive! Without editors: it is very important. */
/*** КОД ОТРАБОТКИ ПЧП В ВИДЖЕТЕ - CODE TESTING PHP IN THE WIDGET ***/
add_filter('widget_ats_text','sp_ats_widget_execute_php',102);
function sp_ats_widget_execute_php($text) {
if(strpos($text,'<?') !== false) {
ob_start();
eval('?>'.$text);
$text = ob_get_contents();
ob_end_clean();
}
return $text;
}
/*** добавляем в АДМИН бар меню - ВАРИАНТ-V - start added to the ADMIN bar menu ***
function add_mihalica_ats_admin_bar_link() {
global $wp_admin_bar;
if ( !is_super_admin() || !is_admin_bar_showing() )
return;
$wp_admin_bar->add_menu( array(
'id' => 'add_my_my_ats',                      // Can be any value and must be unique
'title' => __( 'МЕНЮ-КОНСОЛИ'),               // The display title in the Menu
'href' => __('/wp-admin/'),
));
// To add submenu links to similar
$wp_admin_bar->add_menu( array(
'parent' => 'add_my_my_ats',                 // Can be any value and must be unique
'id'     => 'view_ats_svodca_plags',         // Unique identifier of the parent menu
'title' => __( 'смотреть ATs плагины'),      // The display title in the Menu
'href' => __('/wp-admin/plugin-install.php?s=+ATs.M&tab=search&type=term'),
));
// To add submenu links to similar
$wp_admin_bar->add_menu( array(
'parent' => 'add_my_my_ats',                 // Can be any value and must be unique
'id'     => 'view_ats_sapyss',               // Unique identifier of the parent menu
'title' => __( 'виджеты'),                    // The display title in the Menu
'href' => __('/wp-admin/widgets.php'),
));
$wp_admin_bar->add_menu( array(
'parent' => 'add_my_my_ats',                 // Can be any value and must be unique
'id'     => 'view_ats_plagys',
'title' => __( 'плагины'),
'href' => __('/wp-admin/plugins.php'),
));
$wp_admin_bar->add_menu( array(
'parent' => 'add_my_my_ats',                 // Unique identifier of the parent menu
'id'     => 'view_ats_opss',
'title' => __( 'ОПЦИИ WP'),
'href' => __('/wp-admin/options.php'),
));
}
add_action('admin_bar_menu', 'add_mihalica_ats_admin_bar_link',37);
/*** fin added to the ADMIN bar menu ***/