<?php

namespace App\Config;

use Rain\Tpl;

class Template
{
    /**
     * Executa a configuração e a renderização do template
     *
     * @param string $page
     * @param array $data
     * @author Victor Marciano
     */
    public static function render(string $page, array $data = null): void
    {
        self::setTplConfig();
        self::handle($page, $data);
    }
    
    /**
     * Seta as pastas que conterão as views e os arquivos de cache respectivamente
     *
     * @author Victor Marciano
     */
    private function setTplConfig(): void
    {
        Tpl::configure('tpl_dir', 'Views/');
        Tpl::configure('cache_dir', 'cache/');
    }
    
    /**
     * Cria uma instância do RainTpl, seta os dados e renderiza o template
     *
     * @param string $page
     * @param array $data
     * @author Victor Marciano
     */
    private function handle(string $page, array $data): void
    {
        $template = new Tpl();
        if ($data) {
            $template->assign($data);
        }
        $template->draw($page);
    }
}
