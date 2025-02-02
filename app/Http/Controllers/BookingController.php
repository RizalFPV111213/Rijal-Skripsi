<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Package;
use App\Bank;
use App\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $banks = Bank::where('is_active', true)->get();
        return view('user.photographer', compact('packages', 'banks'));
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email',
                'telepon' => 'required|string',
                'paket' => 'required|exists:packages,id',
                'bank' => 'required|exists:banks,id',
                'tanggal' => 'required|date|after:today',
                'pesan' => 'nullable|string'
            ]);

            $booking = Booking::create([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'telepon' => $validated['telepon'],
                'package_id' => $validated['paket'],
                'bank_id' => $validated['bank'],
                'tanggal_booking' => $validated['tanggal'],
                'pesan' => $validated['pesan'],
                'status' => 'pending'
            ]);

            return response()->json([
                'success' => true,
                'booking_id' => $booking->id,
                'message' => 'Booking berhasil dibuat'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
