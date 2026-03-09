# Sistema de Planeación Estratégica

Proyecto base ejecutable sobre **Laravel 12 + Livewire + Starter Kit oficial Livewire + Flux UI + Vite + MySQL**.

## Requisitos

- PHP 8.2+
- Composer 2+
- Node.js 20+
- NPM 10+
- MySQL 8+

## Instalación local (MySQL)

1. Clonar el repositorio e instalar dependencias de PHP:

```bash
composer install
```

2. Instalar dependencias frontend:

```bash
npm install
```

3. Crear archivo de entorno y llave de aplicación:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configurar MySQL en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=planeacion_estrategica
DB_USERNAME=root
DB_PASSWORD=tu_password
```

5. Ejecutar migraciones y seeders:

```bash
php artisan migrate --seed
```

6. Instalar starter kit oficial de Livewire (autenticación) si necesitas regenerar assets del kit:

```bash
php artisan breeze:install livewire
```

> El proyecto ya está preparado para Livewire/Flux, pero este comando te permite reinstalar las pantallas base de auth del starter kit oficial en entornos nuevos.

7. (Opcional) Reinstalar assets de Flux UI:

```bash
php artisan flux:install
```

8. Iniciar entorno local:

```bash
php artisan serve
npm run dev
```

## Comandos de verificación

```bash
php artisan optimize:clear
php artisan route:list
```

## Estructura funcional incluida

- Esqueleto Laravel completo (`artisan`, `bootstrap/`, `config/`, `database/`, `public/`, `storage/`, `tests/`).
- Navegación principal reutilizable en `App\Support\Navigation\MainNavigation`.
- Módulos estratégicos como páginas Livewire en `app/Livewire/Pages`.
- Layout administrativo y estructura visual en `resources/views/layouts/app-shell.blade.php`.
- Plantilla visual de módulos en `resources/views/livewire/pages/module-page.blade.php`.

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
