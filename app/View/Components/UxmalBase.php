<?php

namespace App\View\Components;

use Exception;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class UxmalBase extends Component
{

    public function __construct(public string $name)
    {
        //
    }

    public static function make(string $name = ''): self
    {
        return new static($name ?? uniqid());
    }

    public function __toString()
    {
        $html = $this->resolveView()->toHtml();

        $entities = [
            '&amp;',
            '&lt;',
            '&gt;',
        ];

        // Decodificar HTML
        while (Str::contains($html, $entities)) {
            $html = html_entity_decode($html);
        }

        return $html;
    }

    /**
     * @throws Exception
     */
    public function render()
    {
        throw new Exception('Render method not implemented');
    }
}