<?php



function parseUrl(){
    switch ($_GET['q']) {
	case 'uploadForm': {
	  showUploadForm();
	  break;
	}
    }
}

function showUploadForm() {
echo <<<EOF
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="foo" value=""/>
    <input type="submit" value="Upload File"/>
</form>
EOF;
}

parseUrl();

?>
