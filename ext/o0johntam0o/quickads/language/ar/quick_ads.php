<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package [Arabic]
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'QUICK_ADS_TITLE'					=> 'الإعلانات السريعة',
	'QUICK_ADS_TITLE_SETTINGS1'			=> 'الإعدادات العامة',
	'QUICK_ADS_TITLE_SETTINGS2'			=> 'الإعدادات الخاصة',
	
	'QUICK_ADS_ALLOW_BOT'				=> 'السماح بمحركات البحث ',
	'QUICK_ADS_ALLOW_BOT_EXPLAIN'		=> 'تستطيع محركات البحث مُشاهدة الإعلانات السريعة',
	'QUICK_ADS_CUSTOM_ID'				=> 'ID مُخصص ',
	'QUICK_ADS_CUSTOM_ID_EXPLAIN'		=> 'استخدم <em style="color:#ff0000">a-z</em>, <em style="color:#ff0000">0-9</em> و <em style="color:#ff0000">خط أسفل الكلمة</em> فقط ( أتركه فارغاً لو تريد إستخدام القيمة الإفتراضية ). مثال : my_custom_id_123',
	'QUICK_ADS_ZINDEX'					=> 'خاصية Z-Index ( عدد صحيح )',
	'QUICK_ADS_ZINDEX_EXPLAIN'			=> 'وضع الإعلان "خلف" أو "أعلى" عنصر آخر.',
	'QUICK_ADS_CLOSEBT'					=> 'عرض زر الإغلاق ',
	'QUICK_ADS_CLOSEBT_EXPLAIN'			=> 'لإغلاق الإعلانات',
	'QUICK_ADS_CLOSEBT_FRAME'			=> 'على الإطار',
	'QUICK_ADS_CLOSEBT_ADS'				=> 'على الإعلان',
	'QUICK_ADS_COOKIE'					=> 'تفعيل الكوكيز ',
	'QUICK_ADS_COOKIE_EXPLAIN'			=> 'لحفظ حالة عرض الإعلانات',
	'QUICK_ADS_COOKIE_TIME'				=> 'مُدة حفظ الكوكيز ( عدد صحيح )',
	'QUICK_ADS_COOKIE_TIME_EXPLAIN'		=> 'ستكون الإعلانات مخفية عند إغلاقها حتى إنتهاء هذا الوقت ( بالدقائق )',

	'QUICK_ADS_LEGEND'					=> '%s [%d]',
	'QUICK_ADS_ITEM_TOGGLE'				=> 'أنقر هنا',
	'QUICK_ADS_MORE_PROP'				=> '<em style="color:#0000ff">خيارات مُتقدمة</em> ( أنقر هنا )',
	'QUICK_ADS_NAME'					=> 'إسم الإعلان',
	'QUICK_ADS_NAME_EXPLAIN'			=> 'إعادة تسمية هذا الإعلان',
	'QUICK_ADS_POS'						=> 'المكان ',
	'QUICK_ADS_POS_EXPLAIN'				=> 'حدد مكان هذا الإعلان<br/>"تعطيل" يعني إخفاء هذا الإعلان',
	'QUICK_ADS_TOP'						=> 'أعلى',
	'QUICK_ADS_LEFT'					=> 'يسار',
	'QUICK_ADS_BOTTOM'					=> 'أسفل',
	'QUICK_ADS_RIGHT'					=> 'يمين',
	'QUICK_ADS_TOP_STATIC'				=> 'أعلى ( غير مُتحرك )',
	'QUICK_ADS_BOTTOM_STATIC'			=> 'أسفل ( غير مُتحرك )',
	
	'QUICK_ADS_ONPAGE'					=> 'الصفحات',
	'QUICK_ADS_ONPAGE_EXPLAIN'			=> 'حددالصفحات التي سيتم ظهور الإعلان فيها',
	'QUICK_ADS_ONPAGE_ITEM_FAQ'			=> 'الأسئلة المتكررة',
	'QUICK_ADS_ONPAGE_ITEM_INDEX'		=> 'الصفحة الرئيسية',
	'QUICK_ADS_ONPAGE_ITEM_MCP'			=> 'لوحة تحكم المشرف ( الإشراف )',
	'QUICK_ADS_ONPAGE_ITEM_MEMBERLIST'	=> 'قائمة الأعضاء',
	'QUICK_ADS_ONPAGE_ITEM_POSTING'		=> 'إضافة مٌشاركة',
	'QUICK_ADS_ONPAGE_ITEM_REPORT'		=> 'إضافة تقرير عن مُشاركة',
	'QUICK_ADS_ONPAGE_ITEM_SEARCH'		=> 'البحث',
	'QUICK_ADS_ONPAGE_ITEM_UCP'			=> 'لوحة تحكم العضو',
	'QUICK_ADS_ONPAGE_ITEM_VIEWFORUM'	=> 'المنتديات',
	'QUICK_ADS_ONPAGE_ITEM_VIEWONLINE'	=> 'الموجودون الآن',
	'QUICK_ADS_ONPAGE_ITEM_VIEWTOPIC'	=> 'الموضوع',
	// Custom pages
	// 'QUICK_ADS_ONPAGE_ITEM_YOUR_STUFF'	=> 'فريق الموقع',
	// Custom pages
	
	'QUICK_ADS_GROUP'					=> 'صلاحيات المجموعة ',
	'QUICK_ADS_GROUP_EXPLAIN'			=> 'حدد المجموعات التي تستطيع مُشاهدة هذا الإعلان',
	'QUICK_ADS_HREF'					=> 'الرابط ',
	'QUICK_ADS_HREF_EXPLAIN'			=> 'سيتم الذهاب إلى هذا الرابط عند النقر على هذا الإعلان',
	
	'QUICK_ADS_BG_IMG'					=> 'صورة الخلفية ',
	'QUICK_ADS_BG_IMG_EXPLAIN'			=> 'إضافة رابط للصورة التي تريدها خلفية لهذا الإعلان',
	'QUICK_ADS_BG_COLOR'				=> 'لون الخلفية ',
	'QUICK_ADS_BG_COLOR_EXPLAIN'		=> 'مثال : #ffffff, #000000, white, black,...',
	
	'QUICK_ADS_TEXT'					=> 'نص الإعلان ',
	'QUICK_ADS_TEXT_EXPLAIN'			=> 'إضافة محتوى الإعلان ( الـ JS/HTML مسموح به ).
											<br/>تستطيع أيضاً إستخدام المتغيرات التالية :
											<br/><em>{S_USERNAME}</em> يعني إسم الأعضاء = <em>%s</em>
											<br/><em>{S_USER_ID}</em> يعني رقم العضو = <em>%s</em>
											<br/><em>{S_CURRENT_TIME}</em> يعني التوقيت الحالي = <em>%s</em>
											<br/><em>{SITE_URL}</em> يعني رابط الموقع = <em>%s</em>
											<br/><em>{FORUM_URL}</em> يعني رابط المنتدى = <em>%s</em>
											<br/><em>{SITENAME}</em> يعني إسم الموقع = <em>%s</em>
											<br/><em>{SITE_DESCRIPTION}</em> يعني وصف المنتدى = <em>%s</em>',
	'QUICK_ADS_SIZE'					=> 'المقاس  ( عدد صحيح ) ',
	'QUICK_ADS_SIZE_EXPLAIN'			=> 'ضبط مقاس هذا الإعلان ( العرض x الإرتفاع ) بالبكسل. القيمة صفر (0) تعني تلقائي',
	'QUICK_ADS_MSIZE'					=> 'الحد الأدنى للمقاس ( عدد صحيح )',
	'QUICK_ADS_MSIZE_EXPLAIN'			=> 'ضبط الحد الأدنى لمقاس نافذة المتصفح التي ستعرض هذا الإعلان ( العرض x الإرتفاع ) بالبكسل',
	'QUICK_ADS_OVERF'					=> 'زيادة المحتوى ',
	'QUICK_ADS_OVERF_EXPLAIN'			=> 'حدد ماذا يحدث لو محتوى الإعلان تجاوز المقاس الذي حددته بالخيار أعلاه.',
	'QUICK_ADS_OVERF_HIDDEN'			=> 'مخفي',
	'QUICK_ADS_OVERF_VISIBLE'			=> 'مرئي',
	'QUICK_ADS_OVERF_SCROLL'			=> 'شريط تمرير',
	'QUICK_ADS_OVERF_AUTO'				=> 'تلقائي',
	'QUICK_ADS_BORDER'					=> 'نمط الحدود ',
	'QUICK_ADS_BORDER_EXPLAIN'			=> 'شكل الحدود التي حول هذا الإعلان',
	'QUICK_ADS_BORDER0'					=> 'بدون',
	'QUICK_ADS_BORDER1'					=> 'خط',
	'QUICK_ADS_BORDER2'					=> 'مُنقط',
	'QUICK_ADS_BORDER3'					=> 'مُتقطع',
	'QUICK_ADS_PRIORITY'				=> 'الأولوية ( عدد صحيح )',
	'QUICK_ADS_PRIORITY_EXPLAIN'		=> 'من العدد <strong>الأقل</strong> أولوية , إلى العدد <strong>الأعلى</strong> أولوية',

	'QUICK_ADS_NEW_ADS'					=> 'إعلان جديد',
	'QUICK_ADS_NEW_ADS_NAME'			=> 'إسم الإعلان',
	'QUICK_ADS_DEL_ADS'					=> '<strong>حذف هذا الإعلان</strong>',
	'QUICK_ADS_DEL_ADS_CONFIRM'			=> 'هل أنت متأكد من حذف هذا الإعلان ؟<br/><strong style="color:#ff0000">ملاحظة : لا يُمكن التراجع بعد تنفيذ هذا الخيار</strong>',
	'QUICK_ADS_DEL_ADS_DELETED'			=> 'تم الحذف بنجاح !',
	
	'QUICK_ADS_SAVED'					=> 'تم تحديث الإعدادات بنجاح',
	'QUICK_ADS_LOG_MSG'					=> '<strong>تحديث إعدادات الإعلانات السريعة</strong>',
));
