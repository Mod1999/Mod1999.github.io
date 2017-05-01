<?php
class template extends Admin_Controller {
	public $dirs = "";
	function __Construct() {
        parent::__construct();
		$this->load->model('template_model');
    }
	
	public function index () {
		$this->data['subview'] = 'admin/template/index';
		$this->data['rblock'] = '
		<div class="files"></div>
		<div class="saveblock">
			
		</div>';
		$this->load->view('admin/layout_main',$this->data);
	}

	public function get_files() {
		$postdata = $this->input->post();
		$root = './application/views/';
		$postdata['dir'] = urldecode($postdata['dir']);
		if( file_exists($root . $postdata['dir']) ) {
			$files = scandir($root . $postdata['dir']);
			natcasesort($files);
			if( count($files) > 2 ) { /* The 2 accounts for . and .. */
				echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
				// All dirs
				foreach( $files as $file ) {
					if($file == 'admin')
						continue;
					if( file_exists($root . $postdata['dir'] . $file) && $file != '.' && $file != '..' && is_dir($root . $postdata['dir'] . $file) ) {
						echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . htmlentities($postdata['dir'] . $file) . "/\">" . htmlentities($file) . "</a></li>";
					}
				}
				// All files
				foreach( $files as $file ) {
					if($file == 'index.html')
						continue;
					if( file_exists($root . $postdata['dir'] . $file) && $file != '.' && $file != '..' && !is_dir($root . $postdata['dir'] . $file) ) {
						$ext = preg_replace('/^.*\./', '', $file);
						echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . htmlentities($postdata['dir'] . $file) . "\">" . htmlentities($file) . "</a></li>";
					}
				}
				if($postdata['dir'] == '/')
					echo '<li class="file ext_css"><a href="" rel="style.css">style.css</a></li>';
				echo "</ul>";	
			}
		}
	}

	public function get_file()
	{
		$postdata = $this->input->post();
		$root = './application/views/';
		$filename = $postdata['filename'];
		if($filename == 'style.css')
			$root = './assets/css/';
		echo file_get_contents($root.$filename);

	}

	public function save_file() {
		$postdata = $this->input->post();
		$filename = $postdata['filename'];
		$content = $postdata['content'];
		$root = './application/views/';
		if($filename == 'style.css')
			$root = './assets/css/';
		if(file_put_contents($root.$filename, $content))
			echo 'Файл '.$filename.' сохранен';
	}
}	
?>