<?php 
	$filePath = './Commdity/';
	if(!is_dir($filePath)) {
		mkdir($filePath);
	}

	$type = array("jpg", "gif", "bmp", "jpeg", "png");

	in_array((strtolower(substr(strchr($_FILES['file']['name'], '.'), 123))), $type); //判断文件后缀名是否是规定的文件后缀

	$fileType = implode(',', $type);//提示文件上传的格式类型
	$filename = time();
	$filename = $filename.(strchr($_FILES['file']['name'], '.')); //获取最后的文件名
	if(file_exists($filePath)) {
		$bool = move_uploaded_file($_FILES['file']['tmp_name'], $filePath.$_FILES['file']['name']);
		if($bool) {
			echo "文件上传成功";
		} else {
			echo "文件上传失败";
		}
	} else {
		$this->error("存放图片的文件夹不存在！");
	}

 ?>