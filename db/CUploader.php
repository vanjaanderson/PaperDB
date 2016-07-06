<?php
class CUploader {
	public $target_dir = UPLOADS_FOLDER;
	public  $allowed_file_types = array(
		IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG
	);
	// Upload image and change name to papername
	public  function upload($file) {
		// $extension = pathinfo($file['name'],PATHINFO_EXTENSION);
		// $file['name'] = $papername.'.'.$extension;
		$return_file_path = '';
		//
		if (!$file['error']) {
			$target_file = $this->target_dir.$file['name'];
			//
			if (move_uploaded_file($file['tmp_name'], $target_file) || copy($file['tmp_name'], $target_file)) {
				$return_file_path = $target_file;
			}
		} 
		return $return_file_path;
	}
	//
	public function delete($filename) {
		if (file_exists($filename)) {
			return unlink($filename); // unlink removes and return true if success
		}
	}
	//
	public function valid($file) {
		return in_array(exif_imagetype($file['tmp_name']), $this->allowed_file_types);
	}
}

?>