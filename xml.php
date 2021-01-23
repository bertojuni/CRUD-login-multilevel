
    <?php
    include('database/koneksi.php');
    header('Content-Type: text/xml');
    $query = "SELECT * FROM buku";
    $hasil = mysqli_query($koneksi, $query);
    $jumField = mysqli_num_fields($hasil);

    echo "<?xml version='1.0'?>";
    echo "<data>";
    while ($data = mysqli_fetch_array($hasil)) {
        echo "<buku>";
        echo "<kodebk>", $data['kodebk'], "</kodebk>";
        echo "<judul>", $data['judul'], "</judul>";
        echo "<pengarang>", $data['pengarang'], "</pengarang>";
        echo "<penerbit>", $data['penerbit'], "</penerbit>";
        echo "<thnterbit>", $data['thnterbit'], "</thnterbit>";
        echo "</buku>";
    }
    echo "</data>";
