<?php declare(strict_types=1);

namespace Yireo\AddTwigTemplateName\Twig\Extension\AddTemplateName;

class NodeReference
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $template;

    /**
     * @var int
     */
    private int $line;

    /**
     * @var string
     */
    private string $id;

    /**
     * @param string $name
     * @param string $template
     * @param int    $line
     */
    public function __construct(string $name, string $template, int $line)
    {
        $this->id = uniqid('', false);
        $this->name = $name;
        $this->template = $template;
        $this->line = $line;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @return int
     */
    public function getLine(): int
    {
        return $this->line;
    }
}
