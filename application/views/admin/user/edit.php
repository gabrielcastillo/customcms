<div class="modal-header">
  <h4 class="modal-title">Add User</h4>
</div>
<div class="modal-body">
  <?php echo validation_errors(); ?>
   <?php echo form_open(); ?>
   <table class="table">
    <tr>
      <td>Name</td>
      <td><?php echo form_input('name', set_value('name')); ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo form_input('email', set_value('email')); ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo form_password('password'); ?></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><?php echo form_password('confirm'); ?></td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo form_submit('login', 'Login', 'class = btn btn-primary'); ?></td>
    </tr>
   </table>
   <?php echo form_close(); ?>
</div>