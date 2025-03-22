<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Produk;
use App\Models\Sales;

class LeadsController extends Controller
{
    public function create()
    {
        $sales = Sales::all();
        $produk = Produk::all();
        return view('leads.create', compact('sales', 'produk'));
    }

    public function store(Request $request)
    {
        echo "Function called";
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_sales' => 'required',
            'id_produk' => 'required',
            'no_wa' => 'required|string|max:20',
            'nama_lead' => 'required|string|max:50',
            'kota' => 'required|string|max:50',
        ]);

        Lead::create($validated);

        return redirect()->route('leads.index')->with('success', 'Leads berhasil ditambahkan.');
    }

    public function index(Request $request)
    {
        $query = Lead::query();

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        if ($request->filled('id_sales')) {
            $query->where('id_sales', $request->id_sales);
        }

        if ($request->filled('id_produk')) {
            $query->where('id_produk', $request->id_produk);
        }

        $leads = $query->get();

        $sales = Sales::all();
        $produk = Produk::all();

        return view('leads.index', compact('leads', 'sales', 'produk'));
    }
}