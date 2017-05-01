<link rel="stylesheet" href="../assets/jqueryFileTree/jqueryFileTree.css">
<script src="../assets/jqueryFileTree/jqueryFileTree.js"></script>
<link rel="stylesheet" href="../assets/css/codemirror.css">
<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/codemirror/codemirror.js"></script>
<script src="../assets/js/codemirror/mode/xml/xml.js"></script>
<script src="../assets/js/codemirror/mode/css/css.js"></script>
<div class="saveblock"><span id="filename">Редактор</span><button type="button" class="btn btn-success savefile">Сохранить</button></div>
<div class="code">
	<textarea id="codeeditor">
	</textarea>
</div>
<script>
	var editor = CodeMirror.fromTextArea(document.getElementById('codeeditor'), {
		mode: 'xml',
		htmlMode: true,
		lineNumbers: true
	});
	var curfile = '';
	$(document).ready( function() {
		$(".savefile").click(function(){
	        $.post(
				"../admin/template/save_file",
				{
					filename: curfile,
					content: editor.getDoc().getValue()
				},
			  	function(data) {
					alert(data);
				}
			);
	    }); 
	    $('.files').fileTree({
	        script: '../admin/template/get_files',
	    }, function(file) {
	    	curfile = file;
	    	$('#filename').html(file);
	    	if(file == 'style.css') {
	    		editor.setOption('mode','css');
	    	} else {
	    		editor.setOption('mode','xml');
	    	}
	        $.post(
			  "../admin/template/get_file",
			  {
			    filename: file
			  },
			  onAjaxSuccess
			);
	    });

	    function onAjaxSuccess(data)
		{
		  	// Здесь мы получаем данные, отправленные сервером и выводим их на экран.
			editor.getDoc().setValue(data);
		}

	});
</script>

