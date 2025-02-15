<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .kop { text-align: center; margin-bottom: 20px; }
        .kop h2 { margin: 5px 0; }
        .kop p { margin: 2px 0; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table th, .table td { border: 1px solid #000; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .footer { position: fixed; bottom: 0; left: 0; width: 100%; text-align: center; font-size: 10px; }
    </style>
</head>
<body>

    <!-- Kop Laporan -->
    <div class="kop">
        <h2>{{ $company['name'] }}</h2>
        <p>Telp: {{ $company['phone'] }} | Email: {{ $company['email'] }}</p>
        <p>Alamat: {{ $company['address'] }}</p>
        <hr>
        <h3>Laporan Kategori</h3>
    </div>

    <!-- Tabel Data Kategori -->
    <table class="table">
        <thead>
            <tr>
                <th width="10%">No</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer (Nomor Halaman) -->
    <div class="footer">
        <script type="text/php">
            if (isset($pdf)) {
                $pdf->page_text(500, 820, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", "Arial", 10);
            }
        </script>
    </div>

</body>
</html>
