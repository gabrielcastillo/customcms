<div class="modal-header">
  <h4 class="modal-title">Add User</h4>
</div>
<div class="modal-body">
  <?php echo validation_errors(); ?>
   <?php echo form_open('admin/user/edit/' . $user->id, array('id' => 'edit_form', 'class' => 'form', 'role' => 'form')); ?>
   <table class="table">
    <tr>
      <th>Name</th>
      <?php $args = array('id' => 'name', 'class' => 'form-control input-sm', 'type' => 'text', 'name' => 'name', 'value' => set_value('name', $user->name), 'autocomplete' => 'off'); ?>
      <td><?php echo form_input($args); ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <?php $args = array('id' => 'email', 'class' => 'form-control input-sm', 'type' => 'email', 'name' => 'email', 'value' => set_value('email', $user->email), 'autocomplete' => 'off'); ?>
      <td><?php echo form_input($args); ?></td>
    </tr>
    <tr>
      <th>Password</th>
      <?php $args = array('id' => 'password', 'class' => 'form-control input-sm', 'type' => 'password', 'name' => 'password'); ?>
      <td><?php echo form_password($args); ?></td>
    </tr>
    <tr>
      <th>Confirm Password</th>
      <?php $args = array('id' => 'confirm', 'class' => 'form-control input-sm', 'type' => 'password', 'name' => 'confirm'); ?>
      <td><?php echo form_password($args); ?></td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo form_submit('edit', 'Edit', 'class = btn btn-primary'); ?></td>
    </tr>
   </table>
   <?php echo form_close(); ?>
</div>