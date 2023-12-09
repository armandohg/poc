<?php

namespace App\View\Components\Uxmal\Ui;

use App\View\Components\UxmalBase;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;

class Screen extends UxmalBase
{
    public string $mainContent;
    public array $class = [];

    public static function make(string $name = ''): self
    {
        return new static($name);
    }

    public function mainContent($mainContent): self
    {
        $this->mainContent = $mainContent;

        return $this;
    }

    public function background(string $background): self
    {
        $this->class[] = match ($background) {
            'primary' => 'bg-primary',
            'secondary' => 'bg-secondary',
            'success' => 'bg-success',
            'danger' => 'bg-danger',
            'warning' => 'bg-warning',
            'info' => 'bg-info',
            'light' => 'bg-light',
            'dark' => 'bg-dark',
            default => '',
        };

        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $view = view('components.uxmal.ui.screen', [
            'mainContent' => $this->mainContent,
            'class' => Arr::toCssClasses($this->class),
        ]);

        return view('app', [
            'content' => $view,
        ]);
    }
}
