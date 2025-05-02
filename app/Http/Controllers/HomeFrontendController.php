<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lowongan;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class HomeFrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
    public function lowongan()
    {
        $lowongan = Lowongan::where('status', 'Public')->get();
        return view('frontend.lowongan', compact('lowongan'));
    }
    
    public function lowongan1($id)
    {
        $lowongan = Lowongan::find($id);
        $deskripsi = DB::table('job_desc_lowongan')->where('lowongan_id', $id)->get();
        $kualifikasi = DB::table('kualifikasi_lowongan')->where('lowongan_id', $id)->get();
        $benefit = DB::table('benefit_lowongan')->where('lowongan_id', $id)->get();
        $soalLowongan = DB::table('soal_lowongan')->where('lowongan_id', $id)->get();
        $isLoggedIn = Auth::check();
        $hasCompleteProfile = false;
        if (!$isLoggedIn) {
            return redirect()->route('backend.login');
        }
        if ($isLoggedIn) {
            $user = Auth::user();
            $customer = Customer::where('user_id', $user->id)->first();
        
            if (
                $customer &&
                $customer->nama_lengkap &&
                $customer->alamat &&
                $customer->cv &&
                $customer->tempat_lahir &&
                $customer->tanggal_lahir &&
                $customer->jenis_kelamin &&
                $customer->skill &&
                $customer->experience
            ) {
                $hasCompleteProfile = true;

            }else{
                return redirect()->route('profile')->with('error', 'Lengkapi profil terlebih dahulu sebelum melamar pekerjaan.');
            }
        }
    
        return view('frontend.lowongan1', compact('lowongan', 'deskripsi', 'kualifikasi', 'benefit', 'isLoggedIn', 'hasCompleteProfile', 'customer','soalLowongan'));
    }
    public function lowongan2()
    {
        return view('frontend.lowongan2');
    }
    public function lowongan3()
    {
        return view('frontend.lowongan3');
    }
    public function lowongan4()
    {
        return view('frontend.lowongan4');
    }
    public function aboutus()
    {
        return view('frontend.aboutus');
    }
}
