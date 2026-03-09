<?php

namespace App\Livewire\Pages;

class PlanEstrategicoPage extends BasePage
{
    public string $title = 'Plan Estratégico';

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
