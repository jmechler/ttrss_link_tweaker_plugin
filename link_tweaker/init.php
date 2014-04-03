<?php
class Link_Tweaker extends Plugin {

	private $host;

	function about() {
		return array(1.0,
		"Link_Tweaker plugin using HOOK_ARTICLE_FILTER",
		"jason@jasonmechler.com");
	}

	function init($host) {
		$this->host = $host;

		$host->add_hook($host::hook_article_filter, $this);
	}

	function get_prefs_js() {
		return file_get_contents(dirname(__FILE__) . "/init.js");
	}

	function hook_render_article($article) {
		$article["link"] = str_replace('www.theregister.co.uk', 'm.theregister.co.uk', $article["link"]);

		return $article;
	}

	function api_version() {
		return 2;
	}

}
?>
