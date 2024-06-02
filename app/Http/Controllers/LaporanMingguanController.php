<?php


namespace App\Http\Controllers;


use App\LaporanMingguan;
use Illuminate\Http\Request;
use App\Services\UploadService;

class LaporanMingguanController extends Controller
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
        $laporanMingguan = LaporanMingguan::latest()->paginate(5);
        return view('laporan-mingguan.index',compact('laporanMingguan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan-mingguan.create');
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
            'minggu_ke' => $request->minggu_ke,
            'file_laporan'  => $this->uploadService->fileUpload('laporan-mingguan')
        ]);

        LaporanMingguan::create($request->all());

        return redirect()->route('laporan-mingguan.index')
                        ->with('success','Berhasil Menambahkan Laporan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\LaporanMingguan  $laporanMingguan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanMingguan $laporanMingguan)
    {
        return view('laporan-mingguan.show',compact('laporanMingguan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LaporanMingguan  $laporanMingguan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanMingguan $laporanMingguan)
    {
        return view('laporan-mingguan.edit',compact('laporanMingguan'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LaporanMingguan  $laporanMingguan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanMingguan $laporanMingguan)
    {
        $request->request->add([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'minggu_ke' => $request->minggu_ke,
            // 'file_laporan'  => $this->uploadService->fileUpload('laporan-mingguan')
        ]);

        if(!empty(request()->file('file'))){
            $upload = $this->uploadService->fileUpload('laporan-mingguan');
            $request['file_laporan'] = $upload;
        }

        $laporanMingguan->update($request->all());

        return redirect()->route('laporan-mingguan.index')
                        ->with('success','Berhasil Mengubah Laporan!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaporanMingguan  $laporanMingguan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanMingguan $laporanMingguan)
    {
        $laporanMingguan->delete();

        return redirect()->route('laporan-mingguan.index')
                        ->with('success','Berhasil Menghapus Laporan!');
    }
}
