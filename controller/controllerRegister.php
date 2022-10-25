<?php
	require_once ("../model/connect.php");
	require_once ("../model/Paciente.php");
	require_once ("../model/Medico.php");

	$Paciente = new Paciente();
	$medico = new Medico();

	$ctrl = $_GET['ctrl'];

	if ($ctrl == 'registerMedico') {
		$medico->name = $_POST['name'];
		$medico->login = $_POST['login'];
		$medico->pass = $_POST['pass'];

		$sql = mysqli_query($connect,"SELECT * FROM medico WHERE login = '$medico->login' ");
		$num = mysqli_num_rows($sql);

		if ($num > 0) {
			echo "<script language='javascript' type='text/javascript'>
					alert('Usuário existente com o mesmo Login')
					window.location.href='../view/html/registerMedico.html'
				  </script>";
		}else{
			if ($medico->register($connect)) {
				echo "<script language='javascript' type='text/javascript'>
						alert('Cadastro realizado com sucesso!')
						window.location.href='../view/html/login.html'
					  </script>";
			}
		}
	}

	if ($ctrl == 'registerPaciente') {
		$Paciente->name = $_POST['nameRegisterPaciente'];
		$Paciente->descricao = $_POST['descricaoRegisterPaciente'];
		$Paciente->date = $_POST['dateRegisterPaciente'];
		$Paciente->time = $_POST['timeRegisterPaciente'];
		$Paciente->contact = $_POST['contactRegisterPaciente'];

		$sql = mysqli_query($connect,"SELECT * FROM paciente WHERE date = '$Paciente->date' AND time = '$Paciente->time' ");
		$num = mysqli_num_rows($sql);
		if ($num > 0) {
			session_start();
			$id = $_SESSION['id'];
			$sql = mysqli_query($connect, "SELECT * FROM medico WHERE id = '$id'");
			$idMedico = mysqli_fetch_object($sql);
			echo "<script language='javascript' type='text/javascript'>
					alert('Horário Reservado!')
					window.location.href='../view/html/registerPaciente.php?id=$idMedico->id'
				  </script>";
		}else{
			session_start();
			$id = $_SESSION['id'];
			$sql = mysqli_query($connect, "SELECT * FROM medico WHERE id = '$id'");
			$idMedico = mysqli_fetch_object($sql);

			if ($Paciente->register($connect,$idMedico->id)) {
				echo "<script language='javascript' type='text/javascript'>
						alert('Agendamento realizado com sucesso!')
						window.location.href='../view/html/agenda.php'
					  </script>";
			}
		}
	}

	if($ctrl == 'login'){

		$medico->login=$_POST['login'];
		$medico->pass=$_POST['pass'];
		session_start();
		$_SESSION['login'] = $medico->login;

			$sql = mysqli_query($connect, "SELECT * FROM medico WHERE login = '$medico->login' and pass = '$medico->pass' ");
			$login = mysqli_num_rows($sql);
			

			if ($login > 0) {
				echo "<script language='javascript' type='text/javascript'>
						alert('Login realizado com sucesso!')
						window.location.href='../view/html/agenda.php'
					  </script>";
			}else{
				echo "<script language='javascript' type='text/javascript'>
						alert('Login ou Senha inválido!')
						window.location.href='../view/html/login.html'
					  </script>";
			}
	}

	if ($ctrl == 'change') {
		$Paciente->name = $_POST['namePacienteEdit'];
		$Paciente->descricao = $_POST['descricaoPacienteEdit'];
		$Paciente->date = $_POST['datePacienteEdit'];
		$Paciente->time = $_POST['timePacienteEdit'];
		$Paciente->contact = $_POST['contactPacienteEdit'];
		$sql = mysqli_query($connect, "SELECT * FROM paciente WHERE date = '$Paciente->date' AND time = '$Paciente->time' ");
		$num = mysqli_num_rows($sql);
		$idsql = mysqli_fetch_object($sql);
		if ($num > 0) {
			session_start();
			$idP = $_SESSION['id'];
			$sql = mysqli_query($connect, "SELECT * FROM paciente WHERE id = '$idP'");
			$idPaciente = mysqli_fetch_object($sql);
			if ($idsql->id == $idPaciente->id) {
				$id = $_GET['id'];
				if ($Paciente->change($connect,$id)) {
				echo "<script language='javascript' type='text/javascript'>
						alert('Alterações salvos com sucesso!')
						window.location.href='../view/html/agenda.php'
					  </script>";
				}	
			}else{
				echo "<script language='javascript' type='text/javascript'>
						alert('Horário Reservado!')
						window.location.href='../view/html/edit.php?id=$idPaciente->id'
					  </script>";	
			}
		}else{
			$id = $_GET['id'];
			if ($Paciente->change($connect,$id)) {
			echo "<script language='javascript' type='text/javascript'>
					alert('Alterações salvos com sucesso!')
					window.location.href='../view/html/agenda.php'
				  </script>";
			}
		}	
	}

	if ($ctrl == 'erase') {
		$id = $_GET['id'];
		if ($Paciente->erase($connect,$id)) {
			echo "<script language='javascript' type='text/javascript'>
					alert('Excluido com sucesso!')
					window.location.href='../view/html/agenda.php'
				  </script>";	
		}
	}

	if ($ctrl == 'ok') {
		$id = $_GET['id'];
		if ($Paciente->ok($connect,$id)) {
			echo "<script language='javascript' type='text/javascript'>
					alert('Atendimento finalizado!')
					window.location.href='../view/html/agenda.php'
				  </script>";	
		}
	}

	if ($ctrl == 'eraseA') {
		$id = $_GET['id'];
		if ($Paciente->eraseA($connect,$id)) {
			echo "<script language='javascript' type='text/javascript'>
					alert('Excluido com sucesso!')
					window.location.href='../view/html/agenda.php'
				  </script>";	
		}
	}

?>