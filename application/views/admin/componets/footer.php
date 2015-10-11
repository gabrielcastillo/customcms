    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/tinymce/tinymce.min.js'); ?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      tinymce.init({
        selector: "textarea.tinymce",
        theme: "modern",
      
        height: 300,
        plugins: [
             "autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
             "save table contextmenu directionality textcolor"
       ],
       //content_css: "css/content.css",
       toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
     }); 


      $('input[name="title"]').on('keyup', function(){
        var title = $(this).val();
        var string = title.replace(/\s+/g, "-");
      
        $('input[name="slug"]').val(string.toLowerCase());
      });
    });
    </script>
  </body>
</html>
