    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/tinymce/tinymce.min.js'); ?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      tinymce.init({
        selector: "textarea.tinymce",
        theme: "modern",
        height: 300,
        menubar: false,
        plugins: [
             "autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
             "save table contextmenu directionality textcolor"
       ],
       toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons", 
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
