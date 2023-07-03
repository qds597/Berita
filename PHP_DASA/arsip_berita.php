<?php
include "koneksi.php";
?>
<html>
    <head>
        <title>
            Arsip Berita
        </title>
        <link rel="stylesheet" href="style.css">
        <script language="javascript">
            function tanya() {
                if (confirm("Apakah Anda yakin akan menghapus berita ini?")) {
                    return true;
                } 
                else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip_berita.php">Arsip Berita</a> |
        <a href="input_berita.php">Input Berita</a> 
        <br><br>
        <h2>Arsip Berita</h2>
        <ol>
            <?php
            $query = "SELECT A.Id_berita, B.nm_kategori,
            A.judul, A.pengirim, A.tanggal
            FROM info_berita A, kategori B WHERE
            A.Id_kategori = B.Id_kategori
            ORDER BY A.Id_berita DESC";
                $sql = mysqli_query ($query);
                while ($hasil = mysqli_fetch_array ($sql)) {
                    $Id_berita = $hasil ['Id_berita'];
                    $kategori = $hasil['nm_kategori'];
                    $judul = $hasil['judul'];
                    $pengirim = $hasil['pengirim'];
                    $tanggal = $hasil['tanggal'];
                    //
                    //tampilkan arsip berita
                    echo "<li><a href = 'berita_lengkap.php?id= $Id_berita'>$judul</a><br>";
                    echo "<small>Berita dikirimkan oleh <b>$pengirim</b>
                        pada tanggal <b>$tanggal</b> dalam kategori<b>$kategori</b><br>";
                    echo "<b>Action : </b><a
                        href='edit_berita.php?id=$Id_berita'>Edit</a> | ";
                    echo "<a href='dalete_berita.php?id=$Id_berita'
                        onClik='return tanya()'>Delete</a>";
                    echo "</small></li><br><br>"; 
                    
                }
            ?>
        </ol>
    </body>
</html>