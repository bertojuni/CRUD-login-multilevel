<html>

<head>
    <title></title>
</head>

<body>

    <center>

        <h2>DATA LAPORAN BUKU</h2>


    </center>

    <?php
    include 'database/koneksi.php';
    ?>

    <table border="1" style="width: 100%">
        <tr>
            <th width="1%">No</th>
            <th>kode buku</th>
            <th>judul buku</th>
            <th>pengarang/th>
            <th>penerbit</th>
            <th>thnterbit</th>

        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, "select * from buku");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['kodebk']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['pengarang']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['thnterbit']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <script>
        window.print();
    </script>

</body>

</html>