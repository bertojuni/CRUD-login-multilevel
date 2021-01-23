<table class="table table-bordered table-hover">
    <br>
    <thead>
        <tr>
            <th>No</th>
            <th>kode buku</th>
            <th>judul</th>
            <th>pengarang</th>
            <th>penerbit</th>
            <th>thnterbit</th>

        </tr>
    </thead>
    <?php
    include "database/koneksi.php";
    $sql = "select * from buku";

    $hasil = mysqli_query($koneksi, $sql);
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {
        $no++;

    ?>
        <tbody>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data["kodebk"]; ?></td>
                <td><?php echo $data["judul"];   ?></td>
                <td><?php echo $data["pengarang"];   ?></td>
                <td><?php echo $data["penerbit"];   ?></td>
                <td><?php echo $data["thnterbit"];   ?></td>

            </tr>
        </tbody>
    <?php
    }
    ?>
</table>