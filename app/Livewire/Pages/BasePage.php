<?php

namespace App\Livewire\Pages;

use App\Support\Navigation\MainNavigation;
use Livewire\Component;

abstract class BasePage extends Component
{
    public string $title = '';

    /**
     * @return array<int, array<string, string>>
     */
    public function navigationItems(): array
    {
        return MainNavigation::items();
    }

    /**
     * @return array<int, array{label:string,url:?string}>
     */
    public function breadcrumbs(): array
    {
        return [
            ['label' => 'Inicio', 'url' => route('dashboard')],
            ['label' => $this->title, 'url' => null],
        ];
    }
}
