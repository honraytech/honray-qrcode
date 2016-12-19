<?php
// +----------------------------------------------------------------------
// | Author: honray <tech@honraytech.com>
// +----------------------------------------------------------------------
/**
* 生成二维码
* -------------------------------------------------------------------------
* @param string $content 内容，必须
* @param string $filename 保存文件名，必须
* @param string $size 大小，可选
* @param string $level 可选
* @return 返回值:文件路径
* -------------------------------------------------------------------
**/

function make_qrcode($content, $filename, $size = 4, $level = "L") { 	
 	if (empty($content)||empty($filename)) {
 		return 'content或fieldname为空';
 	}
 	import('honray.tp5-qrcode.src.PHPQrcode.phpqrcode', VENDOR_PATH, '.php');
 	$QRcode = new \QRcode();

 	if (!is_dir('./uploads/qrcode/')) {
 		@mkdir('./uploads/qrcode/');
 		@chmod('./uploads/qrcode/', 0777);
 	}

 	$path = "./uploads/qrcode/".$filename.".png";
 	$QRcode->png($content, $path, $level, $size);
 	$url = "uploads/qrcode/".$filename.".png";
 	return $url;
}