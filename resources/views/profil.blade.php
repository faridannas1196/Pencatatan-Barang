<x-layout>
  <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class=" p-3 py-4 mt-2">
              <div class="text-center">
                <img src="{{ Auth::user()->Foto }}" width="100" class="rounded-circle" data-bs-toggle="modal" data-bs-target="#imageModal">
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ Auth::user()->Foto }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
                
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0"><b>{{Auth::user()->nama}}</b></h5>
                    <span>{{Auth::user()->job}} / {{Auth::user()->NIP}}</span><br>
                    
                    <div class="px-4 mt-1">
                    <ul class="list-group">
                      <li class="list-group-item">Jenis Kelamin : {{Auth::user()->jenis_kelamin}}</li>
                      <li class="list-group-item">Tempat/Tanngal Lahir : {{Auth::user()->ttl}}</li>
                      <li class="list-group-item">Alamat : {{Auth::user()->alamat}}</li>
                      <li class="list-group-item">Nomor Telepon : {{Auth::user()->no_telepon}}</li>
                      <li class="list-group-item">Email : {{Auth::user()->email}}</li>
                    </ul>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
</x-layout>