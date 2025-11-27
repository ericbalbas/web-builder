<?php 
namespace Api\Web\Core\Traits;

trait MediaAttributesTrait
{
    public function src(string $url): self
    {
        return $this->setAttr('src', $url);
    }

    public function href(string $url): self
    {
        return $this->setAttr('href', $url);
    }

    public function alt(string $text): self
    {
        return $this->setAttr('alt', $text);
    }

    public function target(string $value): self
    {
        return $this->setAttr('target', $value);
    }

    public function rel(string $value): self
    {
        return $this->setAttr('rel', $value);
    }

    public function typeAttr(string $value): self
    { // for <link> or <script>
        return $this->setAttr('type', $value);
    }

    public function crossorigin(string $value): self
    {
        return $this->setAttr('crossorigin', $value);
    }

    public function referrerpolicy(string $value): self
    {
        return $this->setAttr('referrerpolicy', $value);
    }
}