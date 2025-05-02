<?php

namespace App\Http\Controllers;

use App\Charts\karyawanChart;
use App\Models\SudahKontrak;
use App\Models\belumKontrak;
use App\Models\Pendaftar;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\HistoryPendaftar;
use App\Models\JawabanSoalLowongan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TableController extends Controller
{
    public function index(Request $request, KaryawanChart $karyawanChart)
    {
        $queryPekerjaKontrak = $request->input('query_pekerja_kontrak');
    
        $data['pekerja'] = SudahKontrak::query()
            ->when($queryPekerjaKontrak, function ($query) use ($queryPekerjaKontrak) {
                $query->where('nama', 'like', '%' . $queryPekerjaKontrak . '%')
                      ->orWhere('email', 'like', '%' . $queryPekerjaKontrak . '%');
            })
            ->paginate(5);
    
            $pendaftarCount = JawabanSoalLowongan::with('soalLowongan.lowongan')
            ->selectRaw('lowongan.posisi, COUNT(jawaban_soal.id) as total')
            ->join('soal_lowongan', 'jawaban_soal.soal_lowongan_id', '=', 'soal_lowongan.id')
            ->join('lowongan', 'soal_lowongan.lowongan_id', '=', 'lowongan.id')
            ->groupBy('lowongan.posisi')
            ->pluck('total', 'lowongan.posisi')
            ->toArray();
        

    
        // Bangun chart dari data itu
        $chart = $karyawanChart->build($pendaftarCount);

        $pendaftarLolos = Pendaftar::where('status', 'Lulus')->count();
        $pendaftarGagal = Pendaftar::where('status', 'Gagal')->count();
        $pendaftarProses = Pendaftar::where('status', 'Sedang Di Proses')->count();
    
        // Kirim semua ke view
        return view('backend.content2', $data, compact('pendaftarCount', 'chart', 'pendaftarLolos', 'pendaftarGagal', 'pendaftarProses'));
    }
    public function create()
    {
        return view('backend.tambahdata_pekerja_kontrak', [
            'title' => 'Form Tambah Data Pekerja',
        ]);
    }

    public function create2()
    {
        return view('backend.tambahdata_pekerja_belum_kontrak', [
            'title' => 'Form Tambah Data Pekerja',
        ]);
    }

    
    public function terimaPendaftar($id)
    {
        // Ambil data lamaran
        $lamaran = JawabanSoalLowongan::findOrFail($id);

        $soalLowongan = $lamaran->soalLowongan; // Mengambil data SoalLowongan terkait dengan JawabanSoalLowongan
    
        // Ambil data lowongan dari SoalLowongan (menggunakan relasi Lowongan pada SoalLowongan)
        $lowongan = $soalLowongan->lowongan; // Pastikan di model SoalLowongan ada relasi ke Lowongan
        $perusahaan = $lowongan->perusahaan ?? 'PT Tidak Diketahui'; // Ambil nama perusahaan dari tabel Lowongan
        $posisi = $lowongan->posisi ?? 'Posisi Tidak Ditentukan'; // Ambil posisi dari tabel Lowongan
        
        $user = User::findOrFail($lamaran->customer->user_id); // Sesuaikan jika relasi antara Customer dan User menggunakan user_id
        
        // Buat data baru di tabel karyawan
        SudahKontrak::create([
            'user_id' => $user->id,
            'nama' => $lamaran->customer->nama_lengkap ?? 'Nama Tidak Diketahui', // Ambil nama dari Customer
            'posisi_dikontrak' => $posisi ?? 'Belum Ditentukan',
            'email' => $user->email,
            'pt' => $perusahaan,
            'tanggal_mulai_kontrak' => now(),
            'lama_kontrak' => 12, // Lama kontrak, misal 12 bulan
            'upah_kontrak' => $lamaran->harapan_gaji ?? 0,
            'tanggal_akhir_kontrak' => now()->addMonths(12),
            'status_kontrak' => 'Aktif',
        ]);

        // Update status lamaran jadi diterima
        $lamaran->update([
            'status' => 'diterima',
        ]);

        return redirect()->back()->with('success', 'Pendaftar berhasil dijadikan karyawan.');
    }
    
    
    public function store2(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi_keahlian' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'email' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048', // Menambahkan validasi untuk file
            'status' => 'required|in:Belum Kontrak,pendaftar',
        ]);
    
        // Tentukan tabel berdasarkan status kontrak
        if ($request->status == 'Belum Kontrak') {
            $pekerja = new belumKontrak();
        } elseif ($request->status == 'pendaftar') {
            $pekerja = new Pendaftar();
        } else {
            return redirect()->route('backend.content2')->with('error', 'Status kontrak tidak valid.');
        }
    
        // Simpan file CV
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('uploads/cv', 'public'); // Menyimpan file ke folder public/uploads/cv
            $pekerja->cv = $cvPath;
        }
    
        // Simpan data ke dalam model
        $pekerja->nama = $request->input('nama');
        $pekerja->posisi_keahlian = $request->input('posisi_keahlian');
        $pekerja->tanggal_masuk = $request->input('tanggal_masuk');
        $pekerja->email = $request->input('email');
        $pekerja->status = $request->input('status');
    
        // Simpan data ke database
        $pekerja->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('backend.content2')->with('success', 'Pekerja berhasil ditambahkan.');
    }
    
    public function edit($id, $status)
    {
        // Tentukan model berdasarkan status kontrak
        if ($status == 'Kontrak') {
            $pekerja = SudahKontrak::findOrFail($id);
        }else {
            return redirect()->route('backend.content2')->with('error', 'Status kontrak tidak valid.');
        }
    
        // Kirim data ke view untuk diedit
        return view('backend.editdata_pekerja_kontrak', [
            'pekerja' => $pekerja,
            'status' => $status,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input dari user
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi_dikontrak' => 'required|string|max:255',
            'tanggal_mulai_kontrak' => 'required|date',
            'email' => 'required|email|max:255',
            'pt' => 'required|string|max:255',
            'lama_kontrak' => 'required|numeric',
            'upah_kontrak' => 'required|string|max:255',
            'status_kontrak' => 'required|in:Aktif,Selesai',
        ]);
    
        // Ambil data pekerja dari SudahKontrak
        $pekerja = SudahKontrak::findOrFail($id);
    
        // Update data pekerja
        $pekerja->nama = $request->input('nama');
        $pekerja->posisi_dikontrak = $request->input('posisi_dikontrak');
        $pekerja->tanggal_mulai_kontrak = $request->input('tanggal_mulai_kontrak');
        $pekerja->email = $request->input('email');
        $pekerja->pt = $request->input('pt');
        $pekerja->lama_kontrak = $request->input('lama_kontrak');
        $pekerja->upah_kontrak = $request->input('upah_kontrak');
        $pekerja->status_kontrak = $request->input('status_kontrak');  // status tetap bisa diupdate meskipun semuanya disimpan di SudahKontrak
    
        // Simpan data ke database
        $pekerja->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('backend.content2')->with('success', 'Pekerja berhasil diperbarui.');
    }
    
    public function edit2($id, $status)
    {
        // Tentukan model berdasarkan status kontrak
        if ($status == 'Belum Kontrak') {
            $pekerja = belumKontrak::findOrFail($id);
        }
        else {
            return redirect()->route('backend.content2')->with('error', 'Status kontrak tidak valid.');
        }
    
        // Kirim data ke view untuk diedit
        return view('backend.editdata_pekerja_belum_kontrak', [
            'pekerja' => $pekerja,
            'status' => $status,
        ]);
    }
    
    public function update2(Request $request, $id, $status)
    {
        // Validasi input dari user
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi_keahlian' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'email' => 'required|email|max:255',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:Belum Kontrak,pendaftar',
        ]);
    
        // Ambil model berdasarkan status kontrak dan id
        if ($status == 'Belum Kontrak') {
            $pekerja = belumKontrak::findOrFail($id);
        } elseif ($status == 'pendaftar') {
            $pekerja = Pendaftar::findOrFail($id);
        } else {
            return redirect()->route('backend.content2')->with('error', 'Status kontrak tidak valid.');
        }
    
        // Update file CV jika ada
        if ($request->hasFile('cv')) {
            // Hapus CV lama jika ada
            if ($pekerja->cv && Storage::disk('public')->exists($pekerja->cv)) {
                Storage::disk('public')->delete($pekerja->cv); // Hapus CV lama
            }
    
            // Pastikan folder ada
            if (!Storage::disk('public')->exists('uploads/cv')) {
                Storage::disk('public')->makeDirectory('uploads/cv');
            }
    
            // Simpan CV baru
            $cvPath = $request->file('cv')->store('uploads/cv', 'public');
            $pekerja->cv = $cvPath; // Update CV path
        }
        
    
        // Update data pekerja
        $pekerja->nama = $request->input('nama');
        $pekerja->posisi_keahlian = $request->input('posisi_keahlian');
        $pekerja->tanggal_masuk = $request->input('tanggal_masuk');
        $pekerja->email = $request->input('email');
        $pekerja->status = $request->input('status');
    
        // Simpan perubahan ke database
        $pekerja->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('backend.content2')->with('success', 'Pekerja berhasil diperbarui.');
    }
    
    
    

    public function destroy($id,)
    {
        $pekerja = SudahKontrak::findOrFail($id);
        $pekerja->delete();
    
        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->route('backend.content2')->with('success', 'Pekerja berhasil dihapus.');
    }
    
}
