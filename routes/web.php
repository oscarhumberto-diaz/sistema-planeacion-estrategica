<?php

use App\Livewire\Pages\AdministracionPage;
use App\Livewire\Pages\DashboardPage;
use App\Livewire\Pages\IndicadoresPage;
use App\Livewire\Pages\IniciativasPage;
use App\Livewire\Pages\MedicionesPage;
use App\Livewire\Pages\MetasPage;
use App\Livewire\Pages\ObjetivosEstrategicosPage;
use App\Livewire\Pages\PerspectivasPage;
use App\Livewire\Pages\PlanEstrategicoPage;
use App\Livewire\Pages\ReportesPage;
use App\Livewire\Pages\RiesgosPage;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth'])->group(function (): void {
    Route::get('/dashboard', DashboardPage::class)->name('dashboard');
    Route::get('/plan-estrategico', PlanEstrategicoPage::class)->name('plan-estrategico');
    Route::get('/perspectivas', PerspectivasPage::class)->name('perspectivas');
    Route::get('/objetivos-estrategicos', ObjetivosEstrategicosPage::class)->name('objetivos-estrategicos');
    Route::get('/indicadores', IndicadoresPage::class)->name('indicadores');
    Route::get('/metas', MetasPage::class)->name('metas');
    Route::get('/mediciones', MedicionesPage::class)->name('mediciones');
    Route::get('/iniciativas', IniciativasPage::class)->name('iniciativas');
    Route::get('/riesgos', RiesgosPage::class)->name('riesgos');
    Route::get('/reportes', ReportesPage::class)->name('reportes');
    Route::get('/administracion', AdministracionPage::class)->name('administracion');
});

require __DIR__.'/auth.php';
