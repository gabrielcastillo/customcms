<?php $this->load->view('admin/componets/header'); ?>
<div class="modal show" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php $this->load->view($subview); ?>
      <div class="modal-footer">
        <p>&copy; Copyright <?php echo date('Y'); ?></p>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/componets/footer'); ?>