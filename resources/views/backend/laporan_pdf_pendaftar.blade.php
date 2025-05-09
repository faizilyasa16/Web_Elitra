<!DOCTYPE html>
<html>
<head>
    <title>Surat Kelulusan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h2 { margin: 0; font-size: 24px; }
        .header h4 { margin: 5px 0 10px 0; font-size: 16px; }
        .header h3 { font-size: 20px; margin-top: 20px; text-decoration: underline; }

        .content { line-height: 1.8; font-size: 14px; margin-top: 20px; }
        .signature { margin-top: 60px; text-align: right; font-size: 14px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>PT Elitra</h2>
        <h4>Jl. Cut Mutia No. 88, Kota Bekasi</h4>
        <hr>
        <h3>Surat Keterangan Kelulusan</h3>
    </div>

    <div class="content">
        <p>Dengan ini menyatakan bahwa:</p>
        <p><strong>Nama:</strong> {{ $pendaftar->customer->nama_lengkap }}</p>
        <p><strong>Email:</strong> {{ $pendaftar->customer->user->email }}</p>
        <p><strong>Lowongan:</strong> {{ $pendaftar->lowongan->posisi }}</p>

        <p>Telah dinyatakan <strong>lulus</strong> dalam proses seleksi yang diadakan oleh PT Elitra. Demikian surat ini dibuat untuk dapat digunakan sebagaimana mestinya.</p>
    </div>

    <div class="signature">
        <p>Jakarta, {{ now()->format('d F Y') }}</p>
        <br><br>
        <p><strong>HRD PT Elitra</strong></p>
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/eril.png'))) }}" style="width: 100px; height: 100px;" alt="">
        <p><strong>Eriel Firman Suandanis</strong></p>
    </div>
</body>
</html>
