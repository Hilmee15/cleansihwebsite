@extends('layout.main')

@section('judul')
    Transaksi
@endsection

@section('isi')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#transaksi">Tambah Transaksi</a>
    <div class="modal fade" id="transaksi" tabindex="-1" aria-labelledby="paketLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card card-primary card-outline my-2">
                        <div class="card-body">

                            <form action="{{ route('add.transaksi') }}" method="post" id="myForm">
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
                                    <label class="form-label">Customer</label>
                                    <select name="nama_paket" class="form-control">
                                        @foreach ($paket as $item)
                                            <option value="{{ $item->nama_paket }}">{{ $item->nama_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Kode Invoice</label>
                                    <input type="text" name="kode_invoice" class="form-control">
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control">
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Batas Waktu</label>
                                    <input type="date" name="batas_waktu" class="form-control">
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Tanggal Bayar</label>
                                    <input type="date" name="tanggal_bayar" class="form-control">
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Biaya Tambahan</label>
                                    <input type="text" name="biaya_tambahan" class="form-control">
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="baru">Baru</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                        <option value="diambil">Diambil</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label">Dibayar</label>
                                    <select name="dibayar" class="form-control" id="dibayar">
                                        <option value="belum_dibayar">Belum Dibayar</option>
                                        <option value="dibayar">Dibayar</option>
                                    </select>
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
                    <th>Customer</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Batas Waktu</th>
                    <th>Tanggal Bayar</th>
                    <th>Biaya Tambahan</th>
                    <th>Status</th>
                    <th>Dibayar</th>
                    <th>Action</th>
                </thead>
                @foreach ($data as $item)
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->paket->nama_paket ?? 'No Customer' }}</td>
                    <td>{{ $item->kode_invoice }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->batas_waktu }}</td>
                    <td>{{ $item->tanggal_bayar }}</td>
                    <td>{{ $item->biaya_tambahan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->dibayar }}</td>
                    <td>
                        <a href="" class="text-white btn bg-warning btn-hover-effect" data-toggle="modal"
                            data-target="#transaksi{{ $item->id }}"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('destroy.transaksi', ['id' => $item->id]) }}" class="btn btn-danger"><i
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
                                                            <option value="{{ $outletItem->id }}"
                                                                {{ $outletItem->id === $item->outlet_id ? 'selected' : '' }}>
                                                                {{ $outletItem->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <label class="form-label">Customer</label>
                                                    <select name="nama_paket" class="form-control">
                                                        @foreach ($paket as $item)
                                                            <option value="{{ $item->nama_paket }}"
                                                                {{ $item->nama_paket === $item->nama_paket ? 'selected' : '' }}>
                                                                {{ $item->nama_paket }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>                                                
                                                <div class="mb-3 form-group">
                                                    <label class="form-label">Kode Invoice</label>
                                                    <input type="text" value="{{ $item->kode_invoice }}"
                                                        name="kode_invoice" class="form-control">
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <label class="form-label">Tanggal</label>
                                                    <input type="date" value="{{ $item->tanggal }}" name="tanggal"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <label class="form-label">Batas Waktu</label>
                                                    <input type="date" value="{{ $item->batas_waktu }}"
                                                        name="batas_waktu" class="form-control">
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <label class="form-label">Tanggal Bayar</label>
                                                    <input type="date" value="{{ $item->tanggal_bayar }}"
                                                        name="tanggal_bayar" class="form-control">
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <label class="form-label">Biaya Tambahan</label>
                                                    <input type="text" value="{{ $item->biaya_tambahan }}"
                                                        name="biaya_tambahan" class="form-control">
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-control" id="status">
                                                        <option value="baru"
                                                            {{ old('status', $item->status) === 'baru' ? 'selected' : '' }}>
                                                            Baru</option>
                                                        <option value="proses"
                                                            {{ old('status', $item->status) === 'proses' ? 'selected' : '' }}>
                                                            Proses</option>
                                                        <option value="selesai"
                                                            {{ old('status', $item->status) === 'selesai' ? 'selected' : '' }}>
                                                            Selesai</option>
                                                        <option value="diambil"
                                                            {{ old('status', $item->status) === 'diambil' ? 'selected' : '' }}>
                                                            Diambil</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <label class="form-label">Dibayar</label>
                                                    <select name="dibayar" class="form-control" id="dibayar">
                                                        <option value="belum_dibayar"
                                                            {{ old('dibayar', $item->dibayar) === 'belum_dibayar' ? 'selected' : '' }}>
                                                            Belum Dibayar</option>
                                                        <option value="dibayar"
                                                            {{ old('dibayar', $item->dibayar) === 'dibayar' ? 'selected' : '' }}>
                                                            Dibayar</option>
                                                    </select>
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
                @endforeach
            </table>
        </div>
    </div>
@endsection
