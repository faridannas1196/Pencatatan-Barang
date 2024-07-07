<x-layout title="Data Barang">
  <h3 class="display-4 size-5">Klasifikasi</h3>
  <div class="container mt-5">
    @if(session('message'))
    <div class="alert alert-success w-50">
       {{ session('message') }}
    </div>
    @endif
    
    <div class="d-flex justify-content-between align-items-center">
      <form action="{{ route('klasifikasi.tambah') }}" method="POST" class="input-group mb-3 w-25">
        @csrf
        <input type="text" name="nama_klasifikasi" class="form-control" placeholder="Masukkan Klasifikasi" aria-label="Masukkan Klasifikasi" aria-describedby="basic-addon2" required>
        <div class="input-group-append">
          <button class="btn btn-success text-white text-outline-dark" type="submit" data-toggle="tooltip" data-placement="top" title="Tambah Klasifiasi"><i class="bi bi-plus-lg"></i></button>
        </div>
      </form>
    </div>
  </div>
  <table class="table table-striped mt-3 w-50" style="margin-left: 15px">
    <thead>
      <tr>
        <th scope="col" style="background-color: darkblue;" class="text-white">NO</th>
        <th scope="col" style="background-color: darkblue;" class="text-white">Klasifikasi</th>
        <th scope="col" style="background-color: darkblue;" class="text-white">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($klasifikasi as $klas)
      <tr>
          <td>{{ $klas->id_klasifikasi }}</td>
          <td>{{ $klas->nama_klasifikasi }}</td>
          <td>
              <button type="button" class="btn btn-warning edit-klasifikasi-btn" data-id="{{ $klas->id_klasifikasi }}" data-name="{{ $klas->nama_klasifikasi }}" data-toggle="tooltip" data-placement="top" title="Edit Klasifikasi">
                  <i class="bi bi-pencil"></i>
              </button>
              <form action="{{ route('hapusKlasifikasi', $klas->id_klasifikasi) }}" method="POST" style="display:inline;" data-toggle="tooltip" data-placement="top" title="Hapus Klasifiasi">
                  @csrf
                  <button type="submit" class="btn btn-danger"><span class="bi-trash"></span> </button>
              </form>
          </td>
      </tr>
  @endforeach  
  </tbody>
  </table>

  {{-- Edit Klasifikasi --}}
  <div class="modal fade" id="editKlasifikasiModal" tabindex="-1" aria-labelledby="editKlasifikasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKlasifikasiModalLabel">Edit Klasifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editKlasifikasiForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3 w-25 mt-2">
                            <span class="input-group-text text-white" style="background-color: darkblue" id="klasifikasiId"></span>
                            <input type="text" id="edit_nama_klasifikasi" name="nama_klasifikasi" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Perbarui</button>
                    <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>   
        $(document).ready(function() {
        $('.edit-klasifikasi-btn').on('click', function() {
            var klasifikasiId = $(this).data('id');
            var klasifikasiName = $(this).data('name');
            $('#klasifikasiId').text(klasifikasiId);
            $('#edit_nama_klasifikasi').val(klasifikasiName);
            $('#editKlasifikasiForm').attr('action', '/update-klasifikasi/' + klasifikasiId);
            $('#editKlasifikasiModal').modal('show');
              });
          });
    </script>
</x-layout>
