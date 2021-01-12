<?php
	namespace Controllers;

	use \Tools\FlashMessage;

	class Access extends Controller {
		// formularz logowania
		public function logForm(){
      		$this->view->setTemplate('Access/logForm');
		}
		public function regForm(){
      		$this->view->setTemplate('Access/regForm');
		}
		// loguje do systemu
		public function login(){
			$model = $this->createModel('Access');
			if($this->getPost('login')  !== null && $this->getPost('password') !== null) {
				if($model->login($this->getPost('login'),md5($this->getPost('login').md5($this->getPost('password')))))
					$this->redirect('');
			}
			$this->redirect('formularz-logowania/');
		}
		public function register(){
			$model = $this->createModel('Access');
			if($this->getPost('login') !== null && $this->getPost('haslo') !== null && $this->getPost('imie') !== null && $this->getPost('nazwisko') !== null) {
				if($model->register($this->getPost('login'),$this->getPost('imie'),$this->getPost('nazwisko'),md5($this->getPost('login').md5($this->getPost('haslo')))))
					$this->redirect('');
			}
			$this->redirect('formularz-rejestracji/');
		}
		public function editUser($id) {
     		$this->view->setTemplate('Access/addUpd');
      		$model = $this->createModel('Access');
     		$result['data'] = $model->selecteOneById($id);
     		return $result;
    	}
    	public function editPassword($id) {
     		$this->view->setTemplate('Access/addUpdPassword');
      		$model = $this->createModel('Access');
     		$result['data'] = $model->selecteOneById($id);
     		return $result;
    	}
    	public function update() {
      		$this->check(['id', 'imie', 'nazwisko'], $_POST);
      		$model = $this->createModel('Access');
      		$result = $model->edytujUzytkownika($_POST['id'],$_POST['imie'],$_POST['nazwisko']);
      		FlashMessage::addMessage($result, 'update');
      		$this->redirect('');
    	}
    	public function updatePassword() {
      		$this->check(['id', 'haslo'], $_POST);
      		$model = $this->createModel('Access');
      		$result = $model->zmienHaslo($_POST['id'],md5($_SESSION['user'].md5($_POST['haslo'])));
      		FlashMessage::addMessage($result, 'update');
      		$this->redirect('');
    	}
		// wylogowywuje z systemu
		public function logout(){
			$this->createModel('Access')->logout();
			$this->redirect('formularz-logowania/');
		}
	}
