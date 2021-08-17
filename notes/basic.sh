#! /usr/bin/bash

composer require laravel/fortify
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
php artisan migrate
composer require livewire/livewire
composer require laravel/ui
php artisan ui bootstrap
npm install --save
npm install bootstrap@^5.0
npm install @popperjs/core
npm install bootstrap-icons
npm install laravel-mix@latest --save-dev
npm install resolve-url-loader@^4.0.0 --save-dev --legacy-peer-deps
npm run dev
npm run dev