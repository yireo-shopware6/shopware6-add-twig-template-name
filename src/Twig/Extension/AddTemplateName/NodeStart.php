<?php declare(strict_types=1);

namespace Yireo\AddTwigTemplateName\Twig\Extension\AddTemplateName;

use Twig\Compiler;
use Twig\Node\Node;

class NodeStart extends Node
{
    /**
     * NodeStart constructor.
     * @param $exensionName
     * @param $name
     * @param $line
     * @param $varName
     */
    public function __construct($exensionName, $name, $line, $varName)
    {
        parent::__construct(
            [],
            ['extension_name' => $exensionName, 'name'=> $name, 'line' => $line, 'var_name' => $varName]
        );
    }

    /**
     * @param Compiler $compiler
     */
    public function compile(Compiler $compiler)
    {
        $compiler
            ->write(sprintf('$%s = $this->env->getExtension(', $this->getAttribute('var_name')))
            ->repr($this->getAttribute('extension_name'))
            ->raw(");\n")
            ->write(
                sprintf(
                    '$%s->start($%s = new '.NodeReference::class.'(',
                    $this->getAttribute('var_name'),
                    $this->getAttribute('var_name').'_ref'
                )
            )
            ->repr($this->getAttribute('name'))
            ->raw(', $this->getTemplateName(), ')
            ->repr($this->getAttribute('line'))
            ->raw("));\n\n");
    }
}
