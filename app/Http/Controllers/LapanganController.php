<?php


namespace App\Http\Controllers;


use App\Lapangan;
use Illuminate\Http\Request;


class LapanganController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:lapangan-list|lapangan-create|lapangan-edit|lapangan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:lapangan-create', ['only' => ['create','store']]);
         $this->middleware('permission:lapangan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lapangan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapangans = Lapangan::latest()->paginate(5);
        return view('lapangans.index',compact('lapangans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lapangans.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Lapangan::create($request->all());

        return redirect()->route('lapangans.index')
                        ->with('success','Berhasil Menambahkan Lapangan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function show(Lapangan $lapangan)
    {
        return view('lapangans.show',compact('lapangan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapangan $lapangan)
    {
        return view('lapangans.edit',compact('lapangan'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapangan $lapangan)
    {
         request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $lapangan->update($request->all());

        return redirect()->route('lapangans.index')
                        ->with('success','Berhasil Mengubah Lapangan!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapangan $lapangan)
    {
        $lapangan->delete();

        return redirect()->route('lapangans.index')
                        ->with('success','Berhasil Menghapus Lapangan!');
    }
}
