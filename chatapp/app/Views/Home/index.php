<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Home<?= $this->endSection() ?>

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

<h1 class="text-center p-3">Live Chat Application</h1>

<div class="container">
  
  <?php if(session()->has('user_id')): ?>
    <div class="text-center">
      <p class="text-center">Welcome Back! <?php echo "<b>" . esc(current_user()->username) . "</b>"?></p>
      <a href="<?= site_url('/chat')?>"><button type="button" class="btn btn-success">Start Chatting<i class="bi bi-chat-fill" style="font-size: 16px; margin-left:10px;"></i></button></a>
      <a href="<?= site_url('user/show/' . $_SESSION['user_id']) ?>"><button type="button" class="btn btn-info text-light"><i class="bi bi-person-fill" style="font-size: 16px; margin-right:10px;"></i>User Profile</button></a>
      <a href="<?= site_url('/logout')?>"><button type="button" class="btn btn-danger">Logout<i class="bi bi-box-arrow-left" style="font-size: 16px; margin-left:10px;"></i></button></a>
    </div>
  <?php else: ?>
    <p class="text-center">You are not logged in</p>
    <div class="text-center">
      <a href="<?= site_url('/login')?>"><button type="button" class="btn btn-primary">Login</button></a>
      <a href="<?= site_url('/register')?>"><button type="button" class="btn btn-success">Register</button></a>
  </div>
  <?php endif ?>
  
</div>

<script type="text/javascript">
    var myModal = new bootstrap.Modal(document.getElementById('infoModal'), {})
    myModal.toggle()
</script>



<?= $this->endSection() ?>
