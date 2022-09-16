<div class="About">
        <h2> Arsip Surat</h2>
        <!-- <div class="nama-alamat-arsip"> -->
            <h5>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan <br>
                klik "lihat pada kolom aksi
                untuk menampilkan surat"</h5>
        <!-- </div> -->
</div>
<div id="content">
    <p id="tombol-tambah-container">

    <div align="left">
        <p>Cari surat</p>
        <form method="post">
            <input type="text" name="pencarian">
            <input type="submit" name="search" value="search" class="tombol">
        </form>
    </div>

    </p>
    <table id="tabel-tampil">
        <thead>
            <tr>
                <th id="label-tampil-no">No</th>

                <th>nomor_surat</th>
                <th>kategori</th>
                <th>judul</th>
                <th>waktu</th>
                <th id="lable-opsi">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $batas = 10;
            extract($_GET);
            if (empty($hal)) {
                $posisi = 0;
                $hal = 1;
                $nomor = 1;
            } else {
                $posisi = ($hal - 1) * $batas;
                $nomor = $posisi + 1;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $pencarian = trim(
                    mysqli_real_escape_string($db, $_POST['pencarian'])
                );
                if ($pencarian != '') {
                    $sql = "SELECT * FROM tb_arsip WHERE judul LIKE '%$pencarian%'
                            OR id LIKE '%$pencarian%'
                            OR nomor_surat LIKE '%$pencarian%'
                            OR judul LIKE '%$pencarian%'";

                    $query = $sql;
                    $queryJml = $sql;
                } else {
                    $query = "SELECT * FROM tb_arsip LIMIT $posisi, $batas";
                    $queryJml = 'SELECT * FROM tb_arsip';
                    $no = $posisi * 1;
                }
            } else {
                $query = "SELECT * FROM tb_arsip LIMIT $posisi, $batas";
                $queryJml = 'SELECT * FROM tb_arsip';
                $no = $posisi * 1;
            }

            $q_tampil_arsip = mysqli_query($db, $query);

            if (mysqli_num_rows($q_tampil_arsip) > 0) {
                while (
                    $r_tampil_arsip = mysqli_fetch_array($q_tampil_arsip)
                ) {
                    ?>

            <tr>
                <td><?php echo $nomor; ?></td>

                <td><?php echo $r_tampil_arsip['nomor_surat']; ?></td>
                <td><?php echo $r_tampil_arsip['kategori']; ?></td>
                <td><?php echo $r_tampil_arsip['judul']; ?></td>
                <td><?php echo $r_tampil_arsip['waktu']; ?></td>
                <td>
                    <div class="tombol-opsi-container"><a href="proses/surat-hapus.php?id=<?php echo $r_tampil_arsip['id']; ?>" class="tombol1"
                        onclick="return confirm ('Apakah Anda yakin ingin menghapus arsip surat ini?')">Hapus</a></div>
                    <div class="tombol-opsi-container"><a href="pages/download.php?filename=<?php echo $r_tampil_arsip['file']; ?>" class="tombol2">Unduh</a></div>
                    <div class="tombol-opsi-container"><a href="index.php?p=lihat&id=<?php echo $r_tampil_arsip['id']; ?>" class="tombol3">Lihat</a></div>

                </td>

            </tr>
            <?php $nomor++;
                }
            } else {
                echo '<tr><td colspan=6>Data Tidak Ditemukan</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <?php if (isset($_POST['pencarian'])) {
        if ($_POST['pencarian'] != '') {
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "Data Hasil Pencarian: <b>$jml</b>";
            echo '</div>';
        }
    } else {
         ?>

    <?php
    } ?>
    <br><br>
    <a href="index.php?p=surat-input" class="tombol">Arsipkan Surat..</a>

</div>