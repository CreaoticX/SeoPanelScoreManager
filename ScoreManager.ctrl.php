<?php
if(!class_exists("ScoreManager")){
    class ScoreManager extends SeoPluginsController{

            function index() {
                    $this->set('sectionHead', SCORE_MANAGER_HEAD);
                    $userId = isLoggedIn();

                    $this->pluginRender('index');
            }

            function settings($info) {
                    $this->set('sectionHead', SCORE_MANAGER_SET_HEAD);	
                    if($info['error']){
                        $this->set('error', $info['error']);
                    }else{
                        $this->set('error', '');
                    }

                    $this->pluginRender('settings');
            }
            
            function update_settings($info){
                global $scores;
                if(isset($info['type']) && isset($info['set'])){
                    $set = $info['set'];
                    $ret = $scores[$info['type']][$set]->save_setting($info[$set]);
                }
                if($ret['error_code'] > 0){
                    $info['error'] = $ret['error'];
                }
                $this->settings($info);
            }

            function weights($info){
                $this->set('sectionHead', SCORE_MANAGER_WEI_HEAD);
                $this->pluginRender('weights');
            }
            
            function update_weights($info){
                global $scores;
                if(isAdmin()){
                    foreach($scores as $n => $m){
                        if(!empty($m) && key_exists($n, $info)){
                            foreach ($info[$n] as $k => $v){
                                $get_weight = $m[$k]->get_weight();
                                if(key_exists($k, $m) && $get_weight != v){
                                    $m[$k]->save_weight($v);
                                }
                            }
                        }
                    }
                }
                $this->weights($info);
            }
            
            function togglePlugin($info){
                global $scores;
                $status = 'Error';
                if(isAdmin() && isset($info['handle']) && isset($info['toggle'])){
                    foreach($scores as $n => $m){
                        if(!empty($m) && key_exists($info['handle'], $m)){
                            if($info['toggle'] == '2'){
                                $m[$info['handle']]->deactivate();
                            }else if($info['toggle'] == '1'){
                                $m[$info['handle']]->activate();
                            }
                            if($m[$info['handle']]->is_active()){
                                $status = 'Active';
                            }else{
                                $status = 'Inactive';
                            }
                        }
                    }
                }
                

                echo $status;
            }
    }
}