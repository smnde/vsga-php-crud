<?php

session_start();
if(!isset($_SESSION['login'])) {
	header('Location: login.php');
}

require_once '../controller/students.php';
$id = $_GET['id'];
$student = get_student_by_id($id);

if(isset($_POST['update'])) {
	if(update_student($_POST, $id) > 0) {
		echo "
			<script>
				alert('Berhasil');
				window.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				window.location.href = 'index.php';
			</script>
		";
	}
}

$title = 'Edit mahasiswa';
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/layouts/navbar.php';

?>

<div class="container mt-3">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header bg-info">
					<h5>Edit mahasiswa</h5>
				</div>
				<div class="card-body">
					<form method="post">
						<div class="mb-3">
							<label for="nim">NIM :</label>
							<input class="form-control" type="text" name="nim" id="nim" value="<?= $student['nim'] ? $student['nim'] : '' ?>">
						</div>
						<div class="mb-3">
							<label for="nama">Nama :</label>
							<input class="form-control" type="text" name="nama" id="nama" value="<?= $student['nama']; ?>">
						</div>
						<div class="mb-3">
							<label class="col-form-label col-sm-2">Jenis kelamin :</label>
							<div class="row">
								<div class="col-sm-10 d-flex gap-4">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L" <?= $student['jenis_kelamin'] === 'L' ? 'checked' : '' ?>>
										<label class="form-check-label" for="laki-laki">Laki-laki</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" <?= $student['jenis_kelamin'] === 'P' ? 'checked' : '' ?>>
										<label class="form-check-label" for="perempuan">Perempuan</label>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="form-check mb-3">
							<label for="jenis_kelamin">Jenis kelamin :</label>
							<span>
								<input class="form-control" type="radio" name="jenis_kelamin" id="jenis_kelamin"
								value="L" <?= $student['jenis_kelamin'] === 'L' ? 'checked' : '' ?> >
								<span>Laki-laki</span>
							</span>
							<span>
								<input class="form-control" type="radio" name="jenis_kelamin" id="jenis_kelamin"
								value="P" <?= $student['jenis_kelamin'] === 'P' ? 'checked' : '' ?>>
								<span>Perempuan</span>
							</span>
						</div> -->
						<div class="mb-3">
							<label for="jurusan">Jurusan: </label>
							<input class="form-control" type="text" name="jurusan" id="jurusan" value="<?= $student['jurusan']; ?>" >
						</div>
						<div class="mb-3">
							<label for="alamat">Alamat :</label>
							<textarea class="form-control" name="alamat" id="alamat" cols="10" rows="2"><?= $student['alamat']; ?></textarea>
						</div>
						<button class="btn btn-primary rounded float-end" type="submit" name="update">Simpan</button>
						<a href="index.php" class="text-danger text-decoration-none"><< Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

require_once __DIR__ . '/layouts/footer.php';