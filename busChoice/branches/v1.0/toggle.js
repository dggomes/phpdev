// JQUERY

jQuery(document).ready(function($){
jQuery.fx.off = true;

//Default jQuery function------

/*

	$(buttonDiv).click(function() {
	  $(toggledDiv).toggle(function() {
	  });
	  $(hiddenDivs).hide(function() {
	  });
	});

*/

//---------------------

	$('#displayBus17').click(function() {
	  $('#bus17').toggle(function() {
	  });
	  $("#bus153, #bus91, #tube, #TFL").hide(function() {
	  });
	});
	
	$('#displayBus153').click(function() {
	  $('#bus153').toggle(function() {
	  });
	  $("#bus17, #bus91, #tube, #TFL").hide(function() {
	  });
	
	});
	
	$('#displayBus91').click(function() {
	  $('#bus91').toggle(function() {
	  });
	  $("#bus153, #bus17, #tube, #TFL").hide(function() {
	  });
	
	});
	
	$('#displayTube').click(function() {
	  $('#tube').toggle(function() {
	  });
	  $("#bus153, #bus91, #bus17, #TFL").hide(function() {
	  });
	
	});
	
	$('#displayTFL').click(function() {
	  $('#TFL').toggle(function() {
	  });
	  $("#bus153, #bus91, #tube, #bus17").hide(function() {
	  });
	
	});

});