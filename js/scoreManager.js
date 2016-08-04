function togglePluginActivation(elId,pid){
    innerS = document.getElementById(elId).innerHTML;
    if(innerS == 'Active'){
        tog = 2;
    }else{
        tog = 1;
    }
    scriptDoLoad('seo-plugins.php', elId, '&action=togglePlugin&handle='+elId+'&pid='+pid+'&toggle='+tog);
}