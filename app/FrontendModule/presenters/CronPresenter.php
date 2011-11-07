<?php
class Frontend_CronPresenter extends Frontend_BasePresenter
{

	public function renderDatabase($key) {
		Interlos::resetTemporaryTables();
	}

	protected function startup() {
		parent::startup();
		if ($this->getParam("key") != Environment::getConfig("cron")->key) {
			die("PERMISSION DENIED");
		}
	}

}
