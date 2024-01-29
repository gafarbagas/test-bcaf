@extends('layouts.admin')

@push('style')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('title')
Pengajuan
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 m-0 text-black">Pengajuan</h1>

        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengajuan</li>
        </ol>
    </div>

    <div class="card my-3">
        <div class="card-body text-dark">
            <a href="{{route('sub.create')}}" class="btn btn-sm btn-primary btn-icon-split mb-4">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
            </a>

            <table class="table table-sm table-bordered my-3 text-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25px">No.</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th width="90px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $datas as $data )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->status == 0 ? 'Pending' : 'Approved'}}</td>
                        <td>
                            <a href="{{ route('sub.edit', ['id' => \Crypt::encrypt($data->id)])}}" class="btn btn-sm btn-secondary">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            @if (Auth::user()->role_id == 2)
                                <a href="{{ route('sub.show', ['id' => \Crypt::encrypt($data->id)])}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                            <button data-id="{{\Crypt::encrypt($data->id)}}" class="btn btn-sm btn-danger delete-confirm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="{{asset('vendor/sweetalert2/sweetalert2-v11.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "lengthMenu": [[10,25,50,-1], [10,25,50,"All"]],
            "language": {
                "sEmptyTable":   "Tidak ada data",
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Tampilkan _MENU_ data",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 data",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "<",
                    "sNext":     ">",
                    "sLast":     "Terakhir"
                }
            }
        });
    });
</script>
<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const id = $(this).attr('data-id');
        const urlDelete = "{{ route('sub.delete', ":id")}}";
        const url = urlDelete.replace(':id', id);
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Harap periksa kembali. Data yang akan dihapus tidak akan bisa kembali!",
            icon: 'warning',
            reverseButtons: true,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#888888',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>
@endpush