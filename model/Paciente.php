<?php
	include "connect.php";

	class Paciente{

		public $name;
		public $descricao;
		public $date;
		public $time;
		public $contact;
		public $idMedico;

		public function register($connect,$id){

			$sql = mysqli_query($connect, "INSERT INTO paciente (name,descricao,date,time,contact,idMedico,atendido) VALUES ('$this->name','$this->descricao','$this->date','$this->time','$this->contact','$id','')");

			return true;
		}

		public function change($connect,$id){

			$id = $_GET['id'];
			$sql = mysqli_query($connect, "UPDATE paciente SET name = '$this->name', descricao = '$this->descricao', date = '$this->date', time = '$this->time', contact = '$this->contact' WHERE id = '$id' ");

			return true;
		}

		public function erase($connect,$id){
			
			$id = $_GET['id'];
			$sql = mysqli_query($connect, "DELETE FROM paciente WHERE id = '$id' ");

			return true;
		}

		public function ok($connect,$id){
			
			$id = $_GET['id'];
			$sql = mysqli_query($connect, "UPDATE paciente SET atendido = 'OK' WHERE id = '$id' ");

			return true;
		}

		public function eraseA($connect,$id){
			
			$id = $_GET['id'];
			$sql = mysqli_query($connect, "DELETE FROM paciente WHERE id = '$id' ");

			return true;
		}
	}

?>