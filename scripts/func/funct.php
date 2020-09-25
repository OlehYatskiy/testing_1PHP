 <?php
 /**
 Helpers
 */


 function getResponce($type, $message) {
     return json_encode([
         'success' => $type,
         'message' => $message
     ]);
 }
 

 /**Simple salt generator*/
 function salt()
 {
	$salt = substr(md5(uniqid()), -8);
	return $salt;
 }

 ?>
