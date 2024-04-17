@if(session('success'))
<script>
Swal.fire({
title: "Berhasil!",
text: "Data berhasil ditambahkan.",
icon: "success"
});
</script>
<div class="position-absolute notif">
  <div class="alert alert-success alert-dismissible" role="alert">
      <div><i class="fa-solid fa-check me-2"></i><strong>Berhasil </strong>{!! session('success') !!}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if(session('success-update'))
<script>
Swal.fire({
title: "Berhasil!",
text: "Data berhasil diedit.",
icon: "success"
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
text: "Data berhasil terhapus.",
icon: "success"
});
</script>
<div class="position-absolute notif">
  <div class="alert alert-success alert-dismissible" role="alert">
      <div><i class="fa-solid fa-check me-2"></i><strong>Berhasil </strong>{!! session('success-delete') !!}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if(session('danger'))
    <div class="position-absolute notif">
      <div class="alert alert-danger alert-dismissible" role="alert">
          <div><i class="fa-solid fa-xmark me-2"></i><strong>Gagal </strong>{!! session('danger') !!}</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif