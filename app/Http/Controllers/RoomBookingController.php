<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class RoomBookingController extends Controller
{
    public function create()
    {
        $rooms = Room::where('status', 'tersedia')->get();
        $nim = Auth::user()->nim;

        return view('room_bookings.create', compact('rooms', 'nim'));
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'nama_kegiatan' => 'required',
        'nim' => 'required',
        'nomor_hp' => 'required',
        'bukti_persetujuan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'kode_pbl' => 'required',
        'ruangan_id' => 'required',
        'tanggal_kegiatan' => 'required',
        'jam_penggunaan' => 'required',
        'nama_pengguna' => 'required',
        'penanggung_jawab' => 'required',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator->errors())->withInput();
    }

    $ruangan_id = $request->input('ruangan_id');
    $isRuanganInUse = RoomBooking::where('ruangan_id', $ruangan_id)
        ->whereIn('status', ['sedang digunakan', 'pending'])
        ->exists();

    if ($isRuanganInUse) {
        return back()->withErrors(['Ruangan sedang digunakan. Silakan pilih ruangan lain.']);
    }

    if ($request->hasFile('bukti_persetujuan')) {
        $file = $request->file('bukti_persetujuan');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('bukti_persetujuan', $fileName, 'public');
    }

    $roomBooking = new RoomBooking();
    $roomBooking->email = $request->input('email');
    $roomBooking->nama_kegiatan = $request->input('nama_kegiatan');
    $roomBooking->nim = $request->input('nim');
    $roomBooking->nomor_hp = $request->input('nomor_hp');
    $roomBooking->bukti_persetujuan = $fileName ?? null;
    $roomBooking->kode_pbl = $request->input('kode_pbl');
    $roomBooking->ruangan_id = $request->input('ruangan_id');
    $roomBooking->tanggal_kegiatan = $request->input('tanggal_kegiatan');
    $roomBooking->jam_penggunaan = $request->input('jam_penggunaan');
    $roomBooking->nama_pengguna = $request->input('nama_pengguna');
    $roomBooking->penanggung_jawab = $request->input('penanggung_jawab');
    $roomBooking->status = 'sedang digunakan';
    $roomBooking->save();

    $room = Room::find($ruangan_id);
    $room->status = 'sedang digunakan';
    $room->save();

    return redirect()->route('room_bookings.create')->with('success', 'Permintaan pemesanan ruangan berhasil disimpan.');
}







    // public function store(Request $request)
    // {
    //     // Validasi input form
    //     $validatedData = $request->validate([
    //         'email' => 'required|email',
    //         'nama_kegiatan' => 'required',
    //         'nim' => 'required',
    //         'nomor_hp' => 'required',
    //         'bukti_persetujuan' => 'required',
    //         'kode_pbl' => 'required',
    //         'ruangan' => 'required',
    //         'tanggal_kegiatan' => 'required',
    //         'jam_penggunaan' => 'required',
    //         'nama_pengguna' => 'required',
    //         'penanggung_jawab' => 'required',
    //     ], [
    //             'email.required' => 'Email harus diisi.',
    //             'email.email' => 'Format email tidak valid.',
    //             'nama_kegiatan.required' => 'Nama kegiatan harus diisi.',
    //             'nim.required' => 'NIM harus diisi.',
    //             'nomor_hp.required' => 'nomor hp harus diisi.',
    //             'bukti_persetujuan.required' => 'Foto harus diupload',
    //             'kode_pbl.required' => 'kode harus diisi',
    //             'ruangan.required' => 'ruangan harus diisi',
    //             'tanggal_kegiatan.required' => 'ruangan harus diisi',
    //             'jam_penggunaan.required' => 'jam harus diisi',
    //             'nama_pengguna.required' => 'nama harus diisi',
    //             'penanggung_jawab.required' => 'nama penanggung jawab harus diisi',

    //         ]);

    //     // Cek apakah ruangan sedang digunakan
    //     $ruangan = $request->input('ruangan');
    //     $isRuanganInUse = RoomBooking::where('ruangan', $ruangan)
    //         ->whereIn('status', ['sedang digunakan', 'pending'])
    //         ->exists();

    //     if ($isRuanganInUse) {
    //         return redirect()->back()
    //             ->with('error', 'Ruangan sedang digunakan. Mohon pilih ruangan lain.');
    //     }

    //     // Menyimpan file gambar
    //     if ($request->hasFile('bukti_persetujuan')) {
    //         $bukti_persetujuan = $request->file('bukti_persetujuan')->store('public/bukti_persetujuan');
    //         $bukti_persetujuan = basename($bukti_persetujuan);
    //     } else {
    //         $foto = null;
    //     }

    //     $roombooking = new RoomBooking();
    //     $roombooking->email = $request->email;
    //     $roombooking->nama_kegiatan = $request->nama_kegiatan;
    //     $roombooking->nim = $request->nim;
    //     $roombooking->nomor_hp = $request->nomor_hp;
    //     $roombooking->bukti_persetujuan = $bukti_persetujuan ? 'bukti_persetujuan/' . $bukti_persetujuan : null;
    //     $roombooking->kode_pbl = $request->kode_pbl;
    //     $roombooking->ruangan = $request->ruangan;
    //     $roombooking->tanggal_kegiatan = $request->tanggal_kegiatan;
    //     $roombooking->jam_penggunaan = $request->jam_penggunaan;
    //     $roombooking->nama_pengguna = $request->nama_pengguna;
    //     $roombooking->penanggung_jawab   = $request->penanggung_jawab;


    //     // Membuat peminjaman ruangan baru
    //     $roomBooking = new RoomBooking($request->all());
    //     $roomBooking->status = 'sedang digunakan';
    //     $roomBooking->save();

    //     // Mengupdate status ruangan menjadi "sedang digunakan"
    //     $ruangan = Room::find($ruangan);
    //     $ruangan->status = 'sedang digunakan';
    //     $ruangan->save();

    //     return redirect()->route('room_booking.index')
    //         ->with('success', 'Peminjaman ruangan berhasil disimpan.');

    // }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $roomBooking = RoomBooking::find($id);

    //     return view('room_booking.show', compact('roomBooking'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $roomBooking = RoomBooking::find($id);

    // return view('room_bookings.return', compact('roomBooking'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     // Validasi input form
    //     $request->validate([
    //         'email' => 'required',
    //         'nama_kegiatan' => 'required',
    //         'nim' => 'required',
    //         'nomor_hp' => 'required',
    //         'bukti_persetujuan' => 'required',
    //         'kode_pbl' => 'required',
    //         'ruangan' => 'required',
    //         'tanggal_kegiatan' => 'required',
    //         'jam_penggunaan' => 'required',
    //         'nama_pengguna' => 'required',
    //         'penanggung_jawab' => 'required',
    //     ]);

    //     // Update peminjaman ruangan
    //     $roomBooking->update($request->all());

    //     return redirect()->route('room_booking.index')
    //         ->with('success', 'Peminjaman ruangan berhasil diperbarui.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //      // Hapus peminjaman ruangan
    //      $roomBooking->delete();

    //      return redirect()->route('room_booking.index')
    //          ->with('success', 'Peminjaman ruangan berhasil dihapus.');
    // }
}
