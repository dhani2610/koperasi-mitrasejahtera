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
                        <h4 class="header-title float-left">Data Anggota</h4>
                        <p class="float-right">
                            <a class="btn btn-primary text-white mb-3" style="float: right" data-bs-toggle="modal"
                                data-bs-target="#modalCreateAnggota">
                                Tambah Data Anggota
                            </a>
                        </p>

                        <!-- Modal Tambah Anggota -->
                        <div class="modal fade" id="modalCreateAnggota" tabindex="-1" aria-labelledby="modalAnggotaLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <form action="{{ route('anggota.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Data Anggota</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap*</label>
                                                        <input type="text" name="nama" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NIK/Username*</label>
                                                        <input type="text" name="nik" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin*</label>
                                                        <select name="jenis_kelamin" class="form-control" required>
                                                            <option value="">Pilih Jenis Kelamin</option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tempat Lahir*</label>
                                                        <input type="text" name="tempat_lahir" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir*</label>
                                                        <input type="date" name="tanggal_lahir" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control">
                                                            <option value="">Pilih Status</option>
                                                            <option>Belum Kawin</option>
                                                            <option>Kawin</option>
                                                            <option>Cerai Hidup</option>
                                                            <option>Cerai Mati</option>
                                                            <option>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Penjamin</label>
                                                        <input type="text" name="penjamin" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No. SHM/SPPHT/BPKB</label>
                                                        <input type="text" name="no_jaminan" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan</label>
                                                        <select name="pekerjaan" class="form-control">
                                                            <option value="">Pilih Pekerjaan</option>
                                                            <option>Petani</option>
                                                            <option>Pekebun</option>
                                                            <option>Pegawai Negeri Sipil</option>
                                                            <option>Swasta</option>
                                                            <option>Wiraswasta</option>
                                                            <option>Mengurus Rumah Tangga</option>
                                                            <option>Pedagang</option>
                                                            <option>Pelajar</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="agama" class="form-control">
                                                            <option value="">Pilih Agama</option>
                                                            <option>Islam</option>
                                                            <option>Katolik</option>
                                                            <option>Protestan</option>
                                                            <option>Hindu</option>
                                                            <option>Budha</option>
                                                            <option>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat*</label>
                                                        <textarea name="alamat" class="form-control" rows="2" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Luas/Plat/Tahun*</label>
                                                        <input type="text" name="luas_plat_tahun" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No. Telepon / HP</label>
                                                        <input type="text" name="telepon" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Registrasi*</label>
                                                        <input type="date" name="tanggal_registrasi" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jaminan*</label>
                                                        <select name="jaminan" class="form-control" required>
                                                            <option value="">Pilih Jaminan</option>
                                                            <option>SHM</option>
                                                            <option>SPPHT</option>
                                                            <option>BPKB</option>
                                                            <option>SHM+SPPHT</option>
                                                            <option>SHM+BPKB</option>
                                                            <option>SPPHT+BPKB</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Aktif Keanggotaan*</label>
                                                        <select name="status_keanggotaan" class="form-control" required>
                                                            <option value="">Pilih Aktif Keanggotaan</option>
                                                            <option>Aktif</option>
                                                            <option>Non Aktif</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Photo</label>
                                                        <input type="file" name="photo" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Atas Nama</label>
                                                        <input type="text" name="atas_nama" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No.Reg Desa / Surat Ukur / Mesin</label>
                                                        <input type="text" name="no_reg_desa" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No.Reg Camat / SKBN / Rangka</label>
                                                        <input type="text" name="no_reg_camat" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Kosongkan jika tidak diubah">
                                                    </div>
                                                </div>
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
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tgl Lahir</th>
                                        <th>Status</th>
                                        <th>Alamat</th>
                                        <th>Jaminan</th>
                                        <th>Status Keanggotaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach (App\Models\Anggota::orderBy('created_at', 'desc')->get() as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->jaminan }}</td>
                                            <td>{{ $item->status_keanggotaan }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditAnggota" data-id="{{ $item->id }}"
                                                    data-nama="{{ $item->nama }}" data-nik="{{ $item->nik }}"
                                                    data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                    data-tempat_lahir="{{ $item->tempat_lahir }}"
                                                    data-tanggal_lahir="{{ $item->tanggal_lahir }}"
                                                    data-status="{{ $item->status }}"
                                                    data-penjamin="{{ $item->penjamin }}"
                                                    data-no_jaminan="{{ $item->no_jaminan }}"
                                                    data-pekerjaan="{{ $item->pekerjaan }}"
                                                    data-agama="{{ $item->agama }}" data-alamat="{{ $item->alamat }}"
                                                    data-luas_plat_tahun="{{ $item->luas_plat_tahun }}"
                                                    data-telepon="{{ $item->telepon }}"
                                                    data-tanggal_registrasi="{{ $item->tanggal_registrasi }}"
                                                    data-jaminan="{{ $item->jaminan }}"
                                                    data-status_keanggotaan="{{ $item->status_keanggotaan }}"
                                                    data-atas_nama="{{ $item->atas_nama }}"
                                                    data-no_reg_desa="{{ $item->no_reg_desa }}"
                                                    data-no_reg_camat="{{ $item->no_reg_camat }}">Edit</button>

                                                <form action="{{ route('anggota.destroy', $item->id) }}" method="GET"
                                                    style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Anggota -->
    <div class="modal fade" id="modalEditAnggota" tabindex="-1" aria-labelledby="modalEditAnggotaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form id="formEditAnggota" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap*</label>
                                    <input type="text" name="nama" id="edit_nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>NIK/Username*</label>
                                    <input type="text" name="nik" id="edit_nik" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin*</label>
                                    <select name="jenis_kelamin" id="edit_jenis_kelamin" class="form-control" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir*</label>
                                    <input type="text" name="tempat_lahir" id="edit_tempat_lahir"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir*</label>
                                    <input type="date" name="tanggal_lahir" id="edit_tanggal_lahir"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="edit_status" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option>Belum Kawin</option>
                                        <option>Kawin</option>
                                        <option>Cerai Hidup</option>
                                        <option>Cerai Mati</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penjamin</label>
                                    <input type="text" name="penjamin" id="edit_penjamin" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No. SHM/SPPHT/BPKB</label>
                                    <input type="text" name="no_jaminan" id="edit_no_jaminan" class="form-control">
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <select name="pekerjaan" id="edit_pekerjaan" class="form-control">
                                        <option value="">Pilih Pekerjaan</option>
                                        <option>Petani</option>
                                        <option>Pekebun</option>
                                        <option>Pegawai Negeri Sipil</option>
                                        <option>Swasta</option>
                                        <option>Wiraswasta</option>
                                        <option>Mengurus Rumah Tangga</option>
                                        <option>Pedagang</option>
                                        <option>Pelajar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" id="edit_agama" class="form-control">
                                        <option value="">Pilih Agama</option>
                                        <option>Islam</option>
                                        <option>Katolik</option>
                                        <option>Protestan</option>
                                        <option>Hindu</option>
                                        <option>Budha</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat*</label>
                                    <textarea name="alamat" id="edit_alamat" class="form-control" rows="2" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Luas/Plat/Tahun*</label>
                                    <input type="text" name="luas_plat_tahun" id="edit_luas_plat_tahun"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>No. Telepon / HP</label>
                                    <input type="text" name="telepon" id="edit_telepon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Registrasi*</label>
                                    <input type="date" name="tanggal_registrasi" id="edit_tanggal_registrasi"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jaminan*</label>
                                    <select name="jaminan" id="edit_jaminan" class="form-control" required>
                                        <option value="">Pilih Jaminan</option>
                                        <option>SHM</option>
                                        <option>SPPHT</option>
                                        <option>BPKB</option>
                                        <option>SHM+SPPHT</option>
                                        <option>SHM+BPKB</option>
                                        <option>SPPHT+BPKB</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Aktif Keanggotaan*</label>
                                    <select name="status_keanggotaan" id="edit_status_keanggotaan" class="form-control"
                                        required>
                                        <option value="">Pilih Aktif Keanggotaan</option>
                                        <option>Aktif</option>
                                        <option>Non Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Atas Nama</label>
                                    <input type="text" name="atas_nama" id="edit_atas_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No.Reg Desa / Surat Ukur / Mesin</label>
                                    <input type="text" name="no_reg_desa" id="edit_no_reg_desa" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No.Reg Camat / SKBN / Rangka</label>
                                    <input type="text" name="no_reg_camat" id="edit_no_reg_camat"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Kosongkan jika tidak diubah">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
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

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            $('.edit-btn').on('click', function() {
                const data = $(this).data();
                const form = $('#formEditAnggota');

                // Set action URL
                form.attr('action', `{{ url('admin/anggota/update') }}/${data.id}`);

                // Isi nilai field edit
                $('#edit_nama').val(data.nama);
                $('#edit_nik').val(data.nik);
                $('#edit_jenis_kelamin').val(data.jenis_kelamin);
                $('#edit_tempat_lahir').val(data.tempat_lahir);
                $('#edit_tanggal_lahir').val(data.tanggal_lahir);
                $('#edit_status').val(data.status);
                $('#edit_penjamin').val(data.penjamin);
                $('#edit_no_jaminan').val(data.no_jaminan);
                $('#edit_pekerjaan').val(data.pekerjaan);
                $('#edit_agama').val(data.agama);
                $('#edit_alamat').val(data.alamat);
                $('#edit_luas_plat_tahun').val(data.luas_plat_tahun);
                $('#edit_telepon').val(data.telepon);
                $('#edit_tanggal_registrasi').val(data.tanggal_registrasi);
                $('#edit_jaminan').val(data.jaminan);
                $('#edit_status_keanggotaan').val(data.status_keanggotaan);
                $('#edit_atas_nama').val(data.atas_nama);
                $('#edit_no_reg_desa').val(data.no_reg_desa);
                $('#edit_no_reg_camat').val(data.no_reg_camat);
            });
        });
    </script>
@endsection
