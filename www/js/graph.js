// execute when the page is ready
$( document ).ready(function() {
	// when the select option changes update the graph element source data file
	$('select').on('change', function() {
		var patient = this.value;
		$( "#graph" ).empty();
		var patient_file = "/data/" + patient;
		g = new Dygraph(document.getElementById("graph"), patient_file, {});
	});
});