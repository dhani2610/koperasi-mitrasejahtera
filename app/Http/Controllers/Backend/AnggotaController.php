<?php

namespace App\Http\Controllers\Backend;

use App\Models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Anggota';
        // $data['spips'] = Anggota::where('type', $request->type)->orderBy('created_at', 'desc')->get();

        return view('backend.pages.master-data.anggota.index', $data);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string|unique:anggotas',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'status' => 'nullable|string',
            'penjamin' => 'nullable|string',
            'no_jaminan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'agama' => 'nullable|string',
            'alamat' => 'required|string',
            'luas_plat_tahun' => 'required|string',
            'telepon' => 'nullable|string',
            'tanggal_registrasi' => 'required|date',
            'jaminan' => 'required|string',
            'status_keanggotaan' => 'required|string',
            'atas_nama' => 'nullable|string',
            'no_reg_desa' => 'nullable|string',
            'no_reg_camat' => 'nullable|string',
            'password' => 'required|string|min:6',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Upload file photo jika ada
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('anggota_photos', 'public');
        }

        // Enkripsi password
        $validated['password'] = Hash::make($request->password);

        // Simpan data ke database
        Anggota::create($validated);

        return back()->with('success', 'Data anggota berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string|unique:anggotas,nik,' . $anggota->id,
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'status' => 'nullable|string',
            'penjamin' => 'nullable|string',
            'no_jaminan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'agama' => 'nullable|string',
            'alamat' => 'required|string',
            'luas_plat_tahun' => 'required|string',
            'telepon' => 'nullable|string',
            'tanggal_registrasi' => 'required|date',
            'jaminan' => 'required|string',
            'status_keanggotaan' => 'required|string',
            'atas_nama' => 'nullable|string',
            'no_reg_desa' => 'nullable|string',
            'no_reg_camat' => 'nullable|string',
            'password' => 'nullable|string|min:6',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Jika ada file foto baru di-upload
        if ($request->hasFile('photo')) {
            // Hapus file lama jika ada
            if ($anggota->photo && Storage::disk('public')->exists($anggota->photo)) {
                Storage::disk('public')->delete($anggota->photo);
            }

            // Simpan foto baru
            $validated['photo'] = $request->file('photo')->store('anggota_photos', 'public');
        }

        // Jika password diisi, hash dan update. Kalau tidak, abaikan
        if (!empty($request->password)) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $anggota->update($validated);

        return back()->with('success', 'Data anggota berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);

        if ($anggota->photo) {
            Storage::disk('public')->delete($anggota->photo);
        }

        $anggota->delete();

        return back()->with('success', 'Data anggota berhasil dihapus.');
    }
}
