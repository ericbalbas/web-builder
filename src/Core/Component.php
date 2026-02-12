<?php

namespace Exo\Web\Core;

use Exo\Web\Core\Traits\GlobalAttributesTrait;
use Exo\Web\Core\Traits\FormAttributesTrait;
use Exo\Web\Core\Traits\MediaAttributesTrait;

/**
 * Class Component
 * 
 * Base abstract class for all HTML components.
 * 
 * Handles:
 * - Attributes
 * - Context/Text
 * - Child Components
 * - Rendering logic
 */
abstract class Component
{

    /**
     * HTML tag name (e.g., div, form, input)
     * @var string
     */
    protected $tag = '';

    /**
     * HTML attributes list
     * @var array
     */
    protected $attrs = [];

    /**
     * Child elements/components
     * @var array
     */
    protected $children = [];

    /**
     * Inner text or HTML content
     * @var string
     */
    protected $context = '';

    /**
     * Flag to check if tag is self-closing (e.g., input, img)
     * @var bool
     */
    protected $isSelfClosingTag = false;

    /**
     * Add a single HTML attribute
     * 
     * @param string $key
     * @param string $value
     * @return self
     */
    public function setAttr(string $key, string $value): self
    {
        $this->attrs[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        return $this;
    }

    /**
     * Add multiple attributes at once
     * 
     * @param array $attrs
     * @return self
     */
    public function setAttrs(array $attrs): self
    {
        foreach ($attrs as $key => $attr) {
            $this->setAttr($key, $attr);
        }
        return $this;
    }

    /**
     * Set text or inner HTML content
     * 
     * @param string $ct
     * @return self
     */
    public function setContext(string $ct): self
    {
        $this->context = $ct;
        return $this;
    }

    /**
     * Add child component or raw HTML/text
     * 
     * @param Component|string $c
     * @return self
     */
    public function addChild($c): self
    {
        // Optional runtime type check
        if (!($c instanceof Component) && !is_string($c)) {
            throw new \InvalidArgumentException('Child must be a Component or string');
        }

        $this->children[] = $c;
        return $this;
    }


    // Traits; 
    use GlobalAttributesTrait,
        FormAttributesTrait,
        MediaAttributesTrait
    ;

    /**
     * Render all HTML attributes as string
     * 
     * @return string
     */
    public function renderAttributes(): string
    {
        $html = '';

        foreach ($this->attrs as $key => $value) {
            $html .= " {$key}=\"{$value}\"";
        }

        return $html;
    }

    /**
     * Generate multiple children from an array
     * @param array $items
     * @param callable $c Receives each item, should return a Component
     * @return self
     */
    public function mapChild(array $children, callable $callback = null): self
    {
        foreach ($children as $child) {
            if ($callback) {
                $child = $callback($child);
            }
            $this->addChild($child);
        }
        return $this;
    }


    /**
     * Render all child components recursively
     * 
     * @return string
     */
    public function renderChildren(): string
    {
        $html = '';

        foreach ($this->children as $c) {
            $html .= ($c instanceof Component) ? $c->render() : $c;
        }

        return $html;
    }

    /**
     * Render final HTML output
     * 
     * @return string
     */
    public function render(): string
    {
        $attrs = $this->renderAttributes();

        // Self-closing tag rendering
        if ($this->isSelfClosingTag) {
            return "<{$this->tag}{$attrs} />";
        }

        // Normal tag rendering
        return "<{$this->tag}{$attrs}>"
            . $this->context
            . $this->renderChildren()
            . "</{$this->tag}>";
    }
}
