<?php /* Smarty version 2.6.10, created on 2011-10-27 15:47:04
         compiled from account.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top" align="center">	

<div id="wave" style="width:20%;text-align:center">
        <div id="topBar">Account</div>
        <div id="subBar"></div>

        <div id="content" style="padding:10px">
        <div id="navbar"></div>
        <div class="warning"><?php if ($_SESSION['message']):  echo $_SESSION['message'];  endif; ?></div>
        
<table>
	<tr><td>Username</td><td align="left"><?php echo $this->_tpl_vars['field']['uname']; ?>
</td></tr>
	<tr><td>Password</td><td>****** <a href="account.php?a=password">Change</a></td></tr>
	<?php if ($this->_tpl_vars['field']['group']): ?>
		<tr><td>Group</td><td><?php echo $this->_tpl_vars['field']['group']; ?>
</td></tr>
	<?php endif; ?>
</table>
        
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