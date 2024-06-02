<?php


namespace App\Http\Controllers;


use App\Booking;
use App\Lapangan;
use Illuminate\Http\Request;


class BookingController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:booking-list|booking-create|booking-edit|booking-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:booking-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(auth()->user()->role_id == 2){
            $bookings = Booking::with(['lapangan', 'user'])->latest()->paginate(5);
        }

        if(auth()->user()->role_id == 3){
            $bookings = Booking::with(['lapangan', 'user'])->where('user_id', auth()->User()->id)->latest()->paginate(5);
        }

        return view('bookings.index',compact('bookings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapangans= Lapangan::all();
        return view('bookings.create', compact('lapangans'));
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
            'lapangan_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $request->request->add([
            'lapangan_id' => $request->lapangan_id,
            'user_id' => auth()->user()->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'notes' => $request->notes
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')
                        ->with('success','Berhasil Menambahkan Booking!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $booking->load('lapangan', 'user');
        return view('bookings.show',compact('booking'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $lapangans = Lapangan::get();
        return view('bookings.edit',compact('booking', 'lapangans'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        request()->validate([
            'lapangan_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $request->request->add([
            'lapangan_id' => $request->lapangan_id,
            'user_id' => auth()->user()->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'notes' => $request->notes,
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
                        ->with('success','Berhasil Mengubah Booking!');
    }

    public function approve(Booking $booking, $id)
    {
        Booking::where('id', $id)->update([
            'status' => 'APPROVED'
        ]);

        return redirect()->route('bookings.index')->with('success','Berhasil Menyetujui Booking!');

    }

    public function reject(Booking $booking, $id)
    {

        Booking::where('id', $id)->update([
            'status' => 'REJECTED'
        ]);

        return redirect()->route('bookings.index')->with('success','Berhasil Menolak Booking!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
                        ->with('success','Berhasil Menghapus Booking!');
    }
}
