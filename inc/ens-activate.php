<?php 
/*
*
* @package ENSplugin
*
*/

class EnsActivate
{
	public static function activate(){
		flush_rewrite_rules();
	}
}