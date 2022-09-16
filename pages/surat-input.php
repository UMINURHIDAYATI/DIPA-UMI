<div class="About">
    <h2> Arsip Surat >> Unggah</h2>
        <h5 style="text-align: left;">Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
            Catatan:
            <ul>
                <li>Gunakan file berformat PDF</li>
            </ul>
        </h5>
</div>
<div id="content">
    <form action="proses/surat-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">Nomor Surat</td>
                <td class="isian-formulir"><input type="text" name="nomor_surat"
                        class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Kategori</td>
                <td><select class="isian-formulir" name="kategori" required="">
                        <option value=""></option>
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Nota Dinas">Nota Dinas</option>
                        <option value="Pemberitahuan">Pemberitahuan</option>
                    </select></td>
            </tr>
            <tr>
                <td class="label-formulir">Judul</td>
                <td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">File Surat (PDF)</td>
                <td class="isian-formulir"><input type="file" class="form-control" name="file">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"><a href="index.php?p=beranda" class="tombol"> << Kembali</a></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="simpan" class="tombol"></td>
            </tr>
        </table>
    </form>
</div>