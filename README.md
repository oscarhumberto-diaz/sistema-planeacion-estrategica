# Sistema de Planeación Estratégica (Balanced Scorecard)

Base inicial para un sistema web universitario de planeación estratégica sobre **Laravel 12 + Livewire + Blade + Flux UI + Tailwind + MySQL**.

## Estado actual

Se dejó preparada la estructura visual y modular del sistema, incluyendo:

- Layout administrativo con sidebar colapsable, topbar, breadcrumbs y dark mode.
- Navegación base para módulos estratégicos.
- Componentes Livewire de página listos para crecer.
- Configuración de rutas por módulo.

> ⚠️ Este entorno no permitió descargar dependencias externas (Packagist/GitHub). Por eso, el starter kit oficial de autenticación se dejó preparado para instalarse con comandos locales cuando tengas conectividad.

## Requisitos

- PHP 8.2+
- Composer 2+
- Node 20+
- MySQL 8+

## Configuración local

1. Instala dependencias:

```bash
composer install
npm install
```

2. Crea y configura entorno:

```bash
cp .env.example .env
php artisan key:generate
```

3. Configura MySQL en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=planeacion_estrategica
DB_USERNAME=root
DB_PASSWORD=secret
```

4. Ejecuta migraciones:

```bash
php artisan migrate
```

5. Instala starter kit oficial Livewire (autenticación):

```bash
php artisan install:livewire
```

6. Instala Flux UI:

```bash
composer require livewire/flux
php artisan flux:install
```

7. Levanta el entorno:

```bash
php artisan serve
npm run dev
```

## Estructura base

- `app/Livewire/Pages`: páginas Livewire por módulo.
- `app/Support/Navigation`: definición central de navegación.
- `resources/views/layouts/app-shell.blade.php`: layout principal administrativo.
- `resources/views/livewire/pages/module-page.blade.php`: plantilla base de módulos.
- `routes/web.php`: rutas principales del sistema.

## Módulos iniciales

- Dashboard
- Plan Estratégico
- Perspectivas / Ejes
- Objetivos Estratégicos
- Indicadores
- Metas
- Mediciones
- Iniciativas
- Riesgos
- Reportes
- Administración
