<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\JawabanSoalLowongan;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('profile_user.profile');
    }
    public function history()
    {
        // Ambil data pendaftar berdasarkan customer_id yang sudah login
        $hasil = Pendaftar::where('customer_id', Auth::user()->customer->id)->get();
    
        // Hitung jumlah status untuk masing-masing kategori
        $prosesCount = $hasil->where('status', 'Sedang Di Proses')->count();
        $lolosCount = $hasil->where('status', 'Lulus')->count();
        $gagalCount = $hasil->where('status', 'Gagal')->count();
    
        // Kirim data ke view
        return view('profile_user.history', compact('hasil', 'prosesCount', 'lolosCount', 'gagalCount'));
    }
    
    public function admin(){
        $dataAdmin = User::where('role', 'admin')->paginate(10); // <- tambahin paginate disini
        return view('backend.content6', compact('dataAdmin'));
    }
    public function useradmin(Request $request){
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            'username' => 'required',
            'hp' => 'required'
        ]);

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'username' => $request->username,
            'hp' => $request->hp
        ]);
        return redirect()->route('backend.content6');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('backend.content6');
    }


    public function store(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'hp' => 'required|numeric',
            'role' => 'required|string',
            'password' => 'nullable|min:6', // Password baru boleh kosong
            'old_password' => 'required', // Old password wajib diisi
        ]);
    
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);
    
        // Verifikasi old password
        if (!Hash::check($request->old_password, $user->password)) {
            // Old password tidak sesuai
            return redirect()->back()->withErrors(['old_password' => 'Old password is incorrect.'])->withInput();
        }
    
        // Update data user
        $user->username = $request->username;
        $user->email = $request->email;
        $user->hp = $request->hp;
        $user->role = $request->role;
    
        // Jika ada password baru, update
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('backend.content6')->with('success', 'Admin updated successfully!');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'nullable|string|unique:user,username,' . auth()->id(),
            'email' => 'nullable|email|unique:user,email,' . auth()->id(),
            'hp' => 'required|numeric|digits_between:10,15'. auth()->id(),
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'skill' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'linkedin' => 'nullable|url',
        ]);
        
        
    
        $user = User::find(auth()->id());
    
        $user->username = $request->username;
        $user->email = $request->email;
        $user->hp = $request->hp;
        $user->save();
    
        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
        }

    
        $user->customer()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'alamat' => $request->alamat,
                'skill' => $request->skill,
                'experience' => $request->experience,
                'linkedin' => $request->linkedin,
                'cv' => $cvPath ?? optional($user->customer)->cv,
            ]
        );
    
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
    
    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = User::find(auth()->id());
        $user->update([
            'foto' => $request->file('foto')->store('foto', 'public'),
        ]);
    
        return redirect()->back()->with('success', 'Foto berhasil diperbarui!');
    }

}
