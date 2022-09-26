@extends('layout.v_template')
@section('title','Pelanggan | Lokasi Usaha')
@section('mnpelanggan','active')

@section('content')
<!-- Content Wrapper -->
        <div class="card">
            <div class="card-body">
                <a href="javascript.void(0)" class="btn btn-primary btn-sm" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data Pelanggan</a>
                <br><hr>
                @if(session()->has('pesan'))
                                <div class="alert alert-success">
                                  {{ session()->get('pesan')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                              @endif
                <div class="table-responsive">
                <h4>Data Pelanggan: </h4>
                <table class="table" id="dataTable">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th class="text-center">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggans as $pelanggan)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$pelanggan->nama_pelanggan}}</td>
                                            <td>{{$pelanggan->telepon}}</td>
                                            <td>{{$pelanggan->status}}</td>
                                            <td>{{$pelanggan->keterangan}}</td>
                                            <td class="text-center">
                                                <div>
                                                  <a href="#edit{{ $pelanggan->id_pelanggan }}" data-toggle="modal"><i class="fa fa-edit text-warning" title="Edit"></i></a>
                                                  <a href="#del{{ $pelanggan->id_pelanggan }}" data-toggle="modal"><i class="fa fa-trash text-danger" title="Edit"></i></a>
                                                  @include('admin.pelanggan.modal')
                                                </div>
                                            </td>
                                        </tr>
                                       @empty
                                        <td colspan="8" class="text-center">Tidak ada data...</td>
                                       @endforelse
                    </tbody>
                </table>
                </div>
            </div>
        </div>

<!-- Modal Popup untuk Add-->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Pelanggan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
                <div class="modal-body text-dark">
                    <form action="{{ route('pelanggans.store') }}" method="POST">
                          @csrf
    
                         <div class="card shadow mb-4">
                            <div class="card-body text-dark">
                                <div class="form-group col-md-12">
                                    <label>Nama :</label>
                                    <input type="text" class="form-control" placeholder="" name="nama_pelanggan" value="" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Telepon :</label>
                                    <input type="number" class="form-control" placeholder="" name="telepon" value="" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Email :</label>
                                    <input type="email" class="form-control" placeholder="" name="email" value="" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Username :</label>
                                    <input type="text" class="form-control" id="username" placeholder="" name="username" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="pwd">Password :</label>
                                    <input type="password" class="form-control" id="password" placeholder="" name="password" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Status :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" checked name="status" id="status" value="Aktif">
                                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Aktif">
                                        <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Keterangan :</label>
                                    <input type="text" class="form-control" id="keterangan" placeholder="" name="keterangan" >
                                </div>
                            </div>
                        </div>
    
                      <div class="modal-footer">
                          <button class="btn btn-success " type="submit">
                              Simpan
                          </button>
                          <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                              Batal
                          </button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->

<!-- End of Content Wrapper -->
@endsection