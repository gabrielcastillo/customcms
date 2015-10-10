<?php $this->load->view('admin/componets/header', TRUE); ?>
<?php $this->load->view('admin/componets/navbar'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <section>
          <h2>Page Name</h2>
        </section>
      </div>
      <div class="col-md-3">
        <section>
          <?php echo mailto('gabriel@stellervision.com', '<i class="glyphicon glyphicon-user"></i> gabriel@stellervision.com'); ?>
          <br />
          <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> Logout'); ?>
        </section>
      </div>
    </div>
  </div>
<?php $this->load->view('admin/componets/footer'); ?>