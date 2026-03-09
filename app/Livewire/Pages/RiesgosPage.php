<?php

namespace App\Livewire\Pages;

class RiesgosPage extends BasePage
{
    public string $title = 'Riesgos';

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
