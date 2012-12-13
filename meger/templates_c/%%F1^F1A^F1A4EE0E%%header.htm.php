<?php /* Smarty version 2.6.10, created on 2012-10-15 10:15:35
         compiled from header.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'header.htm', 19, false),array('modifier', 'date_format', 'header.htm', 23, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="javascript" src="<?php echo $this->_tpl_vars['template_dir']; ?>
/js/util.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @_TITLE; ?>
</title>

<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['template_dir']; ?>
/css/wavestyle.css" />

</head>

<body <?php if ($this->_tpl_vars['onload']): ?>onload="<?php echo $this->_tpl_vars['onload']; ?>
"<?php endif; ?>>

<div id="main">
	<p id="orig">

Welcome <b><?php echo ((is_array($_tmp=@$_SESSION['uname'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Guest') : smarty_modifier_default($_tmp, 'Guest')); ?>
</b>
  	<?php if ($_SESSION['uid']): ?>
  	[<a href="account.php">account</a> | <a href="login.php?a=logout">logout</a>]
    	<!--
		<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>

        -->
		<?php else: ?>
        <a href="login.php?a=logout">[Login]</a>
        <?php endif; ?>    
    
    </p>
	<h1><a href="./" style="text-decoration:none;color:#FFFFFF"><?php echo @_APP; ?>
</a></h1>
<h2><?php echo $this->_tpl_vars['jname']; ?>
</h2>