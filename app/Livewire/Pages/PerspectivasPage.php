<?php

namespace App\Livewire\Pages;

class PerspectivasPage extends BasePage
{
    public string $title = 'Perspectivas / Ejes';

    public function render()
    {
        return view('livewire.pages.module-page')
            ->layout('layouts.app-shell', [
                'title' => $this->title,
                'breadcrumbs' => $this->breadcrumbs(),
                'navigationItems' => $this->navigationItems(),
            ]);
    }
}
