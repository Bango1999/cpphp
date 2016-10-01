 
  <div class="row">
  <form id="frm" action="cpp.php" method="post" style="position:relative">
    <div id="rightPanel">
      <input id="compile" type="submit"value="Compile [& Run]" />
      <fieldset style="background:rgba(0,0,0,0.5)">
        <legend>Text Size</legend>
        <div id="slider"></div>
      </fieldset>
      <fieldset style="background:rgba(0,0,0,0.5)">
        <legend>Parameters:</legend>
        <div style="display:table-row">
          <textarea name="params" id="params"></textarea>
        </div>
      </fieldset>
    </div>
    <textarea id="code" name="code"><?php

  if (!isset($_POST['code'])) {
    echo pullRecentCode();
  } else { echo $_POST['code']; }
?></textarea>
  </form>
</div>