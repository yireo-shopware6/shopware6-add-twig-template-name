<?php declare(strict_types=1);

namespace Yireo\AddTwigTemplateName\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Yireo\AddTwigTemplateName\Twig\Extension\AddTemplateName\NodeReference;
use Yireo\AddTwigTemplateName\Twig\Extension\AddTemplateName\NodeVisitor;

class AddTemplateName extends AbstractExtension
{
    /**
     * {@inheritDoc}
     */
    public function getNodeVisitors()
    {
        return [new NodeVisitor()];
    }

    /**
     * @param NodeReference $ref
     */
    public function start(NodeReference $ref): void
    {
        if (!$this->isEnabled($ref)) {
            return;
        }
        ob_start();
    }

    /**
     * @param NodeReference $ref
     */
    public function end(NodeReference $ref): void
    {
        if (!$this->isEnabled($ref)) {
            return;
        }

        $content = ob_get_clean();
        $content = '<!-- ' . $ref->getTemplate() . ' -->' . $content;
        echo $content;
    }

    /**
     * @param NodeReference $ref
     * @return bool
     */
    protected function isEnabled(NodeReference $ref): bool
    {
        return '.html.twig' === substr($ref->getTemplate(), -10);
    }
}
