<?php
class FrontendModule {

	public static function createRouter($prefix = "/") {
		$router = new MultiRouter();

		$router[] = new Route($prefix . "<presenter>/<action>", array(
						"module"		=> "frontend",
						"presenter"		=> "default",
						"action"		=> "default"
		));

		return $router;
	}

	public static function getModuleDir() {
		return APP_DIR . "/FrontendModule";
	}

}

