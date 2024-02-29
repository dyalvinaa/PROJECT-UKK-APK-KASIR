<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Laporan Penjualan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Faktur</th>
                <th>Tanggal Penjualan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
                <?php foreach ($listPenjualan as $row): ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    <td>
                      <?= $row['no_faktur']; ?>
                    </td>
                    <td>
                      <?= $row['tgl_penjualan']; ?>
                    </td>
                    <td>
                      <?= $row['total']; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>