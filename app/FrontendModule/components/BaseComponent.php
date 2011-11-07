<?php
abstract class BaseComponent extends Control {
	public function __construct(/*Nette\*/IComponentContainer $parent = NULL, $name = NULL) {
		parent::__construct($parent, $name);
		$this->startUp();
	}

	public function render() {
		$this->beforeRender();
		$this->getTemplate()->render();

	}

	protected function createTemplate() {
		$template = parent::createTemplate();

		$componentName = strtr($this->getReflection()->getName(), array("Component" => ""));

		$template->setFile(
				dirname(__FILE__) . "/" .
				$componentName . "/" .
				ExtraString::lowerFirst($componentName) . ".phtml"
		);

		return InterlosTemplate::loadTemplate($template);
	}

	protected function getPath() {
		$componentName = strtr($this->getReflection()->getName(), array("Component" => ""));
		return dirname(__FILE__) . "/" . $componentName . "/";
	}

	protected function beforeRender() {

	}

	protected function createComponentFlashMessages($name) {
		return new FlashMessagesComponent($this, $name);
	}

	protected function startUp() {}
}
