<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Sales;

class LeadsController extends Controller
{
    public function create()
    {
        $sales = Sales::all();
        $produk = Product::all();
        return view('leads.create', compact('sales', 'product'));
    }

    public function store(Request $request)
    {
        echo "Function called";
        $validated = $request->validate([
            'date' => 'required|date',
            'sale_id' => 'required',
            'product_id' => 'required',
            'phone' => 'required|string|max:20',
            'lead_name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
        ]);

        Lead::create($validated);

        return redirect()->route('leads.index')->with('success', 'Leads berhasil ditambahkan.');
    }

    public function index(Request $request)
    {
        $query = Lead::query();

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('sale_id')) {
            $query->where('sale_id', $request->sale_id);
        }

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        $leads = $query->get();

        $sales = Sales::all();
        $produk = Product::all();

        return view('leads.index', compact('leads', 'sales', 'product'));
    }
}
