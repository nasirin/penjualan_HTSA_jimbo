<?= $this->include('frontend/component/meta'); ?>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<div class="humberger__menu__overlay"></div>
<?= $this->include('frontend/component/topinfomin'); ?>

<?= $this->renderSection('content'); ?>


<?= $this->include('frontend/component/footer'); ?>
<?= $this->include('frontend/component/js'); ?>