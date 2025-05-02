<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar; // Sesuaikan dengan nama model Anda
use App\Models\Perusahaan;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller 
{
    public function generate()
    {
        // Ambil pendaftar yang lulus untuk user saat ini
        $pendaftar = Pendaftar::where('customer_id', Auth::user()->customer->id)
            ->where('status', 'Lulus') // atau '1' jika status berupa integer
            ->first();
    
        // Jika tidak ada data lulus
        if (!$pendaftar) {
            return redirect()->back()->withErrors('Anda belum dinyatakan lulus.');
        }
    
        // Buat surat kelulusan PDF
        $html = view('backend.laporan_pdf_pendaftar', compact('pendaftar'))->render();
    
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
    
        return $mpdf->Output('surat-kelulusan.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function generate2(Request $request)
{
    // Validasi input tanggal
    $request->validate([
        'tanggal_awal' => 'required|date',
        'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
    ]);

    // Ambil data pendaftar berdasarkan rentang tanggal
    $pendaftar = Pendaftar::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();

    // Jika tidak ada data
    if ($pendaftar->isEmpty()) {
        return redirect()->back()->withErrors('Tidak ada data pendaftar untuk rentang tanggal yang dipilih.');
    }

    // Siapkan konten HTML untuk laporan
    $html = view('backend.laporan_pdf_perusahaan', compact('pendaftar', 'request'))->render();

    // Buat instance mPDF
    $mpdf = new Mpdf();

    // Tulis HTML ke PDF
    $mpdf->WriteHTML($html);

    // Unduh file PDF
    return $mpdf->Output('laporan-pendaftar.pdf', \Mpdf\Output\Destination::INLINE);
}
}
