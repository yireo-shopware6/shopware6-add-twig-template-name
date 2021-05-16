<?php declare(strict_types=1);

namespace Yireo\AddTwigTemplateName\Twig\Extension\AddTemplateName;

use Twig\Compiler;
use Twig\Node\Node;

class NodeEnd extends Node
{
    /**
     * {@inheritDoc}
     */
    public function __construct($varName)
    {
        parent::__construct([], ['var_name' => $varName]);
    }

    /**
     * @param Compiler $compiler
     */
    public function compile(Compiler $compiler)
    {
        $compiler
            ->write("\n")
            ->write(
                sprintf(
                    "\$%s->end(\$%s);\n\n",
                    $this->getAttribute('var_name'),
                    $this->getAttribute('var_name').'_ref'
                )
            );
    }
}
