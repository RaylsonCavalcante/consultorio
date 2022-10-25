$(document).ready(function () {        
	$("#btnAgenda").click(function() {
		$("#divAgenda").show("slow");     
		$("#divAtendimentos").css("display","none");
	});

	$("#btnAtendimentos").click(function() {
		$("#divAtendimentos").show("slow");
		$("#divAgenda").css("display","none");
	});
});