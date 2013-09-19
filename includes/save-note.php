<?php
require_once 'class.database.php';

validate_note($_POST);
header('Location: ../index.php');


function validate_note($post){
	$output = new stdClass();	
	if( isset( $post['title'] ) && isset( $post['note-text'] ) ){
		save_note( $post['title'], $post['note-text'] );
	}
}

function save_note($title, $note){
	$db = new Database('localhost', 'services', 'root', '');
	
	$db->insert('notes', array(
			'title' => validate_string( $title ),
			'note' => validate_string( $note ),
	));
} 

function validate_string($string){
	if( is_string($string) ){		
		return $string;
	}	
	return false;
}