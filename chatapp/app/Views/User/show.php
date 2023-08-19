<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Profile Info<?= $this->endSection() ?>

<?= $this->section("content") ?>

<?php if (session()->has('info')): ?>

<div class="py-2">
  <div class="modal" id="infoModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success text-center">Success</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?= session('info') ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
    
<?php endif ?>

<div class="container w-25 p-2 rounded border border-dark" id="loginform">
    <a href="<?= site_url('/chat')?>"><button type="button" class="btn btn-success"><i class="bi bi-arrow-left" style="font-size: 16px; margin-right:10px;"></i>Back to chatting</button></a>
    <h5 class="text-center m-3">User Profile Information</h5><hr/>

  <div class="row text-center">
    <div class="col-sm">
        <dt>Username</dt>
        <dd><?= esc($user->username) ?></dd>
    </div>
    <div class="col-sm">
        <dt>Email</dt>
        <dd><?= esc($user->email) ?></dd>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-sm">
        <dt>Date of Birth</dt>
        <dd><?= $user->date_of_birth ?></dd> 
    </div>
    <div class="col-sm">
        <dt>Gender</dt>
        <dd><?= ucwords($user->gender) ?></dd>
    </div>
  </div>

  <div class="row  text-center">
    <div class="col-sm">
        <dt>Country</dt>
        <dd><?= $user->country ?></dd> 
    </div>
    <div class="col-sm">
      <dt>Created at</dt>
      <dd><?= $user->updated_at ?></dd>
    </div>
  </div>

  <div class="container text-center mt-2 mb-2">
    <a href="<?= site_url('user/edit/' . $user->id)?>"><button type="button" class="btn btn-warning">Edit Profile<i class="bi bi-pencil-square"  style="font-size: 16px; margin-left:10px;"></i></button></a>
  </div>

</div>

<script type="text/javascript">
    var myModal = new bootstrap.Modal(document.getElementById('infoModal'), {})
    myModal.toggle()
</script>


<?= $this->endSection() ?>
