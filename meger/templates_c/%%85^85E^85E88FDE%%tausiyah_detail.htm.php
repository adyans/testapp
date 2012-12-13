<?php /* Smarty version 2.6.10, created on 2011-10-25 10:21:49
         compiled from tausiyah_detail.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'tausiyah_detail.htm', 63, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<SCRIPT LANGUAGE="JavaScript">
<!-- Dynamic Version by: Nannette Thacker -->
<!-- http://www.shiningstar.net -->
<!-- Original by :  Ronnie T. Moore -->
<!-- Web Site:  The JavaScript Source -->
<!-- Use one function for multiple text areas on a page -->
<!-- Limit the number of characters per textarea -->
<!-- Begin
function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update \'characters left\' counter
else
cntfield.value = maxlimit - field.value.length;
}
//  End -->
</script>
'; ?>


	<!--
	<script type="text/javascript" src="ckeditor.js"></script>
	<script src="sample.js" type="text/javascript"></script>
	<link href="sample.css" rel="stylesheet" type="text/css" />-->


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
        
<form action="?" method="post" enctype="multipart/form-data" name="myForm">
	<table width="90%" cellpadding="10" class="formulir">
		<tr>
		  <td width="20%" valign="top">Content</td>
		  <td>
		  
<textarea name="f_content" id="message2" wrap="physical" cols="28" rows="5" onKeyDown="textCounter(document.myForm.message2,document.myForm.remLen2,160)" onKeyUp="textCounter(document.myForm.message2,document.myForm.remLen2,160)"><?php echo $this->_tpl_vars['data']['content']; ?>
</textarea>
<br>
<input readonly type="text" name="remLen2" size="3" maxlength="3" value="160">
characters left		  
		  
          </td>
		</tr>

		<tr>
		  <td width="20%" valign="top">Publish Date</td>
		  <td>
		  
		  <?php echo smarty_function_html_select_date(array('prefix' => 'pub_'), $this);?>

		  
          </td>
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