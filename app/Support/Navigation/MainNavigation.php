<?php

namespace App\Support\Navigation;

class MainNavigation
{
    /**
     * @return array<int, array<string, string>>
     */
    public static function items(): array
    {
        return [
            ['label' => 'Dashboard', 'route' => 'dashboard'],
            ['label' => 'Plan Estratégico', 'route' => 'plan-estrategico'],
            ['label' => 'Perspectivas / Ejes', 'route' => 'perspectivas'],
            ['label' => 'Objetivos Estratégicos', 'route' => 'objetivos-estrategicos'],
            ['label' => 'Indicadores', 'route' => 'indicadores'],
            ['label' => 'Metas', 'route' => 'metas'],
            ['label' => 'Mediciones', 'route' => 'mediciones'],
            ['label' => 'Iniciativas', 'route' => 'iniciativas'],
            ['label' => 'Riesgos', 'route' => 'riesgos'],
            ['label' => 'Reportes', 'route' => 'reportes'],
            ['label' => 'Administración', 'route' => 'administracion'],
        ];
    }
}
