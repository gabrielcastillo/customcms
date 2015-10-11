<div class="modal-header">
  <h4 class="modal-title">Login</h4>
  <p>Please login with your credentials</p>
</div>
<div class="modal-body">
  <?php echo validation_errors(); ?>
   <?php echo form_open(); ?>
   <table class="table">
    <tr>
      <td>Email</td>
      <?php $args = array('id' => 'email', 'class' => 'form-control input-sm', 'type' => 'email', 'name' => 'email', 'value' => set_value('email'), 'autocomplete' => 'off', 'autofocus' => 'on'); ?>
      <td><?php echo form_input($args); ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <?php $args = array('id' => 'password', 'class' => 'form-control input-sm', 'type' => 'password', 'name' => 'password', 'value' => set_value('password')); ?>
      <td><?php echo form_password($args); ?></td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo form_submit('login', 'Login', 'class = btn btn-primary'); ?></td>
    </tr>
   </table>
   <?php echo form_close(); ?>
</div>