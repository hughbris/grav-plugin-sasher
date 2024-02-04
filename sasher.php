<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;

/**
 * Class SasherPlugin
 * @package Grav\Plugin
 */
class SasherPlugin extends Plugin
{
	private $defaults = [
		'message' => '&nbsp;', // this ugliness prevents a thinner line which doesn't align with the ribbon "folds"
		];

	/**
	 * @return array
	 *
	 * The getSubscribedEvents() gives the core a list of events
	 *     that the plugin wants to listen to. The key of each
	 *     array section is the event that the plugin listens to
	 *     and the value (in the form of an array) contains the
	 *     callable (or function) as well as the priority. The
	 *     higher the number the higher the priority.
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			'onPluginsInitialized' => [
				// Uncomment following line when plugin requires Grav < 1.7
				// ['autoload', 100000],
				['onPluginsInitialized', 0],
			]
		];
	}

	/**
	 * Composer autoload
	 *
	 * @return ClassLoader
	 */
	public function autoload(): ClassLoader
	{
		return require __DIR__ . '/vendor/autoload.php';
	}

	/**
	 * Initialize the plugin
	 */
	public function onPluginsInitialized(): void
	{
		// Don't proceed if we are in the admin plugin
		if ($this->isAdmin()) {
			return;
		}

		// Enable the main events we are interested in
		$this->enable([
			'onAssetsInitialized' => ['addPluginAssets', 0],
			'onOutputGenerated' => ['injectSash', 0],
		]);
	}

	public function addPluginAssets() {
		$this->grav['assets']->addCss('plugins://sasher/css/sash-ribbon.css');
		$this->grav['assets']->addCss('theme://css/sasher-custom.css');
		$this->grav['assets']->addCss('user://config/plugins/sasher/custom.css');
		$this->grav['assets']->addCss('environment://config/plugins/sasher/custom.css');
	}

	public function injectSash() { // adapted from https://github.com/aricooperdavis/grav-plugin-custom-banner onOutputGenerated()

        // Get plugin config or fill with defaults if undefined
		$config = array_merge($this->defaults, $this->config());

		// TODO: move this to a template file ??
        $sash = <<<EOD
		<div class="sash-box">
			<div class="ribbon ribbon-top-left"><span>{$config['message']}</span></div>
		</div>
EOD;

        // Add banner to grav output
        // if (!in_array($this->grav['uri']->url(), $config['exclude-pages'])) {
            $output = $this->grav->output;
            $output = preg_replace('/(\<body).*?(\>)/i', '${0}'.$sash, $output, 1);
            $this->grav->output = $output;
        // }
    }

}
