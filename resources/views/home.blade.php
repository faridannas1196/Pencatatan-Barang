<x-layout title="home">
  <div class="container d-flex justify-content-center text-center" style="height: 10vh;">
    <div class="" style="margin-top: 150px">
      <h1 class="display-1 size-5">Selamat Datang {{Auth::user()->nama_panggilan}}</h1>
      <h3 class="size-2 display-5">Di Aplikasi Pencatatan Barang</h3>
    </div>
  </div>
</x-layout>
