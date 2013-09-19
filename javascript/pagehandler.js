;(function($){
		function loadPreviousNotes(){
			$('#previous-notes').load('includes/previous-notes.php #notes');
		}

		function postNote(){
			var t = id('title').value,
				n = $('.nicEdit-main')[0].textContent;
			
			$.ajax({
				  type: "POST",
				  url: "includes/save-note.php",
				  data: { title : t, 'note-text' : n},
				  success : function(data){
						$('#notifications').fadeIn(200, function(){
								$(this)
									.delay(500)
									.fadeOut(1000);
							});											

						loadPreviousNotes();
					  }
				});
				  
		}

		function id( elementID ){
			return document.getElementById( elementID );
		}

		$('#save-note').on('click', function(evt){
			evt.preventDefault();
			postNote();
			return false;
		});
		
		loadPreviousNotes();
})(jQuery);