<?php

namespace App\View\Components\Uxmal\Ui;

use App\View\Components\UxmalBase;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;

class Column extends UxmalBase
{
    public string $content = '';
    public array $class = ['col'];

    public static function make(string $name = ''): self
    {
        return new static($name ?? uniqid());
    }

    public function content($content): self
    {
        $this->content = $content;
        return $this;
    }

    public function align($align): self
    {
        $this->class[] = match ($align) {
            'left' => 'text-start',
            'right' => 'text-end',
            'center' => 'text-center',
            default => 'text-start',
        };

        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.uxmal.ui.column', [
            'content' => $this->content,
            'class' => Arr::toCssClasses($this->class),
        ]);
    }
}
