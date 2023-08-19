<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Chat<?= $this->endSection() ?>

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

<div id="wrapper">

	<div id="menu">

    <h1>Live Chat Application</h1>
    <a class="" href="<?= site_url('/')?>"><button type="button" class="btn btn-warning"><i class="bi bi-house-fill" style="font-size: 16px; margin-right:10px;"></i>Home</button></a>
    <a href="<?= site_url('user/show/' . $_SESSION['user_id']) ?>"><button type="button" class="btn btn-info"><i class="bi bi-person-fill" style="font-size: 16px; margin-right:10px;"></i>User Profile</button></a>
    <hr/>

    <p class="welcome"><b>Hello <?= esc(current_user()->username) ?></b></p>

    <?= form_open("/chat/logout") ?>
      <a href="<?= site_url('/logout')?>"><button type="submit" class="btn btn-danger logout">Logout<i class="bi bi-box-arrow-left" style="font-size: 16px; margin-left:10px;"></i></button></a>
    </form>
    
    <div style="clear: both"></div>

	</div>

	<div id="chatbox">

	  <?= $chat_history ?>

	</div>

  <?= form_open("/chat/post", $attributes = ['class' => 'd-flex justify-content-between']) ?>
  <!-- <form class="d-flex justify-content-between" name="message" action=""> -->
    <input name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Send a message" />
    <button name="submitmsg" class="btn btn-success" type="submit" id="submitmsg">Send<i class="bi bi-send-fill" style="font-size: 12px; margin-left:5px;"></i></button>

  </form>

</div>

<script type="text/javascript">

var firstTimeScroll = 0;

$("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("<?= site_url('chat/post') ?>", {text: clientmsg});             
        $("#usermsg").attr("value", "");
        loadLog;
    return false;
});

function loadLog(){
    if (firstTimeScroll === 0) {
      var log = $('#chatbox');
      log.animate({ scrollTop: log.prop('scrollHeight')}, 1000);
      firstTimeScroll+=1;
    }    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    
    $.ajax({
        url: "<?= site_url('chat_log.html') ?>",
        cache: false,
        success: function(html){       
            $("#chatbox").html(html);       
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }              
        },
    });
}

const btn = document.getElementById('submitmsg');

btn.addEventListener('click', function handleClick(event) {
  // 👇️ if you are submitting a form (prevents page reload)
  event.preventDefault();

  const msgInput = document.getElementById('usermsg');

  // Send value to server
  console.log(msgInput.value);

  // 👇️ clear input field
  msgInput.value = '';
  var log = $('#chatbox');
  log.animate({ scrollTop: log.prop('scrollHeight')}, 1000);
});

setInterval (loadLog, 1000);

var myModal = new bootstrap.Modal(document.getElementById('warningModal'), {})
myModal.toggle()

</script>

<?= $this->endSection() ?>
