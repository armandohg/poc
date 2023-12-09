<?php

namespace App\View\Components\Uxmal\Ui;

use App\View\Components\UxmalBase;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;

class Card extends UxmalBase
{
    public string $header = '';
    public string $title = '';
    public string $body = '';
    public string $footer = '';
    public array $class = ['card'];

    public static function make(string $name = ''): self
    {
        return new static($name ?? uniqid());
    }

    public function background($color): self
    {
        $this->class[] = match ($color) {
            'primary' => 'bg-primary',
            'secondary' => 'bg-secondary',
            'success' => 'bg-success',
            'danger' => 'bg-danger',
            'warning' => 'bg-warning',
            'info' => 'bg-info',
            'light' => 'bg-light',
            'dark' => 'bg-dark',
            'white' => 'bg-white',
            default => 'bg-primary',
        };

        return $this;
    }

    public function border($color): self
    {
        $this->class[] = match ($color) {
            'primary' => 'border-primary',
            'secondary' => 'border-secondary',
            'success' => 'border-success',
            'danger' => 'border-danger',
            'warning' => 'border-warning',
            'info' => 'border-info',
            'light' => 'border-light',
            'dark' => 'border-dark',
            'link' => 'border-link',
            default => 'border-primary',
        };

        return $this;
    }

    public function header($header): self
    {
        $this->header = $header;
        return $this;
    }

    public function title($title): self
    {
        $this->title = $title;
        return $this;
    }

    public function body($body): self
    {
        $this->body = $body;
        return $this;
    }

    public function footer($footer): self
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.uxmal.ui.card', [
            'name' => $this->name,
            'header' => $this->header,
            'title' => $this->title,
            'body' => $this->body,
            'footer' => $this->footer,
            'class' => Arr::toCssClasses($this->class),
        ]);
    }
}
