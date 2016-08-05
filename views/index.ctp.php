<div id='subcontent'>
<?php echo showSectionHead($sectionHead); ?>
    <form id='score_weights'>
    <input type="hidden" value="update" name="sec">
    <input type="hidden" value="<?php echo PLUGIN_ID; ?>" name="pid">

        <?php 
        global $scores;
        foreach($scores as $n => $m){
            if(!empty($m)){
                $i = 0;?>
<table width="80%" border="0" cellspacing="0" cellpadding="0" class="list">
                <tr class="listHead">
                        <td class="left" width='30%'><?php echo ucfirst($n) . " scores<br>"; ?></td>
                        <td class="right">&nbsp;</td>
                </tr>
                
                <?php foreach ($m as $k => $v){
                    $v->load_settings();
                    $label = $v->get_label();
                    $tag = $v->get_tag();
                    $class = ($i % 2) ? "blue_row" : "white_row";
		?>
		<tr class="<?php echo $class?>">
			<td class="td_left_col">
				<?php 
                                echo ucwords($label);
                                ?>
			</td>
			<td class="td_right_col">
                            
                            <?php
                    if($v->is_active()){
                        $status = 'Active';
                    }else{
                        $status = 'Inactive';
                    }
                    ?>
                            <a href="javascript:void(0)" onclick="togglePluginActivation('<?php echo $tag . "','".PLUGIN_ID?>')" id="<?php echo $tag;?>"><?php echo $status;?></a>
			</td>
		</tr>
                    <?php $i++;
                }?>
	<tr class="blue_row">
		<td class="tab_left_bot_noborder"></td>
		<td class="tab_right_bot"></td>
	</tr>
	<tr class="listBot">
		<td class="left" colspan="1"></td>
		<td class="right"></td>
	</tr>
</table>
        <?php
            } 
        }?>
        
                </form></div>
</div>
