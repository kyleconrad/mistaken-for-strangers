<?php
if (is_paged()){
	include (TEMPLATEPATH . '/home_paged.php');
}
else {
	include (TEMPLATEPATH . '/home_normal.php');
}
?>