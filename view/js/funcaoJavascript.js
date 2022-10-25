//funcao camp_Login() da tela de LOGIN
function camp_Login(){
    var login = document.getElementById("login").value;
    var pass = document.getElementById("pass").value;

    if(login != "" && pass != ""){
        document.forms["login"].submit();
    }else{
        alert("Preencha todos os campos!");
    }
}
//funcao camp_RegisterMedico() da tela de Cadastro Médico
function camp_RegisterMedico(){

    var name = document.getElementById("nameMedico").value;
    var login = document.getElementById("loginMedico").value;
    var pass = document.getElementById("passMedico").value;

    if(name != "" && login !="" && pass != ""){
        document.forms["register"].submit();
    }else{
        alert("Preencha todos os campos!");
    }

}
//funcao camp_EditPaciente()
function camp_EditPaciente(){

	var namePacienteEdit = document.getElementById('namePacienteEdit').value;
	var descricaoPacienteEdit = document.getElementById('descricaoPacienteEdit').value;
	var datePacienteEdit = document.getElementById('datePacienteEdit').value;
	var timePacienteEdit = document.getElementById('timePacienteEdit').value;
	var contactPacienteEdit = document.getElementById('contactPacienteEdit').value;;
	
	if (namePacienteEdit != "" && descricaoPacienteEdit != "" && datePacienteEdit != "" && timePacienteEdit != "" && contactPacienteEdit != "") {
	c = confirm("Deseja salvar alteração?");
		if (c == true) {
			document.forms['change'].submit();
		}null;
	}else{
		alert("Preencha todos os campos!");
	}
}
//funcao camp_RegisterPaciente()
function camp_RegisterPaciente(){

    var nameRegisterPaciente = document.getElementById("nameRegisterPaciente").value;
    var descricaoRegisterPaciente = document.getElementById("descricaoRegisterPaciente").value;
    var dateRegisterPaciente = document.getElementById("dateRegisterPaciente").value;
    var timeRegisterPaciente = document.getElementById("timeRegisterPaciente").value;
    var contactRegisterPaciente = document.getElementById("contactRegisterPaciente").value;

    if(nameRegisterPaciente != "" && descricaoRegisterPaciente != "" && dateRegisterPaciente !="" && timeRegisterPaciente != "" && timeRegisterPaciente != "00:00" && contactRegisterPaciente != ""){
        document.forms["register"].submit();
    }else{
        alert("Preencha todos os campos!");
    }
}