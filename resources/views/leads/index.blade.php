@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <h1>Data Leads</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('leads.index') }}" class="mb-3">
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" name="date" class="form-control" value="{{ request()->get('date') }}">
                </div>

                <div class="col-md-2">
                    <label for="sales" class="form-label">Sales</label>
                    <select name="sale_id" id="sales" class="form-select">
                        <option value="">--Pilih Sales--</option>
                        @foreach($sales as $s)
                            <option value="{{ $s->sale_id }}" {{ request()->get('sale_id') == $s->sale_id ? 'selected' : '' }}>
                                {{ $s->nama_sales }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="product" class="form-label">Produk</label>
                    <select name="product_id" id="product" class="form-select">
                        <option value="">--Pilih Produk--</option>
                        @foreach($produk as $p)
                            <option value="{{ $p->product_id }}" {{ request()->get('product_id') == $p->product_id ? 'selected' : '' }}>
                                {{ $p->product_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Cari</button>
            <a href="{{ route('leads.index') }}" class="btn btn-secondary">Reset</a>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Sales</th>
                        <th>Produk</th>
                        <th>No. WA</th>
                        <th>Nama Lead</th>
                        <th>Kota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leads as $lead)
                        <tr>
                            <td>{{ $lead->lead_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($lead->date)->format('d/m/Y') }}</td>
                            <td>{{ $lead->sales->nama_sales ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $lead->product->product_name ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $lead->phone }}</td>
                            <td>{{ $lead->lead_name }}</td>
                            <td>{{ $lead->city }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
