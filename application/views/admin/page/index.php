<section>
  <h2>Pages</h2>
  <?php echo anchor('admin/page/edit', '<i class="glyphicon glyphicon-plus"></i> Add page'); ?>
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php if( count($pages) ): foreach($pages as $page): ?>
      <tr>
        <td><?php echo anchor('admin/page/edit/' . $page->id, $page->title); ?></td>
        <td><?php echo btn_edit('admin/page/edit/' . $page->id);?></td>
        <td><?php echo btn_delete('admin/page/delete/' . $page->id);?></td>
      </tr>
      <?php endforeach; ?>
      <?php else:  ?>
      <tr>
        <td colspan="3" class="text-center">No page data</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</section>
