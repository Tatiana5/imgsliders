<?php
/**
 *
 * @package       Imgsliders
 * @copyright (c) 2021 Татьяна5
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace tatiana5\imgsliders\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config              $config
	 * @param \phpbb\template\template          $template
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->template = $template;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core.
	 *
	 * @return array
	 */
	public static function getSubscribedEvents()
	{
		return [
			'core.user_setup'			=> 'load_language_on_setup',
			'core.page_header_after'	=> 'template_vars',
		];
	}

	/**
	 * Load language file for notifications.
	 *
	 * @param object $event The event object
	 */
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name' => 'tatiana5/imgsliders',
			'lang_set' => 'imgsliders',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function template_vars($event)
	{
		$this->template->assign_vars([
			'IMGSLIDERS_CLASS'		=> $this->config['imgsliders_class'],
			'IMGSLIDERS_MIN_SIZE'	=> $this->config['imgsliders_min_size'],
			'IMGSLIDERS_MAX_SIZE'	=> $this->config['imgsliders_max_size'],
		]);
	}
}
