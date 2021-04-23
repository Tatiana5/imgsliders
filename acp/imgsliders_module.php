<?php
/**
 *
 * @package       Imgsliders
 * @copyright (c) 2021 Татьяна5
 * @license       http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

namespace tatiana5\imgsliders\acp;

use tatiana5\imgsliders\functions\acp_module_helper;

class imgsliders_module extends acp_module_helper
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	public function main($id, $mode)
	{
		global $db;

		$this->db = $db;

		$this->ext_name ='tatiana5/imgsliders';
		//$this->ext_langname = 'imgsliders';
		$this->tpl_name = 'acp_imgsliders';
		$this->form_key = 'config_imgsliders';
		add_form_key($this->form_key);

		parent::main($id, $mode);
	}

	/**
	 * Generates the array of display_vars
	 */
	protected function generate_display_vars()
	{
		$this->display_vars = [
			'lang'  => ['acp/board'],
			'title' => 'ACP_IMGSLIDERS_TITLE',
			'vars'  => [
				'legend1'					=> '',
				'imgsliders_class'			=> ['lang' => 'ACP_IMSLIDERS_CLASS', 'validate' => 'string', 'type' => 'custom', 'method' => 'imgsliders_class', 'explain' => false],
				'imgsliders_min_size'		=> ['lang' => 'ACP_IMGSLIDERS_MIN_SIZE', 'validate' => 'int:0:9999', 'type' => 'number:0:9999', 'explain' => true],
				'imgsliders_max_size'		=> ['lang' => 'ACP_IMGSLIDERS_MAX_SIZE', 'validate' => 'int:0:9999', 'type' => 'number:0:9999', 'explain' => true],
				//
				'legend2'                 => 'ACP_SUBMIT_CHANGES',
			],
		];
	}

	function imgsliders_class($value, $key = '')
	{
		$snow_types = array(
			'fancybox'		=> 'ACP_IMGSLIDERS_FANCYBOX',
			'photoswipe'	=> 'ACP_IMGSLIDERS_PHOTOSWIPE',
		);

		$value = $this->config['imgsliders_class'];

		return '<select id="imgsliders_class" name="config[imgsliders_class]">' .
			build_select($snow_types, $value) .
		'</select>';
	}
}
