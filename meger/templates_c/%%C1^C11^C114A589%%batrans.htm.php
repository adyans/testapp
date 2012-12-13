<?php /* Smarty version 2.6.10, created on 2011-09-21 14:48:41
         compiled from batrans.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'batrans.htm', 20, false),)), $this); ?>
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
</div>
        <div id="subBar"></div>

        <div id="content" style="padding:10px">
        <div id="navbar"></div>
        <div class="warning"><?php if ($_SESSION['message']):  echo $_SESSION['message'];  endif; ?></div>
        
<form action="?" method="get">
	From: <?php echo smarty_function_html_select_date(array(), $this);?>
<br />
    To: <?php echo smarty_function_html_select_date(array(), $this);?>
<br /><br />
    

	<!--<input type="text" name="q" value="" />-->
     <input type="submit" value="search" /> 
	
</form><br />

<!--
<form action="<?php echo $this->_tpl_vars['url']; ?>
" method="get">
	Show 
	  <select name="l">
		<option value="1" <?php if ($this->_tpl_vars['limit'] == 1): ?>selected<?php endif; ?>>1</option>
		<option value="10" <?php if ($this->_tpl_vars['limit'] == 10): ?>selected<?php endif; ?>>10</option>
		<option value="50" <?php if ($this->_tpl_vars['limit'] == 50): ?>selected<?php endif; ?>>50</option>
		<option value="100" <?php if ($this->_tpl_vars['limit'] == 100): ?>selected<?php endif; ?>>100</option>
	</select><input type="submit" value="go" />
	<input type="hidden" name="s" value="<?php echo $this->_tpl_vars['start']; ?>
" />
	<input type="hidden" name="o" value="<?php echo $this->_tpl_vars['order']; ?>
" />
</form> -->

<b><?php echo $this->_tpl_vars['prev_url']; ?>
 | <?php echo $this->_tpl_vars['next_url']; ?>
</b>

<table id="rounded-corner" summary="Berita">
<thead><tr>
    <th scope="col" class="rounded-company" width="53">Kiosk_ID</th>
    <th scope="col" class="rounded-q1" width="65">Date_Kiosk</th>
    <th scope="col" class="rounded-q1" width="67">Time_Kiosk</th>
    <th scope="col" class="rounded-q1" width="67">Type_Trx</th>
    <th scope="col" class="rounded-q1" width="98">Inq_Trx_ID_Kiosk</th>
    <th scope="col" class="rounded-q1" width="101">Card_ID_Remitter</th>
    <th scope="col" class="rounded-q1" width="107">Nominal_Trx_MYR</th>
    <th scope="col" class="rounded-q1" width="102">Admin_Fee_Kiosk</th>
    <th scope="col" class="rounded-q1" width="121">Nominal_Cash_In_BA</th>
    <th scope="col" class="rounded-q1" width="121">Kumulative_Nom_BA</th>
    <th scope="col" class="rounded-q1" width="106">Sheet_Cash_In_BA</th>
    <th scope="col" class="rounded-q1" width="154">Kumulative_Sheet_Cash_In</th>
    <th scope="col" class="rounded-q1" width="121">Ref_ID_Trx_Bank_IDR</th>
    <th scope="col" class="rounded-q4" width="64">Detail</th>
</tr>
</thead>
<tbody>
<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
	<tr>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Kiosk_ID']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Date_Kiosk']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Time_Kiosk']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Type_Trx']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Inq_Trx_ID_Kiosk']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Card_ID_Remitter']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Nominal_Trx_MYR']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Admin_Fee_Kiosk']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Nominal_Cash_In_BA']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Kumulative_Nom_BA']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Sheet_Cash_In_BA']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Kumulative_Sheet_Cash_In']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['Ref_ID_Trx_Bank_IDR']; ?>
</div></td>
		<td><div align="center">-</div></td>
	</tr>
<?php endfor; endif; ?>
</tbody>
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