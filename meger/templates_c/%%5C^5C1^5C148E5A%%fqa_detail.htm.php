<?php /* Smarty version 2.6.10, created on 2011-06-10 10:20:07
         compiled from fqa_detail.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="200" valign="top">	

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
<td width="20">&nbsp;</td>
<td valign="top">	

<div id="wave" style="width:100%">
        <div id="topBar"><?php echo $this->_tpl_vars['jname']; ?>
 &raquo; <?php echo $this->_tpl_vars['a']; ?>
</div>
        <div id="subBar"></div>

        <div id="content" style="padding:10px">
        <div id="navbar"></div>
        <div class="warning"><?php if ($_SESSION['message']):  echo $_SESSION['message'];  endif; ?></div>
        

<form action="?" method="post" enctype="multipart/form-data">
	<table width="90%" cellpadding="10" class="formulir">
		<tr>
		  <td width="20%">Title</td>
		  <td><input name="f_judul" type="text" id="f_judul" value="<?php echo $this->_tpl_vars['data']['judul']; ?>
" size="80" /></td>
		</tr>
		<tr>
		  <td width="20%" valign="top">Content</td>
		  <td>
          <textarea name=f_description cols=60 rows=6 id="f_description"><?php echo $this->_tpl_vars['data']['description']; ?>
</textarea>		</td>
		</tr>
		
		<tr>
		  <td>&nbsp;</td>
		  <td>
          	<input type="submit" class="waveButtonMain" value="Save" />
		    <input type="button" value="Cancel" onclick="history.back()" class="waveButtonMain" /></td>
		  </tr>
        <!--
		<tr>
		  <td width="20%">Transaksi</td>
		  <td><a href="transaksi.php?a=detail&amp;gid=<?php echo $this->_tpl_vars['gid']; ?>
">Lihat data transaksi <?php echo $this->_tpl_vars['data']['code_user']; ?>
</a></td>
		</tr>
        -->
	</table>
<input type="hidden" name="gid" value="<?php echo $this->_tpl_vars['gid']; ?>
" />

		<input type="hidden" name="a" value="<?php echo $this->_tpl_vars['a']; ?>
" />
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