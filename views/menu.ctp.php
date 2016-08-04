<?php
$menus = array(
    'index' => array('title'=>'Scores','admin' => TRUE),
    'weights' => array('title'=>'Score Weights','admin' => TRUE),
    'settings' => array('title'=>'Score Settings','admin' => True),
    );
?>
<ul id='subui'>
    <?php foreach($menus as $k => $v){ ?>
	<?php if((isAdmin() && $v['admin']) || !$v['admin']){?>
		<li><a href="javascript:void(0);" onclick="<?php echo pluginMenu('action='.$k); ?>"><?php echo $v['title']; ?></a></li>
	<?php }?>
    <?php } ?>
</ul>