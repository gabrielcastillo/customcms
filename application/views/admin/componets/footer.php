    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
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
          "save table contextmenu directionality template paste textcolor"
        ],
        toolbar: "undo redo | styleselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media fullpage | code preview fullscreen | save",
        image_advtab: true ,
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
          $('form').submit();
        }

      }); 



      //Create slugs for pages.
      $('input[name="title"]').on('keyup', function(){
        var title = $(this).val();
        var string = title.replace(/\s+/g, "-");
        $('input[name="slug"]').val(string.toLowerCase());
      });
    });
    </script>
    
  </body>
</html>
