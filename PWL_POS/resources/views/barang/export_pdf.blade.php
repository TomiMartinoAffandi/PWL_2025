<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Data Barang</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 20px;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 80px;
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <table width="100%">
            <tr>
                <td width="20%" class="text-center">
                    <img src="{{ public_path('images/logo_polinema.png') }}" class="logo">
                </td>
                <td width="80%">
                    <h3>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h3>
                    <h2>POLITEKNIK NEGERI MALANG</h2>
                    <p>Jl. Soekarno-Hatta No. 9 Malang 65141</p>
                </td>
            </tr>
        </table>
        <hr>
        <h3>LAPORAN DATA BARANG</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th class="text-right">Harga Beli</th>
                <th class="text-right">Harga Jual</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->barang_kode }}</td>
                <td>{{ $item->barang_nama }}</td>
                <td class="text-right">{{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                <td class="text-right">{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                <td>{{ $item->kategori->kategori_nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 30px; text-align: right;">
        <p>Malang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <br><br><br>
        <p>(Admin)</p>
    </div>
</body>
</html>