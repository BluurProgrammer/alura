var daDestaque = function() {
	$(this).find(".remove-item").fadeIn();
	$(this).find(".altera-item").fadeIn();
}

var tiraDestaque = function() {
	$(this).find(".remove-item").fadeOut();
	$(this).find(".altera-item").fadeOut();
}

var aposInicializado = function() {
	$("tr").hover(daDestaque, tiraDestaque);
};

// $(aposInicializado);