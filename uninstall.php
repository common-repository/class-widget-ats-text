<?php
/**
	Этот плагин является добавочной частью массива виджетов - текстовый виджет, плагин для WordPress.
    ==
    является свободным программным обеспечением: вы можете распространять и/или
    модифицировать ее согласно условиям стандартной общественной лицензии GNU, опубликованной
    Фондом свободного программного обеспечения, либо версии 2 лицензии, либо
    (по вашему выбору) любой более поздней версии.
    ==
    Плагин распространяется мною в надежде, на то, что он будет
    полезен. Увидеть стандартную общественную лицензию GNU для получения дополнительной информации
    вместе с WordPress можно здесь: см. <http://www.gnu.org/licenses/>.
*/
	if( ! defined('WP_UNINSTALL_PLUGIN') ) exit;
	// проверка пройдена успешно - отсюда удаляем опции...
	delete_option('ats_first_widget');