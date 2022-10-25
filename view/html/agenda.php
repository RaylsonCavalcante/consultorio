<!DOCTYPE html>
<?php
	include "../../model/connect.php";
?>
<html>
<head>
	<title>Agenda</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
    <script language="javascript" type="text/javascript" src="../js/funcaoJavascript.js"></script>
	<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/jQuery.js"></script>
</head>
<?php  
	session_start();
	$login = $_SESSION['login'];
	$medico = mysqli_query($connect, "SELECT * FROM medico WHERE login = '$login' and id");
	$idMedico = mysqli_fetch_object($medico);

	$sql = mysqli_query($connect, "SELECT * FROM paciente WHERE idMedico = '$idMedico->id' AND atendido = '' ORDER BY date,time ");
	$num = mysqli_num_rows($sql);
?>
<body id="bodyAgenda">
<center>
<fieldset id="fieldsetAgenda">
<h1 id="MEDICO"><?= $idMedico->name ?></h1>
<table id="tableButton">
	<tr>
		<td id="tdAgenda">
			<center>
		<button id="btnAgenda" name="" type="button" title="Agenda">Agenda</button>
			</center>
		</td>
		<?php
			$sql2 = mysqli_query($connect, "SELECT * FROM paciente WHERE idMedico = '$idMedico->id' and atendido = 'OK' ");
			$num1 = mysqli_num_rows($sql2);
			
			if ($num1 > 0) {
		?>
		<td id="tdAtendimentos">
			<center>
		<button id="btnAtendimentos" type="button" title="Atendimentos Finalizados">Atendimentos Finalizados</button>
			</center>
		</td>
		<?php
			}
		?>
		<td id="tdAgendar">
			<center>
		<button id="btnAgendar" onclick="javascript:location.href='registerPaciente.php?id=<?=$idMedico->id?>'" title="Agendar">Agendar Paciente</button>
			</center>
		</td>
	</tr>
</table>

<?php
		$sql3 = mysqli_query($connect, "SELECT * FROM paciente WHERE idMedico = '$idMedico->id' and atendido = 'OK' ");
		$num2 = mysqli_num_rows($sql2);
		
		if ($num2 > 0) {
?>
<div id="divAtendimentos">
	<!--<button id="btnJaneiro">Janeiro</button>
	<button id="btnFevereiro">Fevereiro</button>-->

<h1 id="PACIENTESATENDIDOS"><center>Pacientes Atendidos</center></h1>
<br>
<?php  
	$login = $_SESSION['login'];
	$medico = mysqli_query($connect, "SELECT * FROM medico WHERE login = '$login' and id");
	$idMedico = mysqli_fetch_object($medico);

	$sql = mysqli_query($connect, "SELECT * FROM paciente WHERE idMedico = '$idMedico->id' AND atendido = 'OK' ORDER BY date,time");
	$num = mysqli_num_rows($sql);
	
	if ($num > 0) {
		
?>
<center><table id="tableListaAtendidos">
			<tr id="trInfoLista">
				<td id="tdPacientesAtendidos"><center>Pacientes</center></td>
				<td id="tdDescricaoAtendidos"><center>Descrição</center></td>
				<td id="tdDiaAtendidos"><center>Dia</center></td>
				<td id="tdHoraAtendidos"><center>Hora</center></td>
				<td id="tdContatoAtendidos"><center>Contato</center></td>
				<td id="tdExcluirAtendidos"><center>Excluir</center></td>
			</tr>
<?php
		while($mostrar = mysqli_fetch_object($sql)){
			$date = $mostrar->date;
			$Mostrartime = substr($mostrar->time,0,-8);
			echo "<tr></tr>
				  <tr></tr>
				  <tr></tr>
				  <tr id='trInfoListagem'>
					<td id='tdGreen'>$mostrar->name</td>
					<td id='tdGreen'><center>$mostrar->descricao</center></td>
					<td id='tdGreen'><center>".substr($date,-2).'/'.substr($date,-5,2)."</center></td>
					<td id='tdGreen'><center>$Mostrartime</center></td>
					<td id='tdGreen'><center>$mostrar->contact</center></td>
					<td id='tdExcluirbtn'><center><button id='btnExcluir' onclick='javascript:c = confirm(\"Deseja realmente excluir?\"); if(c == true){ document.location.href=\"../../controller/controllerRegister.php?ctrl=eraseA&id=$mostrar->id\";}null;' title='Excluir'>Excluir</button></center></td>
				  </tr>";
			}
	}else{
			echo "<center><p id='NenhumAtendimento'>Nenhum atendimento finalizado!</p></center>";
			echo "<br>";
		}
?>
</table></center>
</div>
<?php } ?>

<div id="divAgenda">
<h1 id="PACIENTESAGENDADOS"><center>Pacientes Agendados</center></h1>
<br>
<?php
	$login = $_SESSION['login'];
	$medico = mysqli_query($connect, "SELECT * FROM medico WHERE login = '$login' and id");
	$idMedico = mysqli_fetch_object($medico);

	$sql = mysqli_query($connect, "SELECT * FROM paciente WHERE idMedico = '$idMedico->id' AND atendido = '' ORDER BY date,time ");
	$num = mysqli_num_rows($sql);

	if ($num > 0) {
?>
<center><table id="tableListaAgenda">
			<tr id="trInfoLista">
				<td id="tdPacientesAgendas"><center>Pacientes</center></td>
				<td id="tdDescricaoAgendas"><center>Descrição</center></td>
				<td id="tdDiaAgendas"><center>Dia</center></td>
				<td id="tdHoraAgendas"><center>Hora</center></td>
				<td id="tdContatoAgendas"><center>Contato</center></td>
				<td id="tdAlterarAgendas"><center>Alterar</center></td>
				<td id="tdExcluirAgendas"><center>Excluir</center></td>
				<td id="tdATDAgendas"><center>ATD</center></td>
			</tr>
<?php
		while($mostrar = mysqli_fetch_object($sql)){
			$Mostrartime = substr($mostrar->time,0,-8);
			$H = date("H") - 5;
			if (($mostrar->date == date('Y-m-d') && $Mostrartime < date($H.':i')) || ($mostrar->date < date('Y-m-d'))) {
			$date = $mostrar->date;
			echo "<tr></tr>
				  <tr></tr>
				  <tr></tr>
				  <tr id='trInfoListagem'>
					<td id='tdRed'>$mostrar->name</td>
					<td id='tdRed'><center>$mostrar->descricao</center></td>
					<td id='tdRed'><center>".substr($date,-2).'/'.substr($date,-5,2)."</center></td>
					<td id='tdRed'><center>$Mostrartime</center></td>
					<td id='tdContactRed'><center>$mostrar->contact</center></td>
					<td id='tdAlterarbtn'><center><button id='btnAlterar' onclick='javascript:location.href=\"edit.php?id=$mostrar->id\"' title='Alterar'>Alterar</button></center></td>
					<td id='tdExcluirbtn'><center><button id='btnExcluir' onclick='javascript:c = confirm(\"Deseja realmente excluir?\"); if(c == true){ document.location.href=\"../../controller/controllerRegister.php?ctrl=erase&id=$mostrar->id\";}null;' title='Excluir'>Excluir</button></center></td>
					<td id='tdOkbtn'><center><button id='btnOk' onclick='javascript:c = confirm(\"Deseja finalizar Atendimento?\"); if(c == true){ document.location.href=\"../../controller/controllerRegister.php?ctrl=ok&id=$mostrar->id\";}null;' title='OK'>OK</button></center></td>
				  </tr>";
			}else{
				$Mostrartime = substr($mostrar->time,0,-8);
				$H = date("H") - 5;
				if(($mostrar->date >= date('Y-m-d') && $Mostrartime <> date($H.':i')) || ($Mostrartime == date($H.':i'))) {
					if(($mostrar->date == date('Y-m-d'))) {
						$date = $mostrar->date;
						echo "<tr></tr>
							  <tr></tr>
							  <tr></tr>
								<tr id='trInfoListagem'>
									<td id='tdGreen'>$mostrar->name</td>
									<td id='tdGreen'><center>$mostrar->descricao</center></td>
									<td id='tdGreen'><center>HOJE</center></td>
									<td id='tdGreen'><center>$Mostrartime</center></td>
									<td id='tdContactGreen'><center>$mostrar->contact</center></td>
									<td id='tdAlterarbtn'><center><button id='btnAlterar' onclick='javascript:location.href=\"edit.php?id=$mostrar->id\"' title='Alterar'>Alterar</button></center></td>
									<td id='tdExcluirbtn'><center><button id='btnExcluir' onclick='javascript:c = confirm(\"Deseja realmente excluir?\"); if(c == true){ document.location.href=\"../../controller/controllerRegister.php?ctrl=erase&id=$mostrar->id\";}null;' title='Excluir'>Excluir</button></center></td>
									<td id='tdOkbtn'><center><button id='btnOk' onclick='javascript:c = confirm(\"Deseja finalizar Atendimento?\"); if(c == true){ document.location.href=\"../../controller/controllerRegister.php?ctrl=ok&id=$mostrar->id\";}null;' title='OK'>OK</button></center></td>
								  </tr>";

					}else{
						$date = $mostrar->date;
						echo "<tr></tr>
							  <tr></tr>
							  <tr></tr>
							  <tr id='trInfoListagem'>
								<td id='tdWhite'>$mostrar->name</td>
								<td id='tdWhite'><center>$mostrar->descricao</center></td>
								<td id='tdWhite'><center>".substr($date,-2).'/'.substr($date,-5,2)."</center></td>
								<td id='tdWhite'><center>$Mostrartime</center></td>
								<td id='tdContactWhite'><center>$mostrar->contact</center></td>
								<td id='tdAlterarbtn'><center><button id='btnAlterar' onclick='javascript:location.href=\"edit.php?id=$mostrar->id\"' title='Alterar'>Alterar</button></center></td>
								<td id='tdExcluirbtn'><center><button id='btnExcluir' onclick='javascript:c = confirm(\"Deseja realmente excluir?\"); if(c == true){ document.location.href=\"../../controller/controllerRegister.php?ctrl=erase&id=$mostrar->id\";}null;' title='Excluir'>Excluir</button></center></td>
								<td id='tdOkbtn'><center><button id='btnOk' onclick='javascript:c = confirm(\"Deseja finalizar Atendimento?\"); if(c == true){ document.location.href=\"../../controller/controllerRegister.php?ctrl=ok&id=$mostrar->id\";}null;' title='OK'>OK</button></center></td>
							  </tr>";
					}
				}
			}
		}
	}else{
			echo "<center><p id='NenhumAgendado'>Nenhum paciente agendado!</p></center>";
			echo "<br>";
		}
?>
</table></center>
</div>
</fieldset>
</center>
<br><br><br><br>
<center>
	<!--<button id="btnSair" type="button" onclick="javascript:location.href='login.html'" title="Sair">Sair</button>-->
</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>