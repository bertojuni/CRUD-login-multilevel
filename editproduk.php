<?php include('database/koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Produk</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">id tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$id					= $_POST['id'];
			$nama_produk		= $_POST['nama_produk'];
			$harga				= $_POST['harga'];
			$stock				= $_POST['stock'];
			$dosis				= $_POST['dosis'];
			$sediaan			= $_POST['sediaan'];
			$indikasi			= $_POST['indikasi'];
			$golongan			= $_POST['golongan'];
			$kadaluarsa			= $_POST['kadaluarsa'];
			
			$sql = mysqli_query($koneksi, "UPDATE buku SET nama_produk='$nama_produk', harga='$harga', stock='$stock',dosis='$dosis', sediaan='$sediaan', indikasi='$indikasi',golongan='$golongan', kadaluarsa='$kadaluarsa' WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="produkadmin.php?id_buku='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="editproduk.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA PRODUK</label>
				<div class="col-sm-10">
				<input type="hidden" name="id" value=<?php echo $_GET['id'];?>></<input>
					<input type="text" name="nama_produk" class="form-control" value="<?php echo $data['nama_produk']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HARGA</label>
				<div class="col-sm-10">
				<input type="number" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">STOCK</label>
				<div class="col-sm-10">
				<input type="number" name="stock" class="form-control" value="<?php echo $data['stock']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">DOSIS</label>
				<div class="col-sm-10">
				<input type="text" name="dosis" class="form-control" value="<?php echo $data['dosis']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">SEDIAAN</label>
				<div class="col-sm-10">
				<input type="text" name="sediaan" class="form-control" value="<?php echo $data['sediaan']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">INDIKASI</label>
				<div class="col-sm-10">
				<input type="text" name="indikasi" class="form-control" value="<?php echo $data['indikasi']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">GOLONGAN</label>
				<div class="col-sm-10">
				<input type="text" name="golongan" class="form-control" value="<?php echo $data['golongan']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KADALUARSA</label>
				<div class="col-sm-10">
				<input type="datetime-local" id="kadaluarsa" name="kadaluarsa">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="buku.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>