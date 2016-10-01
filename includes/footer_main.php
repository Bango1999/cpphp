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
    
    //play main typing intro
    if ($('#code').length > 0) {
      function doStuff(editor,build,i,str,ci) {
        if (i == str.length-1) {
          editor = editor.toTextArea();
          editor = CodeMirror.fromTextArea($('#code')[0], {
            lineNumbers: true,
            lineWrapping: true,
          });
          $('.CodeMirror:first').attr("id","codemirror");
          $('#codemirror').css({'height': screen.height/2 + 'px','margin-bottom':'20px'});
          clearInterval(ci);
        }
          editor.getDoc().setValue(build);
      }
      function playMain(editor) {
        var str = "//place your c++ in here!\r#include <iostream>\rusing namespace std;\r\rint main(int argc, char * argv[]) {\r\tcout << \"Hell, World.\" << endl;\r\tcout << \"This function has \" << argc-1 << \" parameters:\" << endl;\r\tfor (int i = 1; i < argc; i++) {\r\t\tcout << argv[i] << endl;\r\t}\r\treturn 0;\r}";
        var build = "";
        var i = 0;
        var scriptType = setInterval(function() {build = build + str[i];doStuff(editor,build,i,str,scriptType);i++; },50);
        }
      }
      editor = CodeMirror.fromTextArea($('#code')[0], {
        lineNumbers: true,
        lineWrapping: true,
        readOnly: true
      });
      playMain(editor);
    
    
    //assign codemirror id
    if ($('.CodeMirror').length > 0) {
      $('.CodeMirror:first').attr("id","codemirror");
      $('#codemirror').css({'height': screen.height/2 + 'px','margin-bottom':'20px'}); 
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
  });//.ready
</script>
</body>
<link rel="stylesheet" href="style/uri.css"/>
</html>