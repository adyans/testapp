<?php /* Smarty version 2.6.10, created on 2010-12-16 12:16:11
         compiled from account_passwd.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top" align="center">	

<div id="wave" style="width:30%;text-align:center">
        <div id="topBar">Change Password</div>
        <div id="subBar"></div>

        <div id="content" style="padding:10px">
        <div id="navbar"></div>
        <div class="warning"><?php if ($_SESSION['message']):  echo $_SESSION['message'];  endif; ?></div>
        
<form action="account.php" method="post">
<table>
	<tr><td>Old password</td><td><input type="password" name="old"/></td></tr>
	<tr><td>New password</td><td><input type="password" name="new"/></td></tr>
	<tr><td>Retype new password</td><td><input type="password" name="re"/></td></tr>
</table>
<input type="hidden" name="a" value="password" />
<input type="Submit" value="Change" />
<input type="button" value="Cancel" onclick="location.href='account.php'"/>
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