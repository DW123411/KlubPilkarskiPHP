<?php

namespace Views;

class AppView extends View {

		public function  __construct() {
			parent::__construct();
      		$this->setAssets();
			if(\Tools\Access::islogin() === true) {
				$this->set('isLogin',true); 
				$this->set('userName',\Tools\Access::get(\Tools\Access::$name));
			}
		}

}
