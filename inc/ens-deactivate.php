<?php 
/*
*
* @package ENSplugin
*
*/

class EnsDeactivate
{
	public static function deactivate(){
		flush_rewrite_rules();
	}
}