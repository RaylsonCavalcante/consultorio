<!DOCTYPE html>
<?php
	include "../../model/connect.php";
?>
<html>
<head>
	<title>Editar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <script language="javascript" type="text/javascript" src="../js/funcaoJavascript.js"></script>
</head>
<body id="bodyEdit">
<center>
<fieldset id="fieldsetEditPaciente">
    <center><h1 id="EDITAR">EDITAR</h1></center>
<?php
    	$id = $_GET['id'];
    	$id = $_REQUEST['id'];
        $sql = mysqli_query($connect, "SELECT * FROM paciente WHERE id LIKE '$id' ");
        $mostrar = mysqli_fetch_object($sql);
     	$id = $_GET['id'];
     	$time = substr($mostrar->time,0,-8);
     	session_start();
     	$_SESSION['id'] = $id;
?>	
	<center>
	<form method="post" action="../../controller/controllerRegister.php?ctrl=change&id=<?= $mostrar->id?>" name="change">
		<br>
		<input type="text" class="form-control" name="namePacienteEdit" id="namePacienteEdit" placeholder="Nome" value="<?= $mostrar->name?>" />
		<br>
		<input type="text" class="form-control" name="descricaoPacienteEdit" id="descricaoPacienteEdit" placeholder="Descrição" value="<?= $mostrar->descricao?>" />
		<br>
		<input type="date" class="form-control" name="datePacienteEdit" id="datePacienteEdit" value="<?= $mostrar->date?>" />
		<br>
		<input type="time" class="form-control" name="timePacienteEdit" id="timePacienteEdit" value="<?= $time?>" />
		<br>
		<input type="text" class="form-control" name="contactPacienteEdit" id="contactPacienteEdit" placeholder="(92) 99999-9999" value="<?= $mostrar->contact?>" /><br><br>
	</form>
		<button class="btn btn-primary" onclick="camp_EditPaciente()" title="Salvar">Salvar</button><br><br>
	    <a type="button" class="btn btn-danger" onclick="history.go(-1)" title="Cancelar">Cancelar</a><br><br>
	</center>
</fieldset>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>