<?php

// Include konfigurasi database
require_once '../config/db.php';


// Ambil semua data mahasiswa
function get_students()
{
	global $connection;
	$query = "SELECT * FROM mahasiswa";
	$result = mysqli_query($connection, $query);
	$data = [];
	while($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	return $data;
}

function get_student_by_id($id)
{
	global $connection;
	$query = "SELECT * FROM mahasiswa WHERE id_mhs = $id";
	$data = null;
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result)) {
		$data = $row;
	}

	return $data;
}

function add_student($data)
{
	global $connection;
	$nim = mysqli_escape_string($connection, htmlspecialchars($data['nim']));
	$nama = mysqli_escape_string($connection, htmlspecialchars($data['nama']));
	$jenis_kelamin = mysqli_escape_string($connection, htmlspecialchars($data['jenis_kelamin']));
	$jurusan = mysqli_escape_string($connection, htmlspecialchars($data['jurusan']));
	$alamat = mysqli_escape_string($connection, htmlspecialchars($data['alamat']));

	$student = "SELECT nim FROM mahasiswa WHERE nim = $nim";
	$result = mysqli_query($connection, $student);

	if(mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('NIM Tidak boleh sama');
			</script>
		";
		return false;
	}

	$query = "INSERT INTO mahasiswa VALUES
			($nim, NULL, '$nama', '$jenis_kelamin', '$jurusan', '$alamat')";
	mysqli_query($connection, $query);
	return mysqli_affected_rows($connection);
}

function update_student($data, $id)
{
	global $connection;
	$nim = mysqli_escape_string($connection, htmlspecialchars($data['nim']));
	$nama = mysqli_escape_string($connection, htmlspecialchars($data['nama']));
	$jenis_kelamin = mysqli_escape_string($connection, htmlspecialchars($data['jenis_kelamin']));
	$jurusan = mysqli_escape_string($connection, htmlspecialchars($data['jurusan']));
	$alamat = mysqli_escape_string($connection, htmlspecialchars($data['alamat']));

	$query = "UPDATE mahasiswa SET
			 	nim = $nim,
				nama = '$nama',
				jenis_kelamin = '$jenis_kelamin',
				jurusan = '$jurusan',
				alamat = '$alamat'
			  WHERE id_mhs = $id
			 ";
	mysqli_query($connection, $query);
	return mysqli_affected_rows($connection);
}

function delete_student($id)
{
	global $connection;
	$query = "DELETE FROM mahasiswa WHERE id_mhs = $id";
	mysqli_query($connection, $query);
	return mysqli_affected_rows($connection);
}