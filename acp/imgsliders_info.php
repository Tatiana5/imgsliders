<?php
/**
*
* @package Imgsliders
* @copyright (c) 2021 Татьяна5
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace tatiana5\imgsliders\acp;

class imgsliders_info
{
	public function module()
	{
		return [
			'filename'	=> '\tatiana5\imgsliders\acp\imgsliders_module',
			'title'		=> 'ACP_IMGSLIDERS_TITLE',
			'version'	=> '0.0.1',
			'modes'		=> [
				'config_imgsliders'		=> ['title' => 'ACP_IMGSLIDERS_TITLE_EXPLAIN', 'auth' => 'ext_tatiana5/imgsliders && acl_a_extensions', 'cat' => ['ACP_IMGSLIDERS_TITLE_EXPLAIN']],
			],
		];
	}
}
