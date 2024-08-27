<?php
defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;

class PlgContentImgfluid extends CMSPlugin
{
    public function onContentPrepare($context, &$article, &$params, $page = 0)
    {
        // Verifica se é um artigo
        if (strpos($context, 'com_content') === false) {
            return true;
        }

        // Verifica se há conteúdo
        if (empty($article->text)) {
            return true;
        }

        // Adiciona a classe img-fluid a todas as tags <img>
        $article->text = preg_replace('/<img(.*?)class="(.*?)"(.*?)>/i', '<img$1class="$2 img-fluid"$3>', $article->text);
        $article->text = preg_replace('/<img(?!.*?class=)(.*?)>/i', '<img class="img-fluid"$1>', $article->text);

        return true;
    }
}
