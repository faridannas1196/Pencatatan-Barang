<x-layout title="Data Barang">
<div id="brg">
    <h3 class="display-4 size-5">Data Barang</h3>
    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addItemModal"data-toggle="tooltip" data-placement="top" title="Tambah Barang"><i class="bi bi-plus-lg"></i></button>
            </div>
            <div class="d-flex">
                <select id="klasifikasiDropdown" class="form-select selectpicker w-100">
                    <option selected value="">Pilih Klasifikasi</option>
                    @foreach($klasifikasi as $klas)
                        <option value="{{ $klas->nama_klasifikasi }}">{{ $klas->nama_klasifikasi }}</option>
                    @endforeach
                </select>
                <a class="btn text-dark" href="/databarang" role="button" style="background-color: rgb(221, 221, 221); margin-left: 15px">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </div>
    </div>
  
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col" style="background-color: darkblue;" class="text-white">NO</th>
                <th scope="col" style="background-color: darkblue;" class="text-white">Nama Barang</th>
                <th scope="col" style="background-color: darkblue;" class="text-white">Klasifikasi</th>
                <th scope="col" style="background-color: darkblue;" class="text-white">Stok Barang</th>
                <th scope="col" style="background-color: darkblue;" class="text-white">Harga</th>
                <th scope="col" style="background-color: darkblue;" class="text-white">Aksi</th>
            </tr>
        </thead>
        <tbody id="barangTableBody">
            @foreach($barang as $bar)
                <tr class="barang-row" data-klasifikasi="{{ $bar->klasifikasi->nama_klasifikasi }}">
                    <th scope="row">{{ $bar->id_barang }}</th>
                    <td>{{ $bar->nama_barang }}</td>
                    <td>{{ $bar->klasifikasi->nama_klasifikasi }}</td>
                    <td>{{ $bar->stok }}</td>
                    <td>Rp.{{ $bar->harga }}.000</td>
                    <td>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="/storage/{{ $bar->foto_barang }}" data-toggle="tooltip" data-placement="top" title="Foto Barang">
                            <span class="bi-image"></span>
                        </a>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editItemModal" data-barang="{{ json_encode($bar) }}" data-toggle="tooltip" data-placement="top" title="Edit Barang">
                            <span class="bi bi-pencil"></span>
                        </button>
                        <form action="{{ route('hapusBarang', $bar->id_barang) }}" method="POST" style="display:inline;" data-toggle="tooltip" data-placement="top" title="Hapus Barang">
                            @csrf
                            <button type="submit" class="btn btn-danger"><span class="bi-trash"></span></button>
                        </form>
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <!-- Add Data Barang -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="namaBarang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarang" name="nama_barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="klasifikasiBarang" class="form-label">Klasifikasi</label>
                            <select id="id_klasifikasi" name="id_klasifikasi" class="form-select selectpicker" required>
                                <option selected value="">Pilih Klasifikasi</option>
                                @foreach($klasifikasi as $klas)
                                    <option value="{{ $klas->id_klasifikasi }}">{{ $klas->nama_klasifikasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="stokBarang" class="form-label">Stok Barang</label>
                            <input type="number" class="form-control" id="stokBarang" name="stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="hargaBarang" class="form-label">Harga</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" class="form-control" id="hargaBarang" name="harga" required>
                                <span class="input-group-text">.000</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fotoBarang" class="form-label">Foto Barang</label>
                            <input type="file" class="form-control" id="fotoBarang" name="foto_barang">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success text-white text-outline-dark"><i class="bi bi-plus-circle"></i> Tambah Barang</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

 
    <!-- Edit Data Barang -->
<div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editItemModalLabel">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editBarangForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editIdBarang" name="id_barang">
                    <div class="mb-3">
                        <label for="editNamaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="editNamaBarang" name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="editKlasifikasiBarang" class="form-label">Klasifikasi</label>
                        <select id="editIdKlasifikasi" name="id_klasifikasi" class="form-select selectpicker" required>
                            <option selected value="">Pilih Klasifikasi</option>
                            @foreach($klasifikasi as $klas)
                                <option value="{{ $klas->id_klasifikasi }}">{{ $klas->nama_klasifikasi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editStokBarang" class="form-label">Stok Barang</label>
                        <input type="number" class="form-control" id="editStokBarang" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHargaBarang" class="form-label">Harga</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" id="editHargaBarang" name="harga" required>
                        <span class="input-group-text" id="editHargaBarang" name="harga">.000</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editFotoBarang" class="form-label">Foto Barang</label>
                        <input type="file" class="form-control" id="editFotoBarang" name="foto_barang">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success text-white text-outline-dark"><i class="bi bi-pencil"></i> Edit Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Foto Barang Modal --}}
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="modalImage" class="img-fluid">
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#klasifikasiDropdown').on('change', function() {
                var selectedKlasifikasi = $(this).val().toLowerCase();
                $('#barangTableBody .barang-row').each(function() {
                    var rowKlasifikasi = $(this).data('klasifikasi').toLowerCase();
                    if (selectedKlasifikasi === "" || rowKlasifikasi === selectedKlasifikasi) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

        $(document).ready(function() {
        $('#editItemModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var barang = button.data('barang');
            
            $('#editIdBarang').val(barang.id_barang);
            $('#editNamaBarang').val(barang.nama_barang);
            $('#editIdKlasifikasi').val(barang.id_klasifikasi);
            $('#editStokBarang').val(barang.stok);
            $('#editHargaBarang').val(barang.harga);
            $('#editBarangForm').attr('action', '/barang/' + barang.id_barang);
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var imgSrc = button.getAttribute('data-img-src');
            var modalImage = document.getElementById('modalImage');
            modalImage.src = imgSrc;
        });
    });
    </script>
</x-layout>
