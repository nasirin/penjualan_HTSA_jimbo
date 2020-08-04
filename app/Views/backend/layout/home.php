<?= $this->include('backend/component/meta'); ?>
<div class="wrapper">
    <?= $this->include('backend/component/nav'); ?>

    <?= $this->include('backend/component/asside'); ?>

    <div class="content-wrapper">
        <?= $this->renderSection('content'); ?>
    </div>
</div>
<!-- ./wrapper -->

<?= $this->include('backend/component/script'); ?>