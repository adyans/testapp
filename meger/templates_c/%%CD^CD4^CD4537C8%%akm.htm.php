<?php /* Smarty version 2.6.10, created on 2011-05-29 14:16:56
         compiled from akm.htm */ ?>
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
        
<table id="rounded-corner" summary="Berita">
<thead><tr>
<th scope="col" class="rounded-company">-</th>
<th scope="col" class="rounded-q1">Title</th>
<th scope="col" class="rounded-q4">Content</th>
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
	    <td>
			<div align="center"><a href="?a=edit&amp;gid=<?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['id']; ?>
" class="menus">Edit</a></div>	  
		</td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['judul']; ?>
</div></td>
		<td><div align="center"><?php echo $this->_tpl_vars['data'][$this->_sections['c']['index']]['description']; ?>
</div></td>
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