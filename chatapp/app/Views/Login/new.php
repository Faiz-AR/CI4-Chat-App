<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Login<?= $this->endSection() ?>

<?= $this->section("content") ?>

<?php if (session()->has('warning')): ?>

<div class="py-2">
  <div class="modal" id="warningModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger text-center">Error</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?= session('warning') ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
    
<?php endif ?>

<h1 class="text-center mb-3">Live Chat Application</h1>
<div class="container text-center mb-3">
  <a class="" href="<?= site_url('/')?>"><button type="button" class="btn btn-warning"><i class="bi bi-house-fill"></i>Home</button></a>
</div>

<?= form_open("/login/create", $attributes = ['class' => 'container w-50 p-2 rounded border border-dark', 'id' => 'loginform']) ?>

  <h5 class="text-center m-1">Login</h5>

  <div class="form-group mb-3">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" value="<?= old('username')?>">
  </div>

  <div class="form-group mb-3">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
  </div>

  <div class="form-row">
    <button type="submit" class="btn btn-primary">Login</button>
    <a class="m-3" href="<?= site_url('/register')?>">Don't have an account?</a>
  </div>
  
</form>

<script type="text/javascript">
    var myModal = new bootstrap.Modal(document.getElementById('warningModal'), {})
    myModal.toggle()
</script>

<?= $this->endSection() ?>
