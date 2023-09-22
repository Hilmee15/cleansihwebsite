@extends('layout.main')

@section('judul')
    Outlet
@endsection

@section('isi')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#Outlet">Tambah Outlet</a>
    <div class="modal fade" id="Outlet" tabindex="-1" aria-labelledby="OutletLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card card-primary card-outline my-2">
                        <div class="card-body">

                            <form action="{{ route('add.outlet') }}" method="post" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label class="form-label">Nama Outlet</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">No Telepon</label>
                                    <input type="text" name="no_telp" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="myForm">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline my-2">
        <div class="card-header py-2">

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="">
                    <th>#</th>
                    <th>Nama Outlet</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </thead>
                @foreach ($data as $number => $item)
                    <tbody class="">

                        <td>{{ $number + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>
                            <a href="" class="text-white btn bg-warning btn-hover-effect" data-toggle="modal"
                                data-target="#Outlet{{ $item->id }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('destroy.outlet', ['id' => $item->id]) }}" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        </td>

                        {{-- modal edit --}}
                        <div class="modal fade" id="Outlet{{ $item->id }}" tabindex="-1" aria-labelledby="OutletLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" style="max-width: 50%;">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="card card-primary card-outline my-2">
                                            <div class="card-body">

                                                <form action="/update-outlet/{{ $item->id }}" method="post"
                                                    id="updateForm{{ $item->id }}">
                                                    @csrf
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Nama Outlet</label>
                                                        <input type="text" name="nama" value="{{ $item->nama }}"
                                                            class="form-control">
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Alamat</label>
                                                        <input type="text" name="alamat" value="{{ $item->alamat }}"
                                                            class="form-control">
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">No Telepon</label>
                                                        <input type="text" name="no_telp" value="{{ $item->no_telp }}"
                                                            class="form-control">
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            form="updateForm{{ $item->id }}">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
