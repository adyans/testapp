<?php /* Smarty version 2.6.10, created on 2012-10-15 08:49:33
         compiled from about_detail.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


	<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>


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
        
	<div id="alerts">
		<noscript>
			<p>
				<strong>CKEditor requires JavaScript to run</strong>. In a browser with no JavaScript
				support, like yours, you should still see the contents (HTML data) and you should
				be able to edit it normally, without a rich editor interface.
			</p>
		</noscript>
	</div>

<form action="?" method="post" enctype="multipart/form-data">
	<table width="90%" cellpadding="10" class="formulir">
		<tr>
		  <td width="20%">Title</td>
		  <td><input name="f_title" type="text" id="f_title" value="<?php echo $this->_tpl_vars['data']['title']; ?>
" size="80" /></td>
		</tr>
		<tr>
		  <td width="20%" valign="top">Content</td>
		  <td>
          <textarea cols="80" id="editor1" rows="10" name=f_content><?php echo $this->_tpl_vars['data']['content']; ?>
</textarea>		</td>
		<script type="text/javascript">
			<?php echo '
			if ( typeof CKEDITOR == \'undefined\' )
			{
				document.write(
					\'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.\' +
					\'This sample assumes that CKEditor (not included with CKFinder) is installed in\' +
					\'the "/ckeditor/" path. If you have it installed in a different place, just edit\' +
					\'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"\' +
					\'value (line 32).\' ) ;
			}
			else
			{
				var editor = CKEDITOR.replace( \'editor1\' );
				//editor.setData( \'<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>\' );

				// Just call CKFinder.setupCKEditor and pass the CKEditor instance as the first argument.
				// The second parameter (optional), is the path for the CKFinder installation (default = "/ckfinder/").
				//CKFinder.setupCKEditor( editor, \'ckfinder\' ) ;
				// It is also possible to pass an object with selected CKFinder properties as a second argument.
				CKFinder.setupCKEditor( editor, { basePath : \'./ckfinder\', skin : \'v1\' } ) ;
			}
			'; ?>

		</script>
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