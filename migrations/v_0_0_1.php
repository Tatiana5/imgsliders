<?php
/**
*
* @package Imgsliders
* @copyright (c) Татьяна5
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace tatiana5\imgsliders\migrations;

class v_0_0_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['imgsliders_version']) && version_compare($this->config['imgsliders_version'], '0.0.1', '>=');
	}

	public static function depends_on()
	{
			return ['\phpbb\db\migration\data\v310\dev'];
	}

	public function update_data()
	{
		return [
			// Add configs
			['config.add', ['imgsliders_class', 'fancybox']],
			['config.add', ['imgsliders_min_size', 32]],
			['config.add', ['imgsliders_max_size', 640]],

			// Current version
			['config.add', ['imgsliders_version', '0.0.1']],

			// Add ACP modules
			['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'ACP_IMGSLIDERS_TITLE']],
			['module.add', ['acp', 'ACP_IMGSLIDERS_TITLE', [
					'module_basename'	=> '\tatiana5\imgsliders\acp\imgsliders_module',
					'module_langname'	=> 'ACP_IMGSLIDERS_TITLE_EXPLAIN',
					'module_mode'		=> 'config_imgsliders',
					'module_auth'		=> 'ext_tatiana5/imgsliders && acl_a_extensions',
			]]],
		];
	}
}
