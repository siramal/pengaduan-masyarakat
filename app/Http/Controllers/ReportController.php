<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\report;
use App\Models\Comment;


class ReportController extends Controller
{
    // /**
    //  * Menyimpan komentar pada pengaduan.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function storeComment(Request $request, $id)
    // {
    //     $request->validate([
    //         'comment' => 'required|string|max:500',
    //     ]);

    //     $report = Report::findOrFail($id);

    //     Comment::create([
    //         'report_id' => $report->id,
    //         'comment' => $request->comment,
    //         'user_id' => auth()->id(),                                                                                            // Mengambil ID pengguna yang login
    //     ]);

    //     return redirect()->route('report.show', $id)->with('success', 'Komentar berhasil ditambahkan.');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::all();
        return view('report.myreport', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinceUrl = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
        $province = Http::get($provinceUrl);
        $dataProvince = $province->json();
        return view('report/create', compact('dataProvince'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi request
        $validated = $request->validate([
            'province_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'report_type' => 'required',
            'report_detail' => 'required',
        ]);
        // dd(auth()->user()->id);
        $data = $request->except('image_path', 'report');
        $data['image_path'] = $request->file('image_path')->store('report', 'public');
        $data['user_id'] = auth()->user()->id;
        // Simpan data pengaduan
        $report = Report::create($data);

        // Redirect ke halaman artikel dengan pesan sukses
        return redirect('/articles')->with('success', 'Pengaduan berhasil ditambahkan!', compact('report'));
    }


    /**
     * Display the specified resource.
     */


    public function show($id)
    {
        $report = Report::findOrFail($id); // Fetch the report by ID or fail
        $report->increment('views');
        return view('report.show', compact('report'));
    }

    // public function vote($id)
    // {
    //     // Cari data laporan berdasarkan ID
    //     $report = Report::findOrFail($id);

    //     // Tambahkan jumlah voting
    //     $report->voting += 1;
    //     $report->save();

    //     // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    //     return redirect()->back()->with('success', 'Vote berhasil ditambahkan.');
    // }

    // public function unvote($id)
    // {
    //     // Cari data laporan berdasarkan ID
    //     $report = Report::findOrFail($id);

    //     // Kurangi jumlah voting
    //     $report->voting -= 1;
    //     $report->save();
    //     if ($report->voting < 0) {
    //         $report->voting = 0;
    //         $report->save();
    //     }

    //     // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    //     return redirect()->back()->with('success', 'Vote berhasil dihapus.');
    // }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
