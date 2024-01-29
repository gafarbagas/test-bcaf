@extends('layouts.admin')

@section('title')
Konfirmasi Pengajuan
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 m-0 text-black">Konfirmasi Pengajuan</h1>

        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="/pengajuan">Pengajuan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pengajuan</li>
        </ol>
    </div>

    <div class="card my-3">
        <div class="card-body text-dark">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $sub->name }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" value="{{ $sub->identity_number }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" value="{{ $sub->birthdate }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status Pernikahan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" value="{{ $sub->marriage_status }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pasangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$sub->partner_name }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="partner_identity_number" class="col-sm-2 col-form-label">NIK Pasangan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" value="{{ $sub->partner_identity_number }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="dealer" class="col-sm-2 col-form-label">Dealer</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" value="{{ $sub->dealer }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="vehicle_brand" class="col-sm-2 col-form-label">Merk Kendaraan</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" value="{{ $sub->vehicle_brand }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="vehicle_type" class="col-sm-2 col-form-label">Tipe Kendaraan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" value="{{ $sub->vehicle_type }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="vehicle_model" class="col-sm-2 col-form-label">Model Kendaraan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" value="{{ $sub->vehicle_model }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="vehicle_color" class="col-sm-2 col-form-label">Warna Kendaraan</label>
                <div class="col-sm-2">
                    <input type="text"  class="form-control" value="{{ $sub->vehicle_color }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="vehicle_price" class="col-sm-2 col-form-label">Harga Kendaraan</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{ $sub->vehicle_price }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="insurance" class="col-sm-2 col-form-label">Asuransi</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{ $sub->insurance }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="down_payment" class="col-sm-2 col-form-label">Down Payment</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{ $sub->down_payment }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="installment_time" class="col-sm-2 col-form-label">Lama Kredit</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{ $sub->installment_time }}" disabled>
                </div>
                <label class="col-sm-2 col-form-label">Bulan</label>
            </div>
            <div class="form-group row">
                <label for="installment_amount" class="col-sm-2 col-form-label">Angsuran</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{ $sub->installment_amount }}" disabled>
                </div>
                <label class="col-sm-2 col-form-label">/ Bulan</label>
            </div>
        </div>
    </div>
    <form action="{{ route('sub.approval', \Crypt::encrypt($sub->id)) }}" method="POST">
        @csrf
        @method('put')
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary px-5">Approve</button>
        </div>
    </form>
</div>

@endsection