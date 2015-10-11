<?php $this->load->view('admin/componets/header', TRUE); ?>
<?php $this->load->view('admin/componets/navbar'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <?php $this->load->view($subview); ?>
      </div>
      <div class="col-md-3">
        <section>
          <?php echo mailto($this->session->userdata('email'), '<i class="glyphicon glyphicon-user"></i> '. $this->session->userdata('email')); ?>
          <br />
          <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> Logout'); ?>
        </section>
      </div>
    </div>
  </div>
<?php $this->load->view('admin/componets/footer'); ?>