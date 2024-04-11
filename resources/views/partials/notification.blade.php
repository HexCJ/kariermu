@if(session('success'))
<div class="position-absolute notif">
  <div class="alert alert-success alert-dismissible" role="alert">
      <div><i class="fa-solid fa-check me-2"></i>{!! session('success') !!}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
@if(session('danger'))
    <div class="position-absolute notif">
      <div class="alert alert-danger alert-dismissible" role="alert">
          <div><i class="fa-solid fa-xmark me-2"></i>{!! session('danger') !!}</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif