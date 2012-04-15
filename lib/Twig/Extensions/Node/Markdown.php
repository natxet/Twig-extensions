<?php

/**
 * Represents a markdown node.
 *
 * @package    twig
 * @subpackage Twig-extensions
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Nacho Cofré, inspired by geta6 <getakura@gmail.com>
 * @version    0.1
 */
class Twig_Extensions_Node_Markdown extends Twig_Node
{
    public function __construct(Twig_NodeInterface $body, $lineno, $tag = 'markdown')
    {
        parent::__construct(array('body' => $body), array(), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param Twig_Compiler A Twig_Compiler instance
     */
    public function compile(Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("\$string = <<< MARKDOWN\n")
            ->write($this->getNode('body')->getAttribute('data'))
            ->write("\nMARKDOWN;\n")
	        ->write("echo \\OperaCore\\Helper::markdown(\$string);\n")
        ;
    }
}
