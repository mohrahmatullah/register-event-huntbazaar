@extends('admin.includes.default')
@section('title', 'List undangan')
@section('content')
@include('pages_message.notify-msg-success')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Undangan</h3>
    <div class="card-tools">  
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Input Undangan</button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Email</th>
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
              <label for="recipient-name" class="col-form-label">Input Email</label>
              <input type="email" class="form-control" name="email">
              @if(!empty($errors->first('product_nama')))
              <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('email') }}</p>
              @endif
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Generate Link</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection