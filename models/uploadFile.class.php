<?php
class upLoadFile
{
	function upload($tmp_name,$name)
	{
		move_uploaded_file($tmp_name,'sources/images_load/'.$name);
	}		
}
?>