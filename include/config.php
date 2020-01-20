<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 0);

define ( 'TZN_DB_HOST', 'localhost' );
define ( 'TZN_DB_USER', 'root' );
define ( 'TZN_DB_PASS', '' );
define ( 'TZN_DB_BASE', 'db_transreform' );

/*define ( 'TZN_DB_HOST', 'localhost' );
define ( 'TZN_DB_USER', 'transref_usucms' );
define ( 'TZN_DB_PASS', '+0S6f+p[aFz~' );
define ( 'TZN_DB_BASE', 'transref_cms' );*/

define('TZN_DB_PREFIX','jh');
define('TZN_DB_CLASS','tzn_mysql.php');
define('TZN_DB_DEBUG',2);
define('TZN_DB_PERMANENT',0);
define('TZN_DEBUG',2);
define('TZN_SPECIALCHARS',2);
define('TZN_BOOL_TRUE','<img src="../admin/include/include/images/check_yes.png" width="12" height="13" border="0" />');
define('TZN_BOOL_FALSE','<img src="../admin/include/include/images/check_no.png" width="12" height="13" border="0" />');
define('TZN_TZDEFAULT','user');
define('TZN_DATEFIELD','USA');
define('TZN_TRANS_ID',0);
define('TZN_TRANS_STATUS',0);
define('FRK_LANGUAGE','en');
define('TZN_DB_ASC_OFF','images/o_asc.png');
define('TZN_DB_ASC_ON','images/o_asc_on.png');
define('TZN_DB_DESC_OFF','images/o_desc.png');
define('TZN_DB_DESC_ON','images/o_desc_on.png');
define('TZN_DB_PAGING_OFF','');
define('TZN_DB_PAGING_ON','active');
define('TZN_DB_PAGING_ENABLED','tznPagingEnabled');
define('TZN_DB_PAGING_DISABLED','tznPagingDisabled');
define('TZN_DB_ERROR_PAGE','error.php');

define('TZN_USER_ID_LENGTH',8);		// length of room/user ID
define('TZN_USER_LOGIN','username');// Login mode = username OR email
define('TZN_USER_NAME_MIN',3);		// minimum length for username
define('TZN_USER_NAME_MAX',20);		// maximum length for username
define('TZN_USER_PASS_MIN',3);		// minimum length for password
define('TZN_USER_PASS_MAX',10);		// maximum length for password
define('TZN_USER_PASS_MODE',4);


define('TZN_FILE_RANDOM',true);
define('TZN_FILE_GD_VERSION',2);
define('TZN_FILE_GD_QUALITY',85);
define('TZN_GEO_LAT', "25.7889689");
define('TZN_GEO_LNG',"-80.22643929999998");

if (@is_dir('./include')){
	define('PRJ_ROOT_PATH','./');
}else if(@is_dir('../include')){define('PRJ_ROOT_PATH','../');
}else{define('PRJ_ROOT_PATH','../../');}
define('PRJ_ADMIN_DIRNAME','admin');

define('PRJ_ADMIN_PATH',PRJ_ROOT_PATH.PRJ_ADMIN_DIRNAME.'/');
define('PRJ_INCLUDE_PATH',PRJ_ROOT_PATH.'include/');
define('PRJ_CLASS_PATH',PRJ_INCLUDE_PATH.'classes/');
define('PRJ_CORE_PATH',PRJ_INCLUDE_PATH.'core/');
define('PRJ_MAIL_PATH',PRJ_INCLUDE_PATH.'mail/');
define('PRJ_WWW_PATH',PRJ_ROOT_PATH);

define('CKEDITOR_PATH',PRJ_INCLUDE_PATH.'ckeditor/');
define('CKFINDER_PATH',PRJ_INCLUDE_PATH.'ckfinder/');

define('CKEDITOR_TOOLBAR_BASIC', 'Basic');
define('CKEDITOR_TOOLBAR_FULL', 'Full');

define('TZN_FILE_ICONS_PATH',PRJ_WWW_PATH.'icons/');
define('TZN_FILE_ICONS_URL','icons/');
define('TZN_FILE_TEMP_PATH',PRJ_WWW_PATH.'temp/');
define('TZN_FILE_TEMP_URL','temp/');
define('TZN_FILE_UPLOAD_PATH',PRJ_WWW_PATH.'upload/');
define('TZN_FILE_UPLOAD_URL','upload/');
define('TZN_FILE_UPLOAD_URL_ADMIN','../upload/');


define('LBN_ROOT','');
define('LBN_ROOT_HTML',PRJ_INCLUDE_PATH.'html/');
define('LBN_CHARSET','utf-8');

define('LBN_ADMIN_IMAGES','../images/');
define('LBN_ADMIN_IMAGES_ICONS','../images/ico/');
define('LBN_ADMIN_IMAGES_ICONS_ADD','../images/ico/add.gif');
define('LBN_ADMIN_IMAGES_ICONS_EDIT','../images/ico/edit.gif');
define('LBN_ADMIN_IMAGES_ICONS_DELETE','../images/ico/delete.gif');
define('LBN_ADMIN_JAVASCRIPT','../js/');
define('LBN_ADMIN_SWF','../swf/');
define('LBN_ADMIN_CSS','../css/');

define('LBN_ADMIN_STATUS_ON','Activo');
define('LBN_ADMIN_STATUS_OFF','Inactivo');

define('LBN_ADMIN_CAT_EXCLUDE_1','isNews');
define('LBN_ADMIN_PAGE_EXCLUDE_1','isTestimonio');
define('LBN_ADMIN_PAGE_EXCLUDE_2','isNoticia');

define('URL_BANNER', 'var1');
define('LBN_VAR2', 'var2');
define('LBN_VAR2_BANNER', 1);
define('LBN_VAR2_GALLERY', 2);

define('LBN_ADMIN_CKEDITOR',PRJ_INCLUDE_PATH.'ckeditor/');
define('LBN_ADMIN_CKFINDER',PRJ_INCLUDE_PATH.'ckfinder/');


// == EMAIL NOTIFICATION
define('LBN_EMAIL_DIR', PRJ_MAIL_PATH);
define('LBN_EMAIL_FROM', "info@xxx.com.pe");
define('LBN_EMAIL_FROM_NAME', "xxx");
define('LBN_EMAIL_TO', "");
define('LBN_EMAIL_BCC', false);
define('LBN_EMAIL_USER', true);
define('LBN_EMAIL_SWIFT', "smtp");  // smtp, sendmail or phpmail
define('LBN_EMAIL_SENDMAIL', "/usr/sbin/sendmail -bs");
define('LBN_EMAIL_SERVER', "");
define('LBN_EMAIL_SERVER_TIMEOUT', 30);
define('LBN_EMAIL_SERVER_AUTH',false);
define('LBN_EMAIL_SERVER_USER', "");
define('LBN_EMAIL_SERVER_PASS', "");
define('LBN_EMAIL_NO_RCP', true);  // false for silent
define('LBN_EMAIL_ENABLED', true);
// == EMAIL NOTIFICATION

define('PARENT_PAGE', -1);

// === DATE FORMATS ===========================================
define ( "TZN_DATE_SHT", "%d %b %y" );
define ( "TZN_DATE_SHX", "%a %d %b %y" );
define ( "TZN_DATE_LNG", "%A %d de %B del %Y" );
define ( "TZN_DATE_LNX", "%A %d %B %Y" );
define ( "TZN_DATETIME_PER", "%d/%m/%y %H:%M" );
define ( "TZN_DATETIME_USA", "%m/%d/%y %I:%M%p" );
define ( "TZN_DATETIME_SHT", "%d %b %y %H:%M" );
define ( "TZN_DATETIME_SHX", "%a %d %b %y %H:%M" );
define ( "TZN_DATETIME_LNG", "%d %B %Y, %H:%M" );
define ( "TZN_DATETIME_LNX", "%A %d %B %Y, %H:%M" );

?>