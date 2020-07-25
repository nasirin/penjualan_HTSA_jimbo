<?= $this->include('backend/component/meta'); ?>
<div class="wrapper">
    <?= $this->include('backend/component/nav'); ?>

    <?= $this->include('backend/component/asside'); ?>

    <div class="content-wrapper">
        <?= $this->renderSection('content'); ?>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
<!-- ./wrapper -->

<?= $this->include('backend/component/script'); ?>