@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <h2>Selamat Datang Di Tambah Leads</h2>
    <form action="{{ route('leads.store') }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf

        <a href="{{ url('/leads') }}" class="btn btn-success">
            <i class="bi bi-box-arrow-left"></i> Kembali
        </a>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="sales" class="form-label">Sales</label>
                <select name="sale_id" id="sales" class="form-select" required>
                    <option value="">--Pilih Sales--</option>
                    @foreach($sales as $s)
                        <option value="{{ $s->sale_id }}">{{ $s->nama_sales }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="product" class="form-label">Produk</label>
                <select name="product_id" id="product" class="form-select" required>
                    <option value="">--Pilih Produk--</option>
                    @foreach($produk as $p)
                        <option value="{{ $p->product_id }}">{{ $p->product_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="phone" class="form-label">No WhatsApp</label>
                <input type="tel" name="phone" id="phone" class="form-control" required pattern="[0-9]*" maxlength="15" placeholder="Masukan No WA" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>

            <div class="col-md-4">
                <label for="lead_name" class="form-label">Nama Lead</label>
                <input type="text" name="lead_name" placeholder="Masukan Nama Lead" id="lead_name" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="city" class="form-label">Kota</label>
                <input type="text" name="city" placeholder="Masukan Kota" id="city" class="form-control" required>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="mx-1">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <div class="mx-1">
                <button type="button" class="btn btn-light border border-dark" onclick="window.history.back();">Cancel</button> <!-- Ganti warna menjadi putih -->
            </div>
        </div>
    </form>
</div>
@endsection
