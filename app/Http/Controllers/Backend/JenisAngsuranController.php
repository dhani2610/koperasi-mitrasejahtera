<?php

namespace App\Http\Controllers\Backend;

use App\Models\JenisAngsuran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisAngsuranController extends Controller
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
     * Show the form for creating a new resource.
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Jenis Angsuran';
        $data['angsuran'] = JenisAngsuran::latest()->get();

        return view('backend.pages.master-data.jenis-angsuran.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lama_angsuran' => 'required|integer|min:1',
            'aktif' => 'required|in:Y,T',
        ]);

        JenisAngsuran::create([
            'lama_angsuran' => $request->lama_angsuran,
            'aktif' => $request->aktif,
        ]);

        return back()->with('success', 'Jenis angsuran berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $jenis = JenisAngsuran::findOrFail($id);

        $request->validate([
            'lama_angsuran' => 'required|integer|min:1',
            'aktif' => 'required|in:Y,T',
        ]);

        $jenis->update([
            'lama_angsuran' => $request->lama_angsuran,
            'aktif' => $request->aktif,
        ]);

        return back()->with('success', 'Jenis angsuran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenis = JenisAngsuran::findOrFail($id);
        $jenis->delete();

        return back()->with('success', 'Jenis angsuran berhasil dihapus.');
    }
}
