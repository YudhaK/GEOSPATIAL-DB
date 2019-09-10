<?php
function uploadImg($gambar_name, $gambar_tmp, $gambar_type, $gambar_size, $gambar_error, $uploaded_link) {

	$code = date("YmdHis");
	$rand = rand(111111,999999);
	$img = str_replace(' ', '-', $gambar_name);
	$image_name = $code.$rand.$img;

	// Access the $_FILES global variable for this specific file being uploaded
	// and create local PHP variables from the $_FILES array of information
	$fileName = $image_name; // The file name
	$fileName_resized = "RS_".$image_name; // The file name
	$fileTmpLoc = $gambar_tmp; // File in the PHP tmp folder
	$fileType = $gambar_type; // The type of file it is
	$fileSize = $gambar_size; // File size in bytes
	$fileErrorMsg = $gambar_error; // 0 for false... and 1 for true
	$kaboom = explode(".", $fileName); // Split file name into an array using the dot
	$fileExt = end($kaboom); // Now target the last array element to get the file extension
	// START PHP Image Upload Error Handling --------------------------------------------------
	if($fileSize > 20000) { // if file size is larger than 50 Kilobytes

		// END PHP Image Upload Error Handling ----------------------------------------------------
		// Place it into your "uploads" folder mow using the move_uploaded_file() function
		$moveResult = move_uploaded_file($fileTmpLoc, "$uploaded_link/$fileName");
		// Check to make sure the move result is true before continuing
		if ($moveResult != true) {
		    echo "ERROR: File not uploaded. Try again.";
		    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
		    exit();
		}
		unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
		// ---------- Include Universal Image Resizing Function --------
		include_once("lib/resize_image/ak_php_img_lib_1.0.php");
		$target_file = "$uploaded_link/$fileName";
		$resized_file = "$uploaded_link/$fileName_resized";
		$wmax = 350;
		$hmax = 350;
		ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
		unlink("$uploaded_link/$fileName"); // Remove the uploaded file from the PHP temp folder
		// ----------- End Universal Image Resizing Function -----------		
		return $fileName_resized;

	} else {

		$moveResult = move_uploaded_file($fileTmpLoc, "$uploaded_link/$image_name");
		return $image_name;

	}	
}
?>