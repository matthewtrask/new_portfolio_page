<?php 
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>

<form action='' method='post'>

	<p><label>Title</label><br />
	<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

	<p><label>Description</label><br />
	<textarea name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>

	<p><label>Content</label><br />
	<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

	<p><input type='submit' name='submit' value='Submit'></p>

</form>

<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
</script>