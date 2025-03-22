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
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="sales" class="form-label">Sales</label>
                <select name="id_sales" id="sales" class="form-select" required>
                    <option value="">--Pilih Sales--</option>
                    @foreach($sales as $s)
                        <option value="{{ $s->id_sales }}">{{ $s->nama_sales }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="produk" class="form-label">Produk</label>
                <select name="id_produk" id="produk" class="form-select" required>
                    <option value="">--Pilih Produk--</option>
                    @foreach($produk as $p)
                        <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="no_wa" class="form-label">No WhatsApp</label>
                <input type="tel" name="no_wa" id="no_wa" class="form-control" required pattern="[0-9]*" maxlength="15" placeholder="Masukan No WA" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>

            <div class="col-md-4">
                <label for="nama_lead" class="form-label">Nama Lead</label>
                <input type="text" name="nama_lead" placeholder="Masukan Nama Lead" id="nama_lead" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" name="kota" placeholder="Masukan Kota" id="kota" class="form-control" required>
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
