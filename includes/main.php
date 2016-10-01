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
    <textarea id="code" name="code"></textarea>
  </form>
</div>







<div class="row">
  
  <div class="row">
  <div class="large-12 columns">

    <div class="panel">
      <h4>Web++ Membership</h4>
      
      <div class="row">
        <div class="large-9 columns">
          <form id="reg" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="large-9 columns">
              <label for="username">username:</label><input type="text" name="username" required />
              <label for="email">email:</label><input type="email" name="email" required />
              <label for="password">password:</label><input type="password" name="password" required />
            </div>
            <div class="large-3 columns">
              <p>The benefit of registering is, you get to save your work and load your saved files again later</p>
              <button type="submit" class="radius button right">Register Meow</button>
            </div>
          </form>
        </div>
        <div class="large-3 columns">
          <form id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="toaster">username:</label><input type="text" name="toaster" required />
            <label for="oven">password:</label><input type="password" name="oven" required />
            <input type="hidden" name="login" value="1" />
            <button type="submit" class="radius button">Login</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

  <div class="large-8 columns">
    <h4>Web++</h4>
    <p><b>Create and test C++ applications on the fly, from any device!</b><br/>
    <p>"cin" and similar runtime-input libraries are not supported. Use command line parameters instead!</p>
    <p>Put the power of a C++ environment in your web services!</p>
    <p><a href="./info.php" class="secondary small button">More Info <span style="font-size:larger">&nbsp;&#10162;</span></a></p>
  </div>

  <div class="large-4 columns">



    <ul class="small-block-grid-3">
      <p>6 Doors, each more mysterious than the last</p>
      <li><a href="http://www.iamnop.com/particles/"><img id="particle" src="http://placehold.it/120/002200?text=1"/></a></li>
      <li><a href="http://cabbi.bo/Text/"><img id="textgl" src="http://placehold.it/120/004400?text=2"/></a></li>
      <li><a href="http://www.robscanlon.com/encom-boardroom/"><img id="git" src="http://placehold.it/120/006600?text=3"/></a></li>
      <li><a href="http://www.seehearparty.com/"><img id="see" src="http://placehold.it/120/003300?text=4"/></a></li>
      <li><a href="http://www.overthetinyhills.com/"><img id="phono" src="http://placehold.it/120/005500?text=5"/></a></li>
      <li><a href="http://qcplayground.withgoogle.com/#/home"><img id="qbit" src="http://placehold.it/120/007700?text=6"/></a></li>
    </ul>
  </div>

</div>



<div class="row">
  <div class="large-12 columns">

    <div class="panel">
      <h4>Get in touch!</h4>

      <div class="row">
        <div class="large-3 columns" style="padding-top:20px">
          <a href="./contact.php" class="radius button">Contact Meow</a>
        </div>
        <div class="large-9 columns">
          <p>If you really want to get in contact with me, and can think of no other ways to do so, you can always leave me a message. For now, messages are free, so use them to your advantage.  In the future, sending me a message will cost $5.</p>
        </div>
        
      </div>
    </div>

  </div>
</div>




<footer class="row">
  <div class="large-12 columns">
    <hr/>
        <p>&copy;  You don't want any of this<br/>
          Please let's keep it holds-barred and not trash my nice hacking website.</p>
  </div> 
</footer>
