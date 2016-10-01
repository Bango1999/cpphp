<?php
include "engine/functions.php";
include "engine/kony.php";
include_once 'includes/header.php';
?>
    <style>
      .CodeMirror {
        background: #222;
        color:#ccc;
        width:100%;
      }
      label {color:white;}
    </style>
    <div id="dt" style="width:100%;overflow:auto">
    <table id="datatable" style="width:100%;color:#000">
      <thead style="background:#cf0000">
        <tr>
          <th>ID</th>
          <th>Code</th>
          <th>IP</th>
        </tr>
      </thead>
      <tbody>
        

<?php
  getInfo();
?>
      </tbody>
    </table>
    </div>
  </body>
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
  <script src="js/codemirror.js"></script>
<script>
  $('.codemir').each(function(i,obj) {
    editor =  CodeMirror.fromTextArea(obj, {
      lineNumbers: true,
      lineWrapping: true,
      autofocus: true,
    });
  });
  $('#datatable').DataTable({"order": [[0,"desc"]]});
  $('#dt').css({'height':window.innerHeight-20 + 'px'});
  $(window).resize(function() {
    $('#dt').css({'height':window.innerHeight-20 + 'px'});
  });
  
</script>
</html>