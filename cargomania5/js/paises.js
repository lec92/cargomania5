
	$(function() {
    var availableTags = [
      "Belice",
	  "Costa Rica",
      "El Salvador",
	  "Guatemala",
      "Honduras",
	  "Nicaragua",
      "Panamá",
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
 