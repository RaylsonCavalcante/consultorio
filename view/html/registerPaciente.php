<!DOCTYPE html>
<html>
<head>
	<title>Agendamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script language="javascript" type="text/javascript" src="../js/funcaoJavascript.js"></script>
</head>
<body id="bodyRegisterPaciente">
<center>
<fieldset id="fieldsetRegisterPaciente">
    <center><h1 id="AGENDAR">AGENDAR</h1></center>
<center>
<form method="post" action="../../controller/controllerRegister.php?ctrl=registerPaciente" name="register">
<?php  
    $id = $_GET['id'];
    session_start();
    $_SESSION['id'] = $id;
?>
	<br>
	<input type="text" class="form-control" placeholder="Nome" name="nameRegisterPaciente" id="nameRegisterPaciente" />
	<br>
    <input type="text" class="form-control" placeholder="Descrição" name="descricaoRegisterPaciente" id="descricaoRegisterPaciente" />
    <br>
	<input type="date" class="form-control" name="dateRegisterPaciente" id="dateRegisterPaciente" />
    <br>
    <input type="time" class="form-control" name="timeRegisterPaciente" id="timeRegisterPaciente" value="00:00">
    <br>
    <input type="text" class="form-control" placeholder="(92) 99999-9999" name="contactRegisterPaciente" id="contactRegisterPaciente">
    <br>
</form>
    <button class="btn btn-primary" onclick="camp_RegisterPaciente()" title="Agendar">Agendar</button><br><br>
    <a type="button" class="btn btn-danger" onclick="history.go(-1)" title="Cancelar">Cancelar</a><br><br>
</center>
</fieldset>
</center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>