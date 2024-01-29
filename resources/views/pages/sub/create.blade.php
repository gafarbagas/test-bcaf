@extends('layouts.admin')

@section('title')
Buat Pengajuan
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 m-0 text-black">Buat Pengajuan</h1>

        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="/pengajuan">Pengajuan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buat Pengajuan</li>
        </ol>
    </div>

    <form action="{{route('sub.store')}}" method="POST">
        @csrf
        <div class="card my-3">
            <div class="card-body text-dark">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="identity_number" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('identity_number') is-invalid @enderror" id="identity_number" name="identity_number" placeholder="NIK" value="{{ old('identity_number') }}">
                        @error('identity_number')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="birthdate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" placeholder="Tanggal Lahir" value="{{ old('birthdate') }}">
                        @error('birthdate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="marriage_status" class="col-sm-2 col-form-label">Status Perkawinan</label>
                    <div class="col-sm-2">
                        <select name="marriage_status" class="form-control @error('marriage_status') is-invalid @enderror" id="marriage_status">
                            <option value="">-- Pilih --</option>
                            <option value="lajang">Lajang</option>
                            <option value="menikah">Menikah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="partner_name" class="col-sm-2 col-form-label">Nama Pasangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('partner_name') is-invalid @enderror" id="partner_name" name="partner_name" placeholder="Nama Pasangan" value="{{ old('partner_name') }}">
                        @error('partner_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="partner_identity_number" class="col-sm-2 col-form-label">NIK Pasangan</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('partner_identity_number') is-invalid @enderror" id="partner_identity_number" name="partner_identity_number" placeholder="NIK Pasangan" value="{{ old('partner_identity_number') }}">
                        @error('partner_identity_number')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dealer" class="col-sm-2 col-form-label">Dealer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('dealer') is-invalid @enderror" id="dealer" name="dealer" placeholder="Dealer" value="{{ old('dealer') }}">
                        @error('dealer')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vehicle_brand" class="col-sm-2 col-form-label">Merk Kendaraan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('vehicle_brand') is-invalid @enderror" id="vehicle_brand" name="vehicle_brand" placeholder="Merk Kendaraan" value="{{ old('vehicle_brand') }}">
                        @error('vehicle_brand')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vehicle_type" class="col-sm-2 col-form-label">Tipe Kendaraan</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('vehicle_type') is-invalid @enderror" id="vehicle_type" name="vehicle_type" placeholder="Tipe Kendaraan" value="{{ old('vehicle_type') }}">
                        @error('vehicle_type')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vehicle_model" class="col-sm-2 col-form-label">Model Kendaraan</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('vehicle_model') is-invalid @enderror" id="vehicle_model" name="vehicle_model" placeholder="Model Kendaraan" value="{{ old('vehicle_model') }}">
                        @error('vehicle_model')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vehicle_color" class="col-sm-2 col-form-label">Warna Kendaraan</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control @error('vehicle_color') is-invalid @enderror" id="vehicle_color" name="vehicle_color" placeholder="Warna Kendaraan" value="{{ old('vehicle_color') }}">
                        @error('vehicle_color')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vehicle_price" class="col-sm-2 col-form-label">Harga Kendaraan</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control @error('vehicle_price') is-invalid @enderror" id="vehicle_price" name="vehicle_price" placeholder="Harga Kendaraan" value="{{ old('vehicle_price') }}">
                        @error('vehicle_price')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="insurance" class="col-sm-2 col-form-label">Asuransi</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control @error('insurance') is-invalid @enderror" id="insurance" name="insurance" placeholder="Asuransi" value="{{ old('insurance') }}">
                        @error('insurance')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="down_payment" class="col-sm-2 col-form-label">Down Payment</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control @error('down_payment') is-invalid @enderror" id="down_payment" name="down_payment" placeholder="Down Payment" value="{{ old('down_payment') }}">
                        @error('down_payment')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="installment_time" class="col-sm-2 col-form-label">Lama Kredit</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control @error('installment_time') is-invalid @enderror" id="installment_time" name="installment_time" placeholder="Lama Kredit" value="{{ old('installment_time') }}">
                        @error('installment_time')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <label class="col-sm-2 col-form-label">Bulan</label>
                </div>
                <div class="form-group row">
                    <label for="installment_amount" class="col-sm-2 col-form-label">Angsuran</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control @error('installment_amount') is-invalid @enderror" id="installment_amount" name="installment_amount" placeholder="Angsuran" value="{{ old('installment_amount') }}">
                        @error('installment_amount')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <label class="col-sm-2 col-form-label">/ Bulan</label>
                </div>
            </div>
        </div>
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary px-5">Tambah</button>
        </div>
    </form>
</div>

@endsection