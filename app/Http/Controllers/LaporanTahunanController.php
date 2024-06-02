<?php


namespace App\Http\Controllers;


use App\LaporanTahunan;
use Illuminate\Http\Request;
use App\Services\UploadService;

class LaporanTahunanController extends Controller
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
        $laporanTahunan = LaporanTahunan::latest()->paginate(5);
        return view('laporan-tahunan.index',compact('laporanTahunan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan-tahunan.create');
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
            'file_laporan'  => $this->uploadService->fileUpload('laporan-tahunan')
        ]);

        LaporanTahunan::create($request->all());

        return redirect()->route('laporan-tahunan.index')
                        ->with('success','Berhasil Menambahkan Laporan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\LaporanTahunan  $laporanTahunan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanTahunan $laporanTahunan)
    {
        return view('laporan-tahunan.show',compact('laporanTahunan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LaporanTahunan  $laporanTahunan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanTahunan $laporanTahunan)
    {
        return view('laporan-tahunan.edit',compact('laporanTahunan'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LaporanTahunan  $laporanTahunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanTahunan $laporanTahunan)
    {
        $request->request->add([
            'tahun' => $request->tahun,
            // 'file_laporan'  => $this->uploadService->fileUpload('laporan-tahunan')
        ]);

        if(!empty(request()->file('file'))){
            $upload = $this->uploadService->fileUpload('laporan-tahunan');
            $request['file_laporan'] = $upload;
        }

        $laporanTahunan->update($request->all());

        return redirect()->route('laporan-tahunan.index')
                        ->with('success','Berhasil Mengubah Laporan!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaporanTahunan  $laporanTahunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanTahunan $laporanTahunan)
    {
        $laporanTahunan->delete();

        return redirect()->route('laporan-tahunan.index')
                        ->with('success','Berhasil Menghapus Laporan!');
    }
}
