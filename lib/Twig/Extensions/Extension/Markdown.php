<?php

if (!defined('ENT_SUBSTITUTE')) {
    define('ENT_SUBSTITUTE', 8);
}

class Twig_Extensions_Extension_Markdown extends Twig_Extension
{
    public function getTokenParsers()
    {
        return array(
            new Twig_Extensions_TokenParser_Markdown(),
        );
    }

    public function getFilters()
    {
        $filters = array(
            // formatting filters
            'markdown'=> new Twig_Filter_Function('twig_markdown'),
        );

        return $filters;
    }

    public function getName()
    {
        return 'markdown';
    }

}

function twig_markdown($data)
{
    return \OperaCore\Helper::markdown($data);
}

