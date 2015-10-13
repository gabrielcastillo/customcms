    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <?php if( $this->uri->segment(2) == 'page'): ?>
    <script src="<?php echo base_url('public/js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/nestedSortable.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/tinymce/tinymce.min.js'); ?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){




      tinymce.init({
        selector: "textarea.tinymce",
        theme: "modern",
        height: 420,
        menubar: false,
        plugins: [
          "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
          "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
          "save table contextmenu directionality template paste textcolor codemirror"
        ],
        toolbar: "undo redo | styleselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media fullpage | code preview fullscreen | save",
        image_advtab: true,
        external_filemanager_path:"/filemanager/",
        filemanager_title:"Filemanager" ,
        external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
        fullscreen_new_window : true,
        fullscreen_settings : {
                theme_advanced_path_location : "top"
        },
        theme_advanced_source_editor_height: 800,
        theme_advanced_source_editor_width: 460,
        save_enablewhendirty: true,
        save_onsavecallback: function() {
          //Toolbar save method
          $('form').submit();
        },
        document_base_url: "<?php echo base_url(); ?>",
        codemirror: {
          indentOnInit: true,
          path: 'CodeMirror',
          config: { 
             mode: 'application/x-httpd-php',
             lineNumbers: true
          },
          jsFiles: [ 
             'mode/clike/clike.js',
             'mode/php/php.js'
          ],
          cssFiles: [
             'theme/neat.css',
             'theme/elegant.css'
          ]
        }
      }); 


      //Create slugs for pages.
      $('input[name="title"]').on('keyup', function(){
        var title = $(this).val();
        var string = title.replace(/\s+/g, "-");
        $('input[name="slug"]').val(string.toLowerCase());
      });

      $.post('<?php echo base_url("admin/page/order_ajax"); ?>', {}, function(data){
        $('#orderResult').html(data);
        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div',
            maxLevels: 2,
            cancel: ".disable-sort" 
        });
      });

      $('#save').on('click', function(){
        oSortable = $('.sortable').nestedSortable('toArray');
        $.post('<?php echo base_url("admin/page/order_ajax"); ?>', {sortable: oSortable}, function(data){
          $('#orderResult').html(data);
          $('.sortable').nestedSortable({
              handle: 'div',
              items: 'li',
              toleranceElement: '> div',
              maxLevels: 2,
              cancel: ".disable-sort" 
          });
        });
      });


    });
    </script>
    <?php endif; ?>
  </body>
</html>
