@extends('layout.main')

@section('judul')
    Paket
@endsection

@section('isi')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#paket">Tambah paket</a>
    <div class="modal fade" id="paket" tabindex="-1" aria-labelledby="paketLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card card-primary card-outline my-2">
                        <div class="card-body">

                            <form action="{{ route('add.paket') }}" method="post" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label class="form-label">Outlet</label>
                                    <select name="outlet_id" class="form-control">
                                        @foreach ($outlet as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Nama Paket</label>
                                    <input type="text" name="nama_paket" class="form-control">
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Jenis</label>
                                    <select name="jenis" class="form-control" id="jenis">
                                        <option value="kiloan">Kiloan</option>
                                        <option value="selimut">Selimut</option>
                                        <option value="setrika">Setrika</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control">
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
                    <th>Jenis</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Action</th>
                </thead>
                @foreach ($data as $number => $item)
                    <tbody class="">

                        <td>{{ $number + 1 }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->nama_paket }}</td>
                        <td>Rp. {{ number_format($item->harga) }}</td>
                        <td>
                            <a href="" class="text-white btn bg-warning btn-hover-effect" data-toggle="modal"
                                data-target="#paket{{ $item->id }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('destroy.paket', ['id' => $item->id]) }}" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        </td>

                        {{-- modal edit --}}
                        <div class="modal fade" id="paket{{ $item->id }}" tabindex="-1" aria-labelledby="paketLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" style="max-width: 50%;">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="card card-primary card-outline my-2">
                                            <div class="card-body">

                                                <form action="/update-paket/{{ $item->id }}" method="post"
                                                    id="updateForm{{ $item->id }}">
                                                    @csrf
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Outlet</label>
                                                        <select name="outlet_id" class="form-control">
                                                            @foreach ($outlet as $outletItem)
                                                                <!-- Ubah nama variabel dari $outletItem menjadi $outletItem -->
                                                                <option value="{{ $outletItem->id }}"
                                                                    {{ $outletItem->id === $item->outlet_id ? 'selected' : '' }}>
                                                                    {{ $outletItem->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Nama Paket</label>
                                                        <input type="text" value="{{ $item->nama_paket }}"
                                                            name="nama_paket" class="form-control">
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Jenis</label>
                                                        <select name="jenis" class="form-control" id="jenis">
                                                            <option value="kiloan"
                                                                {{ old('jenis', $item->jenis) === 'kiloan' ? 'selected' : '' }}>
                                                                Kiloan</option>
                                                            <option value="selimut"
                                                                {{ old('jenis', $item->jenis) === 'selimut' ? 'selected' : '' }}>
                                                                Selimut</option>
                                                            <option value="setrika"
                                                                {{ old('jenis', $item->jenis) === 'setrika' ? 'selected' : '' }}>
                                                                Setrika</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Harga</label>
                                                        <input type="number" value="{{ $item->harga }}" name="harga"
                                                            class="form-control">
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
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
