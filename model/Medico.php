<?php
	include 'connect.php';

	class Medico{

		public $name;
		public $login;
		public $pass;

		public function register($connect){

			$sql = mysqli_query($connect,"INSERT INTO medico(name,login,pass) VALUES ('$this->name','$this->login','$this->pass')");

			return true;
		}
	}
?>