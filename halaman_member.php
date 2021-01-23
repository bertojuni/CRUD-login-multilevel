<?php
//memasukkan file config.php
include('database/koneksi.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>PENGUNJUNG</title>
	<!-- navbar -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- end navbar -->


</head>

<body>

	<!-- host name welcome -->
	<?php
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if ($_SESSION['level'] == "") {
		header("location:index.php?pesan=gagal");
	}
	?>
	<!-- end host name welcome -->

	<!-- navbar -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">

				<a class="navbar-brand"></a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>


			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><span class="glyphicon glyphicon-user"></span>&nbsp;<strong><?php echo $_SESSION['username']; ?></strong></a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>
		</div>
	</nav>
	<!-- end navbar -->



	<!-- body -->

	<form action="" method="get">
		<table id="table" class="table table-hover" border="1">
			<tr style="text-align: center; background:cornflowerblue; color:white">
				<td>No</td>
				<td>Kode Buku</td>
				<td>Judul Buku</td>
				<td>Pengarang</td>
				<td>Penerbit</td>
				<td>Tahun Terbit</td>
				<td>aksi</td>

			</tr>
			<?php
			if (isset($_GET['cari'])) {
				$cari = $_GET['cari'];

				$sql = "select * from buku where judul like 
'%" . $cari . "%'";

				$tampil = mysqli_query($koneksi, $sql);
			} else {

				$sql = "select * from buku";

				$tampil = mysqli_query($koneksi, $sql);
			}
			$no = 1;
			while ($r = mysqli_fetch_array($tampil)) { ?>
				<tr style="text-align: center;">

					<td><?php echo $no++; ?></td>

					<td><?php echo $r['kodebk']; ?></td>
					<td><?php echo $r['judul']; ?></td>
					<td><?php echo $r['pengarang']; ?></td>
					<td><?php echo $r['penerbit']; ?></td>
					<td><?php echo $r['thnterbit']; ?></td>
					<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" style="height: fit-content;">PINJAM</button></td>
				</tr>
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- konten modal-->
						<div class="modal-content">
							<!-- heading modal -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Peminjaman Buku</h4>
							</div>
							<!-- body modal -->
							<div class="modal-body">
								<form action="">

									<div class="mb-3">
										<label for="exampleformcontrolinput1" class="form-label">Kode Buku</label>
										<input type="numeric" class="form-control" id="exampleformcontrolinput1" value="<?= $r['kodebk'] ?>" name="kodebk" readonly>
									</div>
									<div class="mb-3">
										<label for="exampleformcontrolinput1" class="form-label">Judul Buku</label>
										<input type="text" class="form-control" id="exampleformcontrolinput1" value="<?= $r['judul'] ?>" name="judul" readonly>
									</div>
									<div class="mb-3">
										<label for="exampleformcontrolinput1" class="form-label">Pengarang Buku</label>
										<input type="text" class="form-control" id="exampleformcontrolinput1" value="<?= $r['pengarang'] ?>" name="pengarang" readonly>
									</div>
									<div class="mb-3">
										<label for="exampleformcontrolinput1" class="form-label">Penerbit</label>
										<input type="text" class="form-control" id="exampleformcontrolinput1" value="<?= $r['penerbit'] ?>" name="penerbit" readonly>
									</div>
									<div class="mb-3">
										<label for="exampleformcontrolinput1" class="form-label">Tahun Terbit</label>
										<input type="text" class="form-control" id="exampleformcontrolinput1" value="<?= $r['thnterbit'] ?>" name="thnterbit" readonly>
									</div>
									<div class="mb-3">
										<label for="exampleformcontrolinput1" class="form-label">Tanggal Pinjam</label>
										<input type="date" class="form-control" id="exampleformcontrolinput1" value="<?= $r['thnterbit'] ?>" name="thnterbit">
									</div>
								</form>
							</div>
							<!-- footer modal -->
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">PINJAM</button>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>

		</table>
		<a href="laporanpdf.php" target="_blank">CETAK PDF</a>
		<div class="float-left">
			<a target="_blank" href="laporanexcel.php">EXPORT KE EXCEL</a>
		</div>
		</div>

		<!-- end search -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>