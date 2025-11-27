<?php
namespace Api\Web\Core\Traits;

trait GlobalAttributesTrait {
    public function id(string $id) : self {
        $this->setAttr('id', $id);
        return $this;
    }

    public function class(string $name): self
    {
        $existing = $this->attrs['class'] ?? '';
        $this->setAttr('class', trim("$existing $name"));
        return $this;
    }

    public function IDThenName(string $IDThenName) : self {
        $this->setAttrs(['id' => $IDThenName, 'name' => $IDThenName]);
        return $this;
    }

    public function style(string $style) : self {
        $this->setAttr('style', $style);
        return $this;
    }

    public function title(string $title) : self {
        $this->setAttr('title', $title);
        return $this;
    }

    public function lang(string $lang): self
    {
        return $this->setAttr('lang', $lang);
    }

    public function hidden(bool $bool = true): self
    {
        if ($bool) $this->setAttr('hidden', 'hidden');
        else unset($this->attrs['hidden']);
        return $this;
    }

    public function tabindex(int $index): self
    {
        return $this->setAttr('tabindex', (string)$index);
    }

    public function accesskey(string $key): self
    {
        return $this->setAttr('accesskey', $key);
    }

    public function data(string $key, string $value): self
    {
        return $this->setAttr("data-$key", $value);
    }

    public function draggable(string $value = 'true'): self
    {
        return $this->setAttr('draggable', $value);
    }

    public function spellcheck(bool $bool = true): self
    {
        return $this->setAttr('spellcheck', $bool ? 'true' : 'false');
    }
}
?>