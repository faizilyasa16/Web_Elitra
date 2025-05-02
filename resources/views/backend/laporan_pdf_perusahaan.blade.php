<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pendaftar</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f4f4f4; }
        td a { text-decoration: none; color: #007bff; cursor: pointer; }
        td a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h3>Laporan Data Pendaftar</h3>
    <p>Periode: {{ $request->tanggal_awal }} - {{ $request->tanggal_akhir }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Posisi Dilamar</th>
                <th>Email</th>
                <th>Tanggal Submit</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftar as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->customer->nama_lengkap ?? '-' }}</td>
                <td>{{ $row->lowongan->posisi ?? '-' }}</td>
                <td>{{ $row->user->email ?? '-' }}</td>
                <td>{{ $row->created_at->format('d M Y') }}</td>
                <td>
                    @if ($row->status == 'Lulus')
                        <span class="badge bg-success">Lulus</span>
                    @elseif ($row->status == 'Ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @else
                        <span class="badge bg-warning">Menunggu</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
