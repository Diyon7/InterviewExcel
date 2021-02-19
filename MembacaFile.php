<!DOCTYPE html>
<html>

<head>
    <title>MEmbaca file excel</title>
</head>

<body>

    <table>
        <form method="post" enctype="multipart/form-data">
            <tr>
                <td>Pilih File</td>
                <td><input name="filemhsw" type="file" required="required"></td>
            </tr>
            <tr>
                <td></td>
                <td><input name="upload" type="submit" value="Import"></td>
            </tr>
        </form>
    </table>
    <h1>Tabel Hasil Inputan Excel</h1>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Program Studi</td>
            <td>Fakultas</td>
        </tr>
        <?php
        if (isset($_POST['upload'])) {

            require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
            require('spreadsheet-reader-master/SpreadsheetReader.php');

            //upload data excel kedalam folder uploads
            $target_dir = "uploads/" . basename($_FILES['filemhsw']['name']);

            move_uploaded_file($_FILES['filemhsw']['tmp_name'], $target_dir);

            $Reader = new SpreadsheetReader($target_dir); ?>
            <?php foreach ($Reader as $Key => $Row) :
                if ($Key < 1) continue; ?>
                <tr>

                    <td><?= $Row['0'] ?></td>
                    <td><?= $Row['1'] ?></td>
                    <td><?= $Row['2'] ?></td>
                    <td><?= $Row['3'] ?></td>
                    <td><?= $Row['4'] ?></td>

                </tr>
            <?php endforeach ?>
        <?php } ?>
    </table>
</body>

</html>