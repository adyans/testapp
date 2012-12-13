<?php /* Smarty version 2.6.10, created on 2011-03-15 14:23:57
         compiled from stw_rbt_detail.htm */ ?>
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
		  <td width="20%">Judul</td>
		  <td><input name="f_judul" type="text" id="f_judul" value="<?php echo $this->_tpl_vars['data']['judul']; ?>
" size="80" /></td>
		</tr>
		<tr>
		  <td width="20%" valign="top">Desc</td>
		  <td>
          <textarea name=f_description cols=60 rows=6 id="f_desc"><?php echo $this->_tpl_vars['data']['description']; ?>
</textarea>		</td>
		<tr>
		  <td width="20%" valign="top">Image</td>
		  <td>
          	<img src="../<?php echo $this->_tpl_vars['data']['image']; ?>
" /><br /><br />
            <img src="../<?php echo $this->_tpl_vars['data']['image']; ?>
.l.jpg" /><br /><br />
		    <input type="file" name="image" id="image" />
		    <br />
		    *hanya mendukung file JPEG</td>
		<tr>
		  <td width="20%" valign="top">Action</td>
		  <td><input name="f_action" type="text" id="f_action" value="<?php echo $this->_tpl_vars['data']['action']; ?>
" size="80" />
		    <br />
		    *isi dengan sms://adn:sms misal sms://1212:RING ON 1234<br />
		    *atau isi dengan http://m.detik.com maka jika konten di klik akan menuju url tersebut</td>
		<tr>
		  <td width="20%" valign="top">Preview URL</td>
		  <td><input name="f_preview" type="text" id="f_preview" value="<?php echo $this->_tpl_vars['data']['preview']; ?>
" size="80" />
		    <br />
		    *isi dengan http://url.menuju.com/image.jpg<br />
		    *atau isi dengan rtsp://youtube.com/yxxx jika berupa video/sound stream</td>
		<tr>
		  <td width="20%" valign="top">Detail</td>
		  <td>
          <textarea name=f_detail cols=60 rows=6 id="f_detail"><?php echo $this->_tpl_vars['data']['detail']; ?>
</textarea>		</td>
		
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