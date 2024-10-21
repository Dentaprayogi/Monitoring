@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Aktivitas</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="/" method="POST" enctype="multipart/form-data"
                                id="form-tambah">
                                @csrf
                                <div class="row">
                                    <div class="col-6">                        
                                    <a href="/create" class="btn btn-md btn-primary">Add new Aktifitas</a>
                                    </div>
                                     <table class="table table-striped">
                                      <thead>
                                      <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Title</th>
                                      <th scope="col">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @foreach ($posts as $post)
                                      <tr>
                                        <th scope="row">{{ $post->id }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                          <a href="show/{{ $post->id }}" class="btn btn-success">Show</a>
                                          <a href="edit/{{ $post->id }}" class="btn btn-info">Edit</a>
                                          <a href="delete/{{ $post->id }}" class="btn btn-danger">Delete</a>              
                                          </td>
                                          </tr>
                                            @endforeach
                                      </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#prodi').select2({
                    tags: true,
                    placeholder: "Pilih Prodi",
                    // selectionCssClass: "form-control"

                });
                $('#kategori').select2({
                    tags: true,
                    placeholder: "Pilih Kategori"
                });
                $('#button-tambah').on("click", function(e) {
                    e.preventDefault();
                    var form = $(this).parents('form');
                    Swal.fire({
                        icon: 'warning',
                        title: 'Apakah Anda Yakin ?',
                        showDenyButton: true,
                        confirmButtonText: 'Yakin',
                        denyButtonText: Tidak,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#form-tambah").submit();
                        } else if (result.isDenied) {
                            Swal.fire('Data Tidak Ditambahkan', '', 'success')
                        }
                    })
                })
            });
        </script>
    @endpush
@endsection