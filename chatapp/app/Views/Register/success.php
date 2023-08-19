<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Regsiter successful<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <h1 class="text-success">Register successful</h1>
    <p>Click the button below to redirect to the login page</p>
    <a class="m-3" href="<?= site_url('login/new')?>"><button class="btn btn-primary">Login</button></a>
</div>

<?= $this->endSection() ?>
