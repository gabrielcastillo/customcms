<div class="modal-header">
  <h4 class="modal-title">Add page</h4>
</div>
<div class="modal-body">
  <?php echo validation_errors(); ?>
   <?php echo form_open('admin/page/edit/' . $page->id, array('id' => 'edit_form', 'class' => 'form', 'role' => 'form')); ?>
   <table class="table">
    <tr>
      <th>Title</th>
      <?php $args = array('id' => 'title', 'class' => 'form-control input-sm', 'type' => 'text', 'name' => 'title', 'value' => set_value('title', $page->title), 'autocomplete' => 'off'); ?>
      <td><?php echo form_input($args); ?></td>
    </tr>
    <tr>
      <th>Slug</th>
      <?php $args = array('id' => 'slug', 'class' => 'form-control input-sm', 'type' => 'text', 'name' => 'slug', 'value' => set_value('slug', $page->slug), 'autocomplete' => 'off'); ?>
      <td><?php echo form_input($args); ?></td>
    </tr>
    <tr>
      <th>Page Order</th>
      <?php $args = array('id' => 'order', 'class' => 'form-control input-sm', 'type' => 'text', 'name' => 'order', 'value' => set_value('order', $page->order), 'autocomplete' => 'off'); ?>
      <td><?php echo form_input($args); ?></td>
    </tr>
    <tr>
      <th>Body</th>
      <?php $args = array('id' => 'body', 'class' => 'form-control input-sm tinymce', 'name' => 'body', 'value' => set_value('body', $page->body)); ?>
      <td><?php echo form_textarea($args); ?></td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo form_submit('submit', 'Submit', 'class = btn btn-primary'); ?></td>
    </tr>
   </table>
   <?php echo form_close(); ?>
</div>