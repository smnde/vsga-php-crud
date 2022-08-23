<?php

require_once '../controller/students.php';
$id = $_GET['id'];
if(delete_student($id) > 0) {
	echo "
			<script>
				alert('Berhasil');
				window.location.href = 'index.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('Gagal');
				window.location.href = 'index.php';
			</script>
		";
}