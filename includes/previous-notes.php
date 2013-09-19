<?php
require_once 'class.database.php';

$db = new Database('localhost', 'services', 'root', '');

$db->get('notes', array( 'title', 'note' ) );

echo "<ul id='notes'>";
foreach ( $db->lastQuery['queryObject'] as $row ){
	echo "<li>";
	echo "<h3>".$row['title']."</h3>";
	echo "<p>".$row['note']."</p>";
	echo "</li>";
}
echo "</ul>";
