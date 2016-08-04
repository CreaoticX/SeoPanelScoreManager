
<?php echo showSectionHead($sectionHead); 
if(!empty($error)){
?>
<div class="note"><span class="error">Error - <?php echo $error; ?></span></div>
<?php
}
global $scores;
foreach ($scores as $n => $m) {
    if (!empty($m)) {
        ?>
        <h2><?php echo ucfirst($n) . " Score Settings<br>"; ?></h2>
        <?php
        foreach ($m as $k => $v) {
            $settings = $v->show_settings();
            if (!empty($settings)) {
                $label = $v->get_label();
                $tag = $v->get_tag();
                $i = 0;
                ?>
                <form id='<?php echo $tag; ?>'>
                    <input type="hidden" value="update" name="sec">
                    <input type="hidden" value="<?php echo PLUGIN_ID; ?>" name="pid">
                    <input type="hidden" value="<?php echo $n; ?>" name="type">
                    <table width="80%" border="0" cellspacing="0" cellpadding="0" class="list">
                        <tr class="listHead">
                            <td class="left" width='30%'><?php echo ucwords($label) . " settings<br>"; ?></td>
                            <td class="right">&nbsp;</td>
                        </tr>
                        <?php
                        foreach ($settings as $set_id => $setting) {

                            $class = ($i % 2) ? "blue_row" : "white_row";
                            ?>
                            <tr class="<?php echo $class ?>">
                                <td class="td_left_col">
                                    <?php
                                    echo ucwords($setting['label']);
                                    ?>
                                </td>
                                <td class="td_right_col">

                                    <?php
                                    if (isAdmin()) {
                                        ?>
                                        <input type="text" name="<?php echo $tag . '[' . $set_id . ']' ?>" value="<?php echo $setting['val'] ?>" style='width:100px'>
                                        <?php
                                    } else {
                                        echo $setting['val'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        $class = ($i % 2) ? "blue_row" : "white_row";
                        ?>
                        <tr class="<?php echo $class ?>">
                            <td class="td_left_col" >
                            </td>
                            <td class="td_right_col">
                                <a onclick="<?php echo pluginConfirmPOSTMethod($tag, 'content', '&action=update_settings&set=' . $tag);
                        ?>" href="javascript:void(0);" class="actionbut">
                                   <?php echo $spText['button']['Proceed'] ?>
                                </a>
                            </td>
                        </tr>
                        
                        <?php $class = ($i % 2) ? "white_row" : "blue_row";?>
                        <tr class="<?php echo $class ?>">
                            <td class="tab_left_bot_noborder"></td>
                            <td class="tab_right_bot"></td>
                        </tr>
                        <tr class="listBot">
                            <td class="left" colspan="1"></td>
                            <td class="right"></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
        }
    }
}
?>

