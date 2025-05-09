<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Models\SoalLowongan;
use App\Models\JawabanSoalLowongan;
use App\Models\JobDesc;
use App\Models\Kualifikasi;
use App\Models\Pendaftar;

class LowonganController extends Controller
{
    public function index(){
        $lowongan = Lowongan::paginate(5);
        return view('backend.content7',compact('lowongan'));
    }

    public function create(){
        return view('backend.content8');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posisi' => 'required|string',
            'alamat' => 'required|string',
            'tipe' => 'required|string|in:fulltime,parttime,freelance',
            'pendidikan' => 'required|string',
            'gaji' => 'required|string',
            'perusahaan' => 'required|string',
            'deskripsi' => 'required|array|min:1',
            'deskripsi.*' => 'required|string',
            'kualifikasi' => 'required|array|min:1',
            'kualifikasi.*' => 'required|string',
            'benefit' => 'required|array|min:1',
            'benefit.*' => 'required|string',
            'status' => 'required|string|in:Blok,Public',
        ]);
    
        // Upload file gambar ke storage/public/produk_images
        $imagePath = null;
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('lowongan_image', 'public'); // Simpan file ke folder 'produk_images'
        }

    
        // Simpan data ke tabel `resep`
        $lowongan = Lowongan::create([
            'img' => $imagePath,
            'posisi' => $validated['posisi'],
            'alamat' => $validated['alamat'],
            'tipe' => $validated['tipe'],
            'pendidikan' => $validated['pendidikan'],
            'status' => $validated['status'],
            'perusahaan' => $validated['perusahaan'],
            'gaji' => $validated['gaji'],
        ]);
    
        foreach ($validated['deskripsi'] as $namaDeskripsi) {
            $lowongan->jobDescLowongan()->create([
                'deskripsi' => $namaDeskripsi,
                'urutan' => '-',
            ]);
        }
        
        foreach ($validated['kualifikasi'] as $namaKualifikasi) {
            $lowongan->kualifikasiLowongan()->create([
                'kualifikasi' => $namaKualifikasi,
                'urutan' => '-',
            ]);
        }
        
        foreach ($validated['benefit'] as $namaBenefit) {
            $lowongan->benefitLowongan()->create([
                'benefit' => $namaBenefit,
                'urutan' => '-',
            ]);
        }
        
    
        // Redirect atau kembalikan respons
        return redirect()->route('backend.content7')->with('success', 'Resep berhasil disimpan!');
    }

    public function soal ($id){
        $lowongan = Lowongan::findOrFail($id);
        return view('backend.soal',compact('lowongan'));
    }

    public function tambahSoal(Request $request, $lowonganId)
    {
        $request->validate([
            'soal' => 'required|array',
            'soal.*' => 'required|string'
        ]);
    
        // Filter soal yang tidak kosong dan tidak hanya whitespace
        $filteredSoal = array_filter($request->soal, function ($soal) {
            return trim($soal) !== '';
        });
    
        foreach ($filteredSoal as $isiSoal) {
            SoalLowongan::create([
                'lowongan_id' => $lowonganId,
                'soal' => $isiSoal,
            ]);
        }
    
        return redirect()->route('backend.content7')->with('success', 'Soal berhasil ditambahkan.');
    }
    

public function simpanLamaran(Request $request, $lowonganId)
{
    $validated = $request->validate([
        'letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'foto_ktp' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        'pendidikan' => 'required|string',
        'harapan_gaji' => 'required|string',
        'pengalaman' => 'required|string',
        'jawaban' => 'required|array',
        'jawaban.*' => 'required|string',
    ]);

    $lowongan = Lowongan::findOrFail($lowonganId);
    $customer = auth()->user()->customer; // anggap ini sudah relasi ke Customer

    // Ambil CV dari profil customer
    $cvPath = $customer->cv; // diasumsikan sudah ada kolom 'cv' di tabel users/customers
    $letterPath = $request->hasFile('letter')
        ? $request->file('letter')->store('letter', 'public')
        : null;

    // Ambil foto KTP dari request
    $fotoKtpPath = $request->file('foto_ktp')->store('foto_ktp', 'public');

        // Cek dulu apakah pendaftar sudah pernah apply
    $existing = Pendaftar::where('customer_id', $customer->id)
    ->where('lowongan_id', $lowonganId)
    ->first();

    $firstJawaban = null;

    foreach ($validated['jawaban'] as $soalId => $isiJawaban) {
    $jawaban = JawabanSoalLowongan::create([
    'soal_lowongan_id' => $soalId,
    'customer_id' => $customer->id,
    'pendidikan' => $validated['pendidikan'],
    'letter' => $letterPath,
    'foto_ktp' => $fotoKtpPath,
    'harapan_gaji' => $validated['harapan_gaji'],
    'jawaban' => $isiJawaban,
    ]);

    if (!$firstJawaban) {
    $firstJawaban = $jawaban;
    }
    }

    if (!$existing && $firstJawaban) {
    Pendaftar::create([
    'customer_id' => $customer->id,
    'lowongan_id' => $lowonganId,
    'jawaban_soal_id' => $firstJawaban->id
    ]);
    }
    


    return redirect()->route('lowonganfrontend')->with('success', 'Lamaran berhasil dikirim!');
}
    public function edit($id){
        $lowongan = Lowongan::FindOrFail($id);
        $kualifikasi = Kualifikasi::where('lowongan_id', $id)->pluck('kualifikasi');

        $benefit = Benefit::where('lowongan_id', $id)->pluck('benefit');
        $job_description = JobDesc::where('lowongan_id', $id)->pluck('deskripsi');
        return view('backend.edit_lowongan',compact('lowongan','kualifikasi','benefit','job_description'));
    }

    public function update(Request $request, $id){
        $lowongan = Lowongan::FindOrFail($id);
        $lowongan->update($request->all());
        return redirect()->route('backend.content7')->with('success', 'Resep berhasil diubah!');
    }
    

    public function destroy($id)
    {
        // Cari data resep berdasarkan ID
        $lowongan = Lowongan::findOrFail($id);
    
        // Hapus data resep
        $lowongan->delete();
    
        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->route('backend.content7')->with('success', 'Resep berhasil dihapus!');
    }
}
