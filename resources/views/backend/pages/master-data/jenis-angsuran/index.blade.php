@extends('backend.layouts-new.app')

@section('content')
    <style>
        label {
            float: left;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Data Jenis Angsuran</h4>
                        <p class="float-right">
                            <a class="btn btn-primary text-white mb-3" style="float: right" data-bs-toggle="modal"
                                data-bs-target="#modalCreateAngsuran">
                                Tambah Jenis Angsuran
                            </a>
                        </p>

                        <!-- Modal Tambah Jenis Angsuran -->
                        <div class="modal fade" id="modalCreateAngsuran" tabindex="-1" aria-labelledby="modalAngsuranLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('jenis-angsuran.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Jenis Angsuran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Lama Angsuran (Bulan)*</label>
                                                <input type="number" name="lama_angsuran" class="form-control" required
                                                    min="1">
                                            </div>
                                            <div class="form-group">
                                                <label>Aktif</label>
                                                <select name="aktif" class="form-control" required>
                                                    <option value="">Pilih Aktif</option>
                                                    <option value="Y">Y</option>
                                                    <option value="T">T</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="table-responsive mt-3">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="table table-bordered text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Lama Angsuran (Bulan)</th>
                                        <th>Aktif</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($angsuran as $a)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $a->lama_angsuran }}</td>
                                            <td>{{ $a->aktif }}</td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $a->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('jenis-angsuran.destroy', $a->id) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $a->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('jenis-angsuran.update', $a->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Jenis Angsuran</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Lama Angsuran (Bulan)*</label>
                                                                <input type="number" name="lama_angsuran"
                                                                    class="form-control" value="{{ $a->lama_angsuran }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Aktif</label>
                                                                <select name="aktif" class="form-control" required>
                                                                    <option value="Y"
                                                                        {{ $a->aktif == 'Y' ? 'selected' : '' }}>Y</option>
                                                                    <option value="T"
                                                                        {{ $a->aktif == 'T' ? 'selected' : '' }}>T</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
