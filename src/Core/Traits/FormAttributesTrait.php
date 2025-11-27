<?php

namespace Api\Web\Core\Traits;

trait FormAttributesTrait
{

    public function action(string $ac) : self {
        return $this->setAttr('action', $ac);
    }

    public function method(string $mt) : self {
        return $this->setAttr('method', $mt);
    }

    public function type(string $type): self
    {
        return $this->setAttr('type', $type);
    }

    public function name(string $name): self
    {
        return $this->setAttr('name', $name);
    }

    public function value(string $value): self
    {
        return $this->setAttr('value', $value);
    }

    public function placeholder(string $text): self
    {
        return $this->setAttr('placeholder', $text);
    }

    public function checked(bool $bool = true): self
    {
        if ($bool) $this->setAttr('checked', 'checked');
        else unset($this->attrs['checked']);
        return $this;
    }

    public function disabled(bool $bool = true): self
    {
        if ($bool) $this->setAttr('disabled', 'disabled');
        else unset($this->attrs['disabled']);
        return $this;
    }

    public function readonly(bool $bool = true): self
    {
        if ($bool) $this->setAttr('readonly', 'readonly');
        else unset($this->attrs['readonly']);
        return $this;
    }

    public function required(bool $bool = true): self
    {
        if ($bool) $this->setAttr('required', 'required');
        else unset($this->attrs['required']);
        return $this;
    }

    public function min($value): self
    {
        return $this->setAttr('min', (string)$value);
    }

    public function max($value): self
    {
        return $this->setAttr('max', (string)$value);
    }

    public function step($value): self
    {
        return $this->setAttr('step', (string)$value);
    }

    public function pattern(string $regex): self
    {
        return $this->setAttr('pattern', $regex);
    }

    public function autocomplete(string $value): self
    {
        return $this->setAttr('autocomplete', $value);
    }
}
