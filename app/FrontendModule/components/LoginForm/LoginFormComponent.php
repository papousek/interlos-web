<?php
class LoginFormComponent extends BaseComponent
{

    public function formSubmitted(Form $form) {
	$values = $form->getValues();

	try {
	    Environment::getUser()->login($values['name'], $values['password']);
	}
	catch(AuthenticationException $e) {
	    if ($e->getCode() == IAuthenticator::IDENTITY_NOT_FOUND) {
		$this->getPresenter()->flashMessage("Daný tým neexistuje.", "error");
	    }
	    else {
		$this->getPresenter()->flashMessage("Nesprávné heslo", "error");
	    }
	    return;
	}
	catch(Exception $e) {
	    $this->getPresenter()->flashMessage("Stala se neočekávaná chyba.", "error");
	    Debug::processException($e);
	    return;
	}
	$this->getPresenter()->redirect("Team:default");
    }

    // ---- PROTECTED METHODS

    protected function createComponentForm($name) {
	$form = new BaseForm($this, $name);

	$form->addText("name", "Název týmu")
	    ->addRule(Form::FILLED, "Název týmu musí být vyplněn.");

	$form->addPassword("password", "Heslo")
	    ->addRule(Form::FILLED, "Heslo musí být vyplněno.");

	$form->addSubmit("login", "Přihlásit se");
	$form->onSubmit[] = array($this, "formSubmitted");

	return $form;
    }

}
