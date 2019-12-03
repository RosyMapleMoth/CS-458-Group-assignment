$(document).ready(function() {
	//Load intial index.php
	$('#content').load('index.php');
	
	//Change content based on nav clicks
	$('div#topnav a').click(function() {
		var page = $(this).attr('href');
		$('#content').load(page + '.php');
		return false;
	})
});