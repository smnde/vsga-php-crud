<?php

session_start();
if(!isset($_SESSION['login'])) {
	header('Location: login.php');
}

require_once '../controller/students.php';
$students = get_students();

$title = 'Daftar mahasiswa';
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/layouts/navbar.php';

?>

<div class="container mt-3">

	<h3 class="mb-3">Dashboard</h3>
	
	<div class="row">
		<div class="col-md-12 mx-auto">
			<div class="card">
				<div class="card-header bg-info">
					<a class="btn btn-primary rounded" href="add.php">Tambah mahasiswa</a>
				</div>
				<div class="card-body">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama</th>
							<th>Jenis kelamin</th>
							<th>Jurusan</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($students as $row => $mahasiswa) : ?>
							<tr>
								<td> <?= $row +1; ?> </td>
								<td> <?= $mahasiswa['nim']; ?> </td>
								<td> <?= $mahasiswa['nama']; ?> </td>
								<td> <?= $mahasiswa['jenis_kelamin']; ?> </td>
								<td> <?= $mahasiswa['jurusan']; ?> </td>
								<td> <?= $mahasiswa['alamat']; ?> </td>
								<td>
									<a class="btn btn-sm btn-success" href="edit.php?id=<?= $mahasiswa['id_mhs']; ?> ">
										Edit
									</a>
									<a class="btn btn-sm btn-danger" href="delete.php?id=<?= $mahasiswa['id_mhs']; ?>"
									onclick="return confirm('Hapus mahasiswa?');"
									>
										Hapus
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>

</div>

<?php

require_once __DIR__ . '/layouts/footer.php';