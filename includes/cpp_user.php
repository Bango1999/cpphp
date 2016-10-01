 <?php if ($_SESSION['user']['fresh']) {
    $_SESSION['user']['fresh'] = false;
 ?>
  <div style="margin:0;padding:0;background:rgba(0,255,0,0.3);color:white;text-align:center;font-weight:bold;text-shadow:1px 1px 2px black">
    Welcome, <?php echo $_SESSION['user']['name']; ?>!
  </div>

  <?php } ?>
  <div class="row">
  <form id="frm" action="./workspace.php" method="post" style="position:relative">
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
    
    <form id="logout" action="./logout.php" method="post">
      <input type="hidden" name="logout" value="1" />
      <a id="logbtn" href="#">Logout</a>
    </form>
</div>