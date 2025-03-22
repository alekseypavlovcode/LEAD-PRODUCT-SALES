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
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ request()->get('tanggal') }}">
                </div>
                
                <div class="col-md-2">
                    <label for="sales" class="form-label">Sales</label>
                    <select name="id_sales" id="sales" class="form-select">
                        <option value="">--Pilih Sales--</option>
                        @foreach($sales as $s)
                            <option value="{{ $s->id_sales }}" {{ request()->get('id_sales') == $s->id_sales ? 'selected' : '' }}>
                                {{ $s->nama_sales }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="produk" class="form-label">Produk</label>
                    <select name="id_produk" id="produk" class="form-select">
                        <option value="">--Pilih Produk--</option>
                        @foreach($produk as $p)
                            <option value="{{ $p->id_produk }}" {{ request()->get('id_produk') == $p->id_produk ? 'selected' : '' }}>
                                {{ $p->nama_produk }}
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
                            <td>{{ $lead->id_leads }}</td>
                            <td>{{ \Carbon\Carbon::parse($lead->tanggal)->format('d/m/Y') }}</td>
                            <td>{{ $lead->sales->nama_sales ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $lead->produk->nama_produk ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $lead->no_wa }}</td>
                            <td>{{ $lead->nama_lead }}</td>
                            <td>{{ $lead->kota }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
