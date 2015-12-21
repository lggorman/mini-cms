<?php

class User {

	var $username;
	var $password;

	function __construct($uname, $pass) {
		$this->username = $uname;
		$this->password = $pass;
	}

	function authenticate() {
		$admin = new Admin;
		$user = $admin->findUser($this->username);
		if($user && $user->password == $this->password) {
			return true;
		} else {
			return false;
		}

	}

	
}