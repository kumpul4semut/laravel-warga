@extends('master')

@section('konten')
    <div class="row my-3">
        <div class="col">
            <div class="d-flex float-right justify-content-around">
                <a href="warga/export_excel" class="btn btn-success btn-md mr-3" target="_blank"><i
                        class="fa-solid fa-file-excel"></i> Export</a>
                <button type="button" class="btn btn-secondary btn-md mr-3" data-toggle="modal" data-target="#import"><i
                        class="fa-solid fa-file-excel"></i> Import</button>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah"><i
                        class="fa-solid fa-plus"></i> Tambah</button>
            </div>
        </div>
    </div>

    {{-- menampilkan message --}}
    @if (session()->has('message'))
        {!! session('message') !!}
    @endif

    {{-- menampilkan error validasi --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-hover" id="datatable">
        <thead>
            <tr>
                <th scope="col">No KTP</th>
                <th scope="col">Nama</th>
                <th scope="col">Agama</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Gol Darah</th>
                <th scope="col">Warga Negara</th>
                <th scope="col">Pendidikan</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Status Nikah</th>
                <th scope="col" style="width:200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warga as $data)
                <tr>
                    <td>{{ $data->no_ktp }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->agama }}</td>
                    <td>{{ $data->t_lahir }}</td>
                    <td>{{ $data->tgl_lahir }}</td>
                    <td>{{ $data->j_kel }}</td>
                    <td>{{ $data->gol_darah }}</td>
                    <td>{{ $data->w_negara }}</td>
                    <td>{{ $data->pendidikan }}</td>
                    <td>{{ $data->pekerjaan }}</td>
                    <td>{{ $data->s_nikah }}</td>
                    <td class="d-flex">
                        <a href="#" class="mr-3 text-primary" data-toggle="modal"
                            data-target="#edit{{ $data->id }}"><i class="fa-solid fa-pencil"></i></a>
                        <a href="#" class="text-danger" data-toggle="modal"
                            data-target="#hapus{{ $data->id }}"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>

                <!-- Modal Edit-->
                <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="tambahLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahLabel">Edit Warga</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('warga') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="no_ktp">No KTP</label>
                                        <input type="text" class="form-control" name="no_ktp"
                                            value="{{ $data->no_ktp }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $data->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" class="form-control" name="agama"
                                            value="{{ $data->agama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="t_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="t_lahir"
                                            value="{{ $data->t_lahir }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir"
                                            value="{{ $data->tgl_lahir }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="j_kel">Jenis Kelamin</label>
                                        <select name="j_kel" id="j_kel" class="form-control">
                                            <option value="L" {{ $data->j_kel === 'L' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="W" {{ $data->j_kel === 'W' ? 'selected' : '' }}>Wanita
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gol_darah">Golongan Darah</label>
                                        <input type="text" class="form-control" name="gol_darah"
                                            value="{{ $data->gol_darah }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="w_negara">Warga Negara</label>
                                        <input type="text" class="form-control" name="w_negara"
                                            value="{{ $data->w_negara }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan</label>
                                        <input type="text" class="form-control" name="pendidikan"
                                            value="{{ $data->pendidikan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" name="pekerjaan"
                                            value="{{ $data->pekerjaan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="s_nikah">Status Nikah</label>
                                        <input type="text" class="form-control" name="s_nikah"
                                            value="{{ $data->s_nikah }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Delte-->
                <div class="modal fade" id="hapus{{ $data->id }}" tabindex="-1" aria-labelledby="tambahLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahLabel">Hapus Warga</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('warga') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <strong class="text-center">Hapus data {{ $data->nama }} ?</strong>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah-->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Warga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('warga') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input type="text" class="form-control" name="no_ktp">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" name="agama">
                        </div>
                        <div class="form-group">
                            <label for="t_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="t_lahir">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir">
                        </div>
                        <div class="form-group">
                            <label for="j_kel">Jenis Kelamin</label>
                            <select name="j_kel" id="j_kel" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="W">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gol_darah">Golongan Darah</label>
                            <input type="text" class="form-control" name="gol_darah">
                        </div>
                        <div class="form-group">
                            <label for="w_negara">Warga Negara</label>
                            <input type="text" class="form-control" name="w_negara">
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="s_nikah">Status Nikah</label>
                            <input type="text" class="form-control" name="s_nikah">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Import-->
    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="importLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="import">Import Warga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('wargaImportExcel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Pilih File Excel</label>
                            <input type="file" name="file" id="file" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'print'
                ]
            });
        });
    </script>
@endsection
