<?php

namespace App\Config;

use Rain\Tpl;

class Template {        

    public static function render($page, array $data = null){        
        self::setTplConfig();
        self::handle($page, $data);
    }
    
    private function setTplConfig(){
        Tpl::configure('tpl_dir', 'Views/');        
        Tpl::configure('cache_dir', 'cache/');
    }
    
    private function handle($page, $data){      
        $template = new Tpl;
        if($data){ $template->assign($data); }        
        $template->draw($page);
    }

    
}