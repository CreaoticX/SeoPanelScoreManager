
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
                        <td class="left" width='30%'><?php echo ucfirst($n) . " weights<br>"; ?></td>
                        <td class="right">&nbsp;</td>
                </tr>
                
                <?php foreach ($m as $k => $v){
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
                    $weight = $v->get_weight();
                    if(!isset($weight) || !is_numeric($weight)){
                        $weight = 1;
                    }
                    if(isAdmin()){
                    ?>
                            <input type="text" name="<?php echo $n .'['.$tag.']'?>" value="<?php echo $weight?>" style='width:100px'>
                    <?php }else{
                        ?>
                            <?php echo $weight; ?>
                    <?php } ?>
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
        <br><a onclick="<?php echo pluginConfirmPOSTMethod('score_weights', 'content', '&action=update_weights');
                ?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
        <?php
            } 
        }?>
        
                </form>
