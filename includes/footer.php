<div class="row" style="width:100%;height:50%;box-sizing:border-box;padding: 20px;font-family:monospace;overflow:auto;max-height:45%">
  <pre class="panel" style="overflow:auto">
<?php
  if (isset($_POST['code']) && $out)
  foreach ($out as $o) {
    echo $o . '<br/>';
  } else {
    echo '<h6 style="text-align:center">Output/Compilation errors will appear here.</h6>';
  }?>
      
  </pre>
</div>
</div>

  <!-- Include jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/touchpunch.js"></script>
<script src="js/codemirror.js"></script>
<script src="js/javascript.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    
    //menu listener
    if ($('#menu').length > 0) {
      $('#menu').hide();
      if ($('#menuHook').length > 0)
        $('#menuHook').click(function() {
          if ( $('#menu').is( ":hidden" ) )
            $('#menu').show();
          else
            $( '#menu' ).hide();
        });
    }
    //pretty textbox
    if ($('#code').length > 0)
    editor = CodeMirror.fromTextArea($('#code')[0], {
      lineNumbers: true,
      lineWrapping: true,
      autofocus: true,
    });
    
    //assign codemirror id
    if ($('.CodeMirror').length > 0) {
      $('.CodeMirror:first').attr("id","codemirror");
      $('#codemirror').css({'max-height': '50%','margin-bottom':'20px'}); 
    }
    
    //slider call
    if ($('#slider').length > 0)
      $( "#slider" ).slider({
        slide: function() {
          if ($('#codemirror').length > 0) 
          $('#codemirror').css(
            {'font-size': ($(this).slider("option","value")+40)/3 + 'px'}
          );
          if ($('.CodeMirror-gutter').length > 0) 
          $( '.CodeMirror-gutter' ).css(
            {'width': ($(this).slider("option","value")/4)+30 + 'px'}
          );
          if ($('.CodeMirror-code div pre').length > 0) 
          $('.CodeMirror-code div pre').css(
            {'margin-left': ($(this).slider("option","value")+15)/4 + 'px'}
          );
        }
       });
    
    if ($('#logout').length > 0)
      $('#logbtn').click(function (e) {
        e.preventDefault();
        $('#logout')[0].submit();
      });
  } );
</script>
</body>
<link rel="stylesheet" href="style/uri.css"/>
</html>