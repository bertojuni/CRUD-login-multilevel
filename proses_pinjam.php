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
        <td><a href="proses_pinjam.php/<?php echo $r['kodebk']; ?>"><button type="button" class="btn btn-info">PINJAM BUKU
                </button> </td>
    </tr>


<?php } ?>