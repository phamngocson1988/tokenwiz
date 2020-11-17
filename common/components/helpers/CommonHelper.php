<?php
namespace common\components\helpers;

class CommonHelper
{
	public static function dateFormat($string, $format = 'Y-m-d')
	{
		return date($format, strtotime($string));
	}
}
