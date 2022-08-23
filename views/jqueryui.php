<?php

$title = 'Jquery Ui';
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/layouts/navbar.php';

?>

<div class="container mt-3">
	<!-- Modal -->
	<div class="row">
		<div class="col-md-12">
			<h5>Modal</h5>
			<button class="btn btn-primary" id="opener">Open Modal</button>
			<div id="dialog" title="Dialog Title">I'm a Modal</div>
		</div>
	</div>

	<!-- Datepicker -->
	<div class="row mt-3">
		<div class="col-md-12">
			<h5>Datepicker</h5>
			<p>Date: <input type="text" id="datepicker"></p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h5>Progress bar</h5>
			<div id="progressbar"></div>
		</div>
	</div>

</div>

<script>

	// Modal
	$( "#dialog" ).dialog({ autoOpen: false });
	$( "#opener" ).click(function() {
		$( "#dialog" ).dialog( "open" );
	});

	// Datepicker
	$( function() {
    	$( "#datepicker" ).datepicker();
  	});

	// Progress bar
	$( function() {
		$( "#progressbar" ).progressbar({
		value: 37
		});
  	});

</script>

<?php

require_once __DIR__ . '/layouts/footer.php';