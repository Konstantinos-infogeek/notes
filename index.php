<?php
?>
<!DOCTYPE HTML >
<html>
	<head>
		<meta lang="en" >
		<meta charset="UTF-8" >
		<meta name="viewport" content="width=device-width" />
		
		<link rel="stylesheet" type="text/css" media="screen" href="stylesheet/css.css"  />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		
		<title>Note Taking</title>
	</head>
	<body>		
		<div id="wrapper">
			<header>
				<h1>Note Taking</h1>
				<h5 id="notifications" style="display: none;">Post Saved!</h5>
			</header>
			<hr>
			<form id="notes-form" name="notes-form" method="post" action="includes/save-note.php" >
				
				<label for="title">Title</label>
				<input id="title" name="title" type="text" maxlength="50"  required="required" />
				
				<label for="note-text">Take a Note</label>
				<textarea id="note-text" name="note-text" rows="20" cols="30"></textarea>
				
				<input id="save-note" name="save-note" type="submit" value="Save Note">
			</form>
			<hr>
			<section id="previous-notes">
			</section>
		</div>
		
		
		<script type="text/javascript" src="javascript/pagehandler.js"></script>	
	</body>
</html>

