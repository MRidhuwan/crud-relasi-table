 <?php
  include "koneksi.php";
  ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Aplikasi CRUD</title>

   <!-- favicon -->
   <link rel="shortcut icon" href="img/favicon.ico">

   <!-- Bootstrap -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/datepicker.min.css" rel="stylesheet">

   <!-- styles -->
   <link href="css/style.css" rel="stylesheet">

   <!-- Fungsi untuk membatasi karakter yang diinputkan -->
   <script language="javascript">
     function getkey(e) {
       if (window.event)
         return window.event.keyCode;
       else if (e)
         return e.which;
       else
         return null;
     }

     function goodchars(e, goods, field) {
       var key, keychar;
       key = getkey(e);
       if (key == null) return true;

       keychar = String.fromCharCode(key);
       keychar = keychar.toLowerCase();
       goods = goods.toLowerCase();

       // check goodkeys
       if (goods.indexOf(keychar) != -1)
         return true;
       // control keys
       if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
         return true;

       if (key == 13) {
         var i;
         for (i = 0; i < field.form.elements.length; i++)
           if (field == field.form.elements[i])
             break;
         i = (i + 1) % field.form.elements.length;
         field.form.elements[i].focus();
         return false;
       };
       // else return false
       return false;
     }
   </script>
 </head>

 <body>
   <nav class="navbar navbar-default navbar-fixed-top">
     <div class="container-fluid">
       <!-- Brand -->
       <div class="navbar-header">
         <a class="navbar-brand" href="index.php">

           <i class="glyphicon glyphicon-home"></i>
           Aplikasi Sederhana
         </a>
       </div>
     </div> <!-- /.container-fluid -->
   </nav>

   <div class="container-fluid">
     <?php
      if (empty($_GET["page"])) {
        include "show_data.php";
      } elseif ($_GET['page'] == 'laporan') {
        include "laporan.php";
      } elseif ($_GET['page'] == 'tambah') {
        include "tambah_data.php";
      } elseif ($_GET['page'] == 'edit') {
        include "edit_data.php";
      }
      ?>
   </div> <!-- /.container-fluid -->

   <footer class="footer">
     <div class="container-fluid">

       <p class="text-center pull-right">&copy; Modifly Theme by
         <a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a>
       </p>
     </div>
   </footer>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="js/jquery.min.js"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap-datepicker.min.js"></script>

   <script type="text/javascript">
     $(function() {

       //datepicker plugin
       $('.date-picker').datepicker({
         autoclose: true,
         todayHighlight: true
       });

       // toolip
       $('[data-toggle="tooltip"]').tooltip();
     });
   </script>
 </body>

 </html>