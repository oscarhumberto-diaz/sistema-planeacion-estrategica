<?php

namespace App\Livewire\Pages;

class ReportesPage extends BasePage
{
    public string $title = 'Reportes';

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
