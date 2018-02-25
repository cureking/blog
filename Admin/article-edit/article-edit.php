<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/25/2018
 * Time: 13:33
 */
session_start();
?>
<?php
$htmlTitle = $htmlContent = $htmlTag = '';
if (!empty($_POST['article'])) {
    if (get_magic_quotes_gpc()) {
        $htmlTitle = stripslashes($_POST['article']['title']);
        $htmlContent = stripslashes($_POST['article']['content']);
        $htmlTag = stripslashes($_POST['article']['tag']);
    } else {
        $htmlTitle = $_POST['article']['title'];
        $htmlContent = $_POST['article']['content'];
        $htmlTag = $_POST['article']['tag'];
    }
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>KindEditor PHP</title>
	<link rel="stylesheet" href="model_Article-edit/themes/default/default.css"/>
	<link rel="stylesheet" href="./model_Article-edit/plugins/code/prettify.css"/>
	<script charset="utf-8" src="./model_Article-edit/kindeditor-all-min.js"></script>
	<script charset="utf-8" src="./model_Article-edit/lang/zh-CN.js"></script>
	<script charset="utf-8" src="./model_Article-edit/plugins/code/prettify.js"></script>
	<script>
	KindEditor.ready( function( K ){
		var editor1 = K.create( 'textarea[id="content"]', {
			cssPath: '../plugins/code/prettify.css',
			uploadJson: '../php/upload_json.php',
			fileManagerJson: '../php/file_manager_json.php',
			allowFileManager: true,
			afterCreate: function(){
				var self = this;
				K.ctrl( document, 13, function(){
					self.sync();
					K( 'form[name=example]' )[ 0 ].submit();
				} );
				K.ctrl( self.edit.doc, 13, function(){
					self.sync();
					K( 'form[name=example]' )[ 0 ].submit();
				} );
			}
		} );
		prettyPrint();
	} );
	</script>
</head>
<body>
	<!--测试，收到的内容，便于编辑-->
    <?php @print_r($_POST['article']) ?>
	<form name="example" action="./action.php?handler=doarticleedit" method="post">
		<label for="title">标题</label>
		<input type="text" name="title" id="title"><?php echo htmlspecialchars($htmlTitle); ?></input>
		<br/>
		<textarea name="content" id="content" style="width:700px;height:500px;visibility:hidden;"><?php echo htmlspecialchars($htmlContent); ?></textarea>
		<br/>
		<label for="title">标签</label>
		<input type="text" name="tag" id="tag"><?php echo htmlspecialchars($htmlTag); ?></input>
		<br/>
		<input type="submit" name="button" value="提交内容"/> (提交快捷键: Ctrl + Enter)
	</form>
</body>
</html>

