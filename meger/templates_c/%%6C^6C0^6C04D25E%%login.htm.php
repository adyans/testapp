<?php /* Smarty version 2.6.10, created on 2012-10-15 10:15:35
         compiled from login.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top" align="center">	

<div id="wave" style="width:20%;text-align:center">
        <div id="topBar">Login</div>
        <div id="subBar"></div>

        <div id="content" style="padding:10px">
        <div id="navbar"></div>
        <div class="warning"><?php if ($_SESSION['message']):  echo $_SESSION['message'];  endif; ?></div>
        
	<form name="form1" method="post" action="login.php">
	
			<input type="hidden" name="next" value="<?php echo $this->_tpl_vars['next']; ?>
" />
      <table width="203" border="0" cellpadding="0" cellspacing="0">
<tr>
                <td>Username</td>
                <td>&nbsp;</td>
                <td><input name="uname" type="text" id="uname" size="10" /></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>&nbsp;</td>
                <td><input name="passwd" type="password" id="passwd" size="10"/></td>
              </tr>
            </table><br />
						
   	  <input type="submit" name="a" value="Login" />
</form>
        
        </div>
        
        <div id="bottomBar">

        
        </div>
    </div></td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>