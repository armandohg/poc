<?php

namespace App\View\Components\Uxmal\Ui;

use App\View\Components\UxmalBase;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;

class Button extends UxmalBase
{
    public string $label = 'Aceptar';
    public array $class = ['btn'];

    public static function make(string $name = ''): self
    {
        return new static($name ?? uniqid());
    }

    public function label($label): self
    {
        $this->label = $label;
        return $this;
    }

    public function icon($icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    public function color($color): self
    {
        $this->class[] = match ($color) {
            'primary' => 'btn-primary',
            'secondary' => 'btn-secondary',
            'success' => 'btn-success',
            'danger' => 'btn-danger',
            'warning' => 'btn-warning',
            'info' => 'btn-info',
            'light' => 'btn-light',
            'dark' => 'btn-dark',
            'link' => 'btn-link',
            default => 'btn-primary',
        };

        return $this;
    }

    public function type($type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.uxmal.ui.button', [
            'name' => $this->name,
            'label' => $this->label,
            'icon' => $this->icon,
            'type' => $this->type,
            'class' => Arr::toCssClasses($this->class),
        ]);
    }
}
