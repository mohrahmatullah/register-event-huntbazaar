@extends('admin.includes.default')
@section('title', 'List undangan')
@section('content')
@include('pages_message.notify-msg-success')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Undangan</h3>
    <div class="row">
      <div class="col-6 text-right">
        <div class="card-tools">  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-whatever="@getbootstrap">Update Date Expired</button>
        </div>
      </div>
      <div class="col-6">
        <div class="card-tools">  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Kirim Undangan</button>
        </div>
      </div>
    </div>  
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Email</th>
        <th>Kode Registrasi</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Design Favorite</th> 
        <th>Status</th> 
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach($products as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->email }}</td>
          <td>{{ $p->kode_registrasi }}</td>
          <td>
            {{ $p->nama }}
          </td>
          <td>{{ $p->tgl_lahir }}</td>
          <td>{{ $p->jenkel }}</td>
          <td>{{ $p->design_favorite }}</td>
          <td>@if($p->status == 1) <span class="badge badge-info right">Sudah daftar</span> @else <span class="right badge badge-danger">Belum daftar</span> @endif</td>
          <td>
            <a href="#" onclick="deleted_item( <?= $p->id ?> ,'undangan_list');">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
              </svg>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('save-undangan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Kirim generate link untuk Register Event Huntbazaar</label>
              <input type="email" class="form-control" name="email" placeholder="Masukan email">
              @if(!empty($errors->first('product_nama')))
              <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('email') }}</p>
              @endif
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Date Expired</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('save-update-expired') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Date Expired</label>
              <input type="text" class="form-control" name="date_expired" placeholder="Masukan date expired" id='datetimepicker2' value="{{ $date_expired->param_value }}">
              @if(!empty($errors->first('date_expired')))
              <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('date_expired') }}</p>
              @endif
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection