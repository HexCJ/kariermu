@if(session('success'))
<script>
Swal.fire({
title: "Berhasil!",
// icon: "success"
imageUrl: 'img/success.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
imageHeight: 250, // Lebar gambar dalam piksel
text: "Data berhasil ditambahkan.",
});
</script>
<div class="position-absolute notif">
  <div class="alert alert-success alert-dismissible" role="alert">
      <div><i class="fa-solid fa-check me-2"></i><strong>Berhasil </strong>{!! session('success') !!}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if(session('success-tolak'))
<script>
Swal.fire({
title: "Berhasil!",
// icon: "success"
imageUrl: '{{ asset('img/success.png') }}', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
imageHeight: 250, // Lebar gambar dalam piksel
text: "{!! session('success-tolak') !!}",
});
</script>
@endif

@if(session('success-acc'))
<script>
Swal.fire({
title: "Berhasil!",
// icon: "success"
imageUrl: '{{ asset('img/success.png') }}', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
imageHeight: 250, // Lebar gambar dalam piksel
text: "{!! session('success-acc') !!}",
});
</script>
@endif

@if(session('success-profile'))
  <script>
  Swal.fire({
  title: "Berhasil!",
  // icon: "success"
  imageUrl: 'img/success.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
  imageHeight: 250, // Lebar gambar dalam piksel
  text: "Berhasil, Anda Berhasil Ubah Foto Profile.",
  });
  </script>
@endif

@if(session('success_lapor'))
  <script>
  Swal.fire({
  title: "Berhasil!",
  // icon: "success"
  imageUrl: 'img/nilai_found.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
  imageHeight: 250, // Lebar gambar dalam piksel
  text: 'Laporan anda berhasil disimpan',
  });
  </script>
@endif

@if(session('no_lapor'))
  <script>
  Swal.fire({
  title: "Gagal!",
  // icon: "success"
  imageUrl: 'img/data_kosong.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
  imageHeight: 250, // Lebar gambar dalam piksel
  text: 'Anda Tidak Mengisi Data Laporan',
  });
  </script>
@endif

@if(session('fail-profile'))
  <script>
  Swal.fire({
  title: "Gagal!",
  // icon: "success"
  imageUrl: 'img/data_kosong.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
  imageHeight: 250, // Lebar gambar dalam piksel
  text: 'Anda Tidak Mengisi Biodata Secara Lengkap.',
  });
  </script>
@endif

@if(session('success-edit-profile'))
<script>
Swal.fire({
title: "Berhasil!",
// icon: "success"
imageUrl: 'img/nilai_found.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
imageHeight: 250, // Lebar gambar dalam piksel
text: "Berhasil, Anda Berhasil Mengisi Biodata.",
});
</script>
@endif

@if(session('success-update'))
<script>
Swal.fire({
title: "Berhasil!",
imageUrl: 'img/success.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
imageHeight: 250, // Lebar gambar dalam piksel
text: "Data berhasil diedit.",
// icon: "success"
});
</script>
<div class="position-absolute notif">
  <div class="alert alert-success alert-dismissible" role="alert">
      <div><i class="fa-solid fa-check me-2"></i><strong>Berhasil </strong>{!! session('success-update') !!}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if(session('success-delete'))
<script>
Swal.fire({
title: "Berhasil!",
imageUrl: 'img/success.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
imageHeight: 250, // Lebar gambar dalam piksel
text: "Data berhasil terhapus.",
});
</script>
<div class="position-absolute notif">
  <div class="alert alert-success alert-dismissible" role="alert">
      <div><i class="fa-solid fa-check me-2"></i><strong>Berhasil </strong>{!! session('success-delete') !!}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if(session('fail'))
    <div class="position-absolute notif">
      <div class="alert alert-danger alert-dismissible" role="alert">
          <div><i class="fa-solid fa-xmark me-2"></i><strong>Gagal </strong>{!! session('danger') !!}</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif