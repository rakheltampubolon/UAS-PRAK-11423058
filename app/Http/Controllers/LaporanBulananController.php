<?php


namespace App\Http\Controllers;


use App\LaporanBulanan;
use Illuminate\Http\Request;
use App\Services\UploadService;

class LaporanBulananController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $uploadService;
    function __construct(UploadService $uploadService)
    {
        $this->middleware('permission:laporan-list', ['only' => ['index','show']]);
        $this->middleware('permission:laporan-create', ['only' => ['create','store']]);
        $this->middleware('permission:laporan-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:laporan-delete', ['only' => ['destroy']]);

        $this->uploadService = $uploadService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporanBulanan = LaporanBulanan::latest()->paginate(5);
        return view('laporan-bulanan.index',compact('laporanBulanan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan-bulanan.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'file_laporan'  => $this->uploadService->fileUpload('laporan-bulanan')
        ]);

        // dd($request);
        LaporanBulanan::create($request->all());

        return redirect()->route('laporan-bulanan.index')
                        ->with('success','Berhasil Menambahkan Laporan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\LaporanBulanan  $laporanBulanan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanBulanan $laporanBulanan)
    {
        return view('laporan-bulanan.show',compact('laporanBulanan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LaporanBulanan  $laporanBulanan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanBulanan $laporanBulanan)
    {
        return view('laporan-bulanan.edit',compact('laporanBulanan'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LaporanBulanan  $laporanBulanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanBulanan $laporanBulanan)
    {
        $request->request->add([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            // 'file_laporan'  => $this->uploadService->fileUpload('laporan-bulanan')
        ]);

        if(!empty(request()->file('file'))){
            $upload = $this->uploadService->fileUpload('laporan-bulanan');
            $request['file_laporan'] = $upload;
        }

        $laporanBulanan->update($request->all());

        return redirect()->route('laporan-bulanan.index')
                        ->with('success','Berhasil Mengubah Laporan!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaporanBulanan  $laporanBulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanBulanan $laporanBulanan)
    {
        $laporanBulanan->delete();

        return redirect()->route('laporan-bulanan.index')
                        ->with('success','Berhasil Menghapus Laporan!');
    }
}
