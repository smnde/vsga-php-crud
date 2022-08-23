<?php

session_start();
if(!isset($_SESSION['login'])) {
	header('Location: login.php');
}

require_once '../controller/students.php';
if(isset($_POST['tambah'])) {
	if(add_student($_POST) > 0) {
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
}

$title = 'Tambah mahasiswa';
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/layouts/navbar.php';

?>

<div class="container mt-3">
	<div class="row">
		<div class="col-8 mx-auto">
			<div class="card">
				<div class="card-header bg-info">
					<h3>Tambah mahasiswa</h3>
				</div>
				<div class="card-body">
					<form method="post">
						<div class="mb-3">
							<label for="nim">NIM :</label>
							<input class="form-control" type="number" name="nim" id="nim">
						</div>
						<div class="mb-3">
							<label for="nama">Nama :</label>
							<input class="form-control" type="text" name="nama" id="nama">
						</div>
						<div class="mb-3">
							<label class="col-form-label col-sm-2">Jenis kelamin :</label>
							<div class="row">
								<div class="col-sm-10 d-flex gap-4">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L">
										<label class="form-check-label" for="laki-laki">Laki-laki</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
										<label class="form-check-label" for="perempuan">Perempuan</label>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="jurusan">Jurusan: </label>
							<input class="form-control" type="text" name="jurusan" id="jurusan">
						</div>
						<div class="mb-3">
							<label for="alamat">Alamat :</label>
							<textarea class="form-control" name="alamat" id="alamat" cols="10" rows="2"></textarea>
						</div>
						<button class="btn btn-primary rounded float-end" type="submit" name="tambah">Simpan</button>
						<a href="index.php" class="text-danger text-decoration-none"><< Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

require_once __DIR__ . '/layouts/footer.php';