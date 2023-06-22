<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Loan;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\History;
use App\Notifications\PeminjamanAlatDisetujuiNotification;
use Illuminate\Support\Facades\Notification;



class LoanController extends Controller
{
    public function create()
    {

        $goods = Goods::all();
        $nim = Auth::user()->nim;

        return view('loan.create', compact('goods', 'nim'));


        // return view('loan.create', compact('goods'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nim' => 'required',
            'nomor_hp' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_pinjaman',
            'kode_pbl' => 'required',
            'goods_id' => 'required|exists:goods,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $loanData = $validator->validated();
        $loanData['status'] = 'pending'; // Menambahkan status awal peminjaman sebagai "pending"

        $goods = Goods::findOrFail($loanData['goods_id']);
        if ($goods->stock < $loanData['jumlah']) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi!');
        }

        // Buat peminjaman
        $loan = Loan::create($loanData);

        // Kurangi stok barang yang dipinjam
        // $goods->stock -= $loanData['jumlah'];
        $goods->save();

        return redirect()->back()->with('success', 'Permohonan peminjaman anda berhasil dikirim menunggu persetujuan
        ADMIN. Silahkan cek status peminjaman anda di halaman Status Peminjaman!');
    }



    public function returnForm()
    {
        $nim = Auth::user()->nim; // Mengambil NIM mahasiswa yang sedang login
        $loans = Loan::where('nim', $nim)->get();
        $goods = $loans->map(function ($loan) {
            return $loan->goods;
        });

        return view('loan.return', compact('goods', 'loans'));
    }

    public function return (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nim' => 'required',
            'nomor_hp' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'kode_pbl' => 'required',
            'goods_id' => 'required|exists:goods,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['tanggal_pinjaman'] = now(); // Tambahkan nilai untuk tanggal_pinjaman

        $loan = Loan::where('nim', $validatedData['nim'])
            ->where('goods_id', $validatedData['goods_id'])
            ->firstOrFail();

        // Pindahkan data peminjaman ke tabel histories
        $historyData = [
            'email' => $loan->email,
            'nim' => $loan->nim,
            'nomor_hp' => $loan->nomor_hp,
            'jumlah' => $loan->jumlah,
            'tanggal_pinjaman' => $loan->tanggal_pinjaman,
            'tanggal_pengembalian' => $loan->tanggal_pengembalian,
            'kode_pbl' => $loan->kode_pbl,
            'goods_id' => $loan->goods_id,
            'status' => 'dicek',
        ];

        History::create($historyData);

        $loan->delete(); // Hapus data peminjaman dari tabel loans

        return redirect()->back()->with('success', 'Pengembalian berhasil dilakukan!');
    }

    public function adminIndex()
    {
        $loans = Loan::all();
        return view('admin.loans.index', compact('loans'));
    }

    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = $request->input('status');

        if ($loan->status === 'tolak') {
            $loan->save();
            Session::flash('notification', 'Peminjaman Anda ditolak.');
            $loan->delete(); // Hapus data peminjaman dari tabel loans jika ditolak
        } elseif ($loan->status === 'setujui') {
            // Mengurangi stok barang hanya jika status diubah menjadi "setujui"
            $goods = Goods::findOrFail($loan->goods_id);
            if ($goods->stock >= $loan->jumlah) {
                $goods->stock -= $loan->jumlah;
                $goods->save();
            } else {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi!');
            }

            $loan->save();

            // Mengirim notifikasi ke mahasiswa
            $user = Auth::user();
            // $user->notify(new PeminjamanAlatDisetujuiNotification($loan));

            Session::forget('notification'); // Hapus notifikasi jika status bukan 'tolak'
        } else {
            $loan->save();
        }

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui!');
    }


    public function status()
    {
        $nim = Auth::user()->nim;
        $loans = Loan::where('nim', $nim)->where('status', '!=', 'dikembalikan')->get();

        return view('status', compact('loans'));
    }

    public function riwayatPeminjaman()
    {
        $nim = Auth::user()->nim;
        $riwayatPeminjaman = History::where('nim', $nim)
            ->where('status', 'setujui')
            ->get();

        return view('riwayat-peminjaman', compact('riwayatPeminjaman'));
    }

    public function adminRiwayatPeminjaman()
    {
        $riwayatPeminjaman = History::where('status', 'setujui')
            ->get();

        return view('admin.riwayat-peminjaman', compact('riwayatPeminjaman'));
    }

    // public function adminReturnIndex()
    // {
    //     $returns = History::where('status', 'pending')->get();
    //     return view('admin.loans.return', compact('returns'));
    // }

    public function adminCheckedIndex()
    {
        $histories = History::where('status', 'dicek' , 'tolak')->get();
        return view('admin.loans.return', compact('histories'));
    }

    public function returnUpdate(Request $request, $id)
    {
        $histories = History::findOrFail($id);
        $histories->status = $request->input('status');

        if ($histories->status === 'tolak') {
            // $histories->delete();
             $histories->save();
            Session::flash('notification', 'Pengembalian ditolak.');
        } elseif ($histories->status === 'setujui') {
            $histories->save(); 

            // $histories = History::findOrFail($histories);
            // $histories->status = 'dikembalikan';
            // $histories->save();
            // Mengurangi stok barang hanya jika status diubah menjadi "setujui"
            $goods = Goods::findOrFail($histories->goods_id);
            if ($goods->stock >= $histories->jumlah) {
                $goods->stock += $histories->jumlah;
                $goods->save();
            } else {
                $histories->save();
            }

            return redirect()->back()->with('success', 'Status Pengembalian berhasil diperbarui!');
        }
    }

}
