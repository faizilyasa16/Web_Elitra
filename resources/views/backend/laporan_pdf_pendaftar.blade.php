<!DOCTYPE html>
<html>
<head>
    <title>Surat Kelulusan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .content { line-height: 1.6; }
        .signature { margin-top: 50px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>PT Elitra/h2>
        <h4>Jl. Cut Mutia No. 88, Kota Bekasi</h4>
        <hr>
        <h3>SURAT KETERANGAN KELULUSAN</h3>
    </div>

    <div class="content">
        <p>Dengan ini menyatakan bahwa:</p>
        <p><strong>Nama:</strong> {{ $pendaftar->customer->nama_lengkap }}</p>
        <p><strong>Email:</strong> {{ $pendaftar->customer->user->email }}</p>
        <p><strong>Lowongan:</strong> {{ $pendaftar->lowongan->posisi }}</p>

        <p>Telah dinyatakan <strong>LULUS</strong> dalam proses seleksi yang diadakan oleh PT Elitra.</p>

        <p>Demikian surat ini dibuat untuk dapat digunakan sebagaimana mestinya.</p>
    </div>

    <div class="signature">
        <p>Jakarta, {{ now()->format('d F Y') }}</p>
        <br><br>
        <p><strong>HRD PT Elitra</strong></p>
        <p><strong>Eriel Firman Suandanis</strong></p>
    </div>
</body>
</html>
