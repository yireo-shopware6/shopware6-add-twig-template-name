<?php declare(strict_types=1);

namespace Yireo\AddTwigTemplateName\Twig\Extension\AddTemplateName;

use Twig\Environment;
use Twig\Node\BlockNode;
use Twig\Node\BodyNode;
use Twig\Node\ModuleNode;
use Twig\Node\Node;
use Twig\NodeVisitor\AbstractNodeVisitor;
use Yireo\AddTwigTemplateName\Twig\Extension\AddTemplateName;

class NodeVisitor extends AbstractNodeVisitor
{
    protected function doEnterNode(Node $node, Environment $env)
    {
        return $node;
    }

    protected function doLeaveNode(Node $node, Environment $env)
    {
        $varName = 'foobar';
        if ($node instanceof ModuleNode) {
            $node->setNode(
                'display_start',
                new Node(
                    [
                        new NodeStart(
                            AddTemplateName::class,
                            $node->getTemplateName(),
                            $node->getTemplateLine(),
                            $varName
                        ),
                        $node->getNode('display_start'),
                    ]
                )
            );

            return $node;
        }

        if ($node instanceof BlockNode) {
            $node->setNode(
                'body',
                new BodyNode(
                    [
                        new NodeStart(
                            AddTemplateName::class,
                            $node->getAttribute('name'),
                            $node->getTemplateLine(),
                            $varName
                        ),
                        $node->getNode('body'),
                        new NodeEnd($varName),
                    ]
                )
            );

            return $node;
        }

        return $node;
    }

    public function getPriority()
    {
        return 0;
    }
}
