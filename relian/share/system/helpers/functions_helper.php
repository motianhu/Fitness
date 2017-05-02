<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

function get_check_pwd($pwd,$salt='fjeixcmgjel&%$f8')
{
	return md5(md5($pwd).$salt);
}

/**
 *判断时间格式是否合法
 */
function is_datetime($datetime) {
	if ($datetime == date ( 'Y-m-d H:i:s', strtotime ( $datetime ) )) {
		return true;
	} else {
		return false;
	}
}

/**
 *判断日期格式是否合法
 */
function is_date($date) {
	if ($date == date ( 'Y-m-d', strtotime ( $date ) )) {
		return true;
	} else {
		return false;
	}
}

//二维数组比较
function array_diff_assoc2_deep($array1, $array2) {
	if(empty($array1))
		return $result['del'] = $array2;
	if(empty($array2))
		$result['add'] = $array1;
	$arr1 = $arr2 = array();
	$re_array1 = $array1;
	$re_array2 = $array2;
	
	foreach ($array2 as $v2)
		$arr2[] = md5(serialize($v2));
	foreach ($array1 as $k=>$v1)
	{
		$arr1[] = $tmp = md5(serialize($v1));
		if(in_array($tmp, $arr2)){
			unset($re_array1[$k]);	//已拥有
			$key = array_search($array1[$k], $array2);
			unset($re_array2[$key]);
		}
	}
	$result['add'] = $re_array1;
	$result['del'] = $re_array2;
	return $result;
}

if ( ! function_exists( 'exif_imagetype' ) ) {
	function exif_imagetype ( $filename ) {
		if ( ( list($width, $height, $type, $attr) = getimagesize( $filename ) ) !== false ) {
			return $type;
		}
		return false;
	}
}

/* End of file functions_helper.php */
/* Location: ./system/helpers/functions_helper.php */