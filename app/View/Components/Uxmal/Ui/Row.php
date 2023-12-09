<?php

namespace App\View\Components\Uxmal\Ui;

use App\View\Components\UxmalBase;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;

class Row extends UxmalBase
{
    public string $content = '';
    public array $class = ['row'];

    public static function make(string $name = ''): self
    {
        return new static($name ?? uniqid());
    }

    public function content($columns): self
    {
        // Recorrer todas las $columns y:
        // 1. Si no es tipo Column, crear una
        // 2. Si sí es una Column, obtener tu contenido
        // 3. Concatenar el contenido en $this->content

        foreach ($columns as $column) {
            if (!$column instanceof Column) {
                $column = Column::make()->content($column);
            }

            $this->content .= $column->render();
        }

        return $this;
    }

    public function align($align): self
    {
        $this->class[] = match ($align) {
            'left' => 'text-left',
            'center' => 'text-center',
            'right' => 'text-right',
            default => 'text-left',
        };

        return $this;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.uxmal.ui.row', [
            'content' => $this->content,
            'class' => Arr::toCssClasses($this->class),
        ]);
    }
}
