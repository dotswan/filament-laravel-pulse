# Filament laravel pulse

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]][link-license]

![filament-laravel-pulse-v3](https://github.com/dotswan/filament-laravel-pulse/assets/20874565/e0d40daa-a06c-4e46-813e-1ebc0f984b17)


## Introduction

Filament Laravel Pulse is a package designed to enhance your Filament dashboard with comprehensive monitoring widgets. It provides insights into various aspects of your Laravel application's performance, including cache usage, exceptions, queues, servers, and more. By integrating these widgets into your Filament dashboard, you gain visibility into critical metrics and streamline your monitoring process.


## Features

Filament Laravel Pulse offers the following features:

- Server Monitoring: Track server performance metrics.
- Cache Usage: Monitor cache utilization and performance.
- Exception Tracking: View and manage exceptions thrown by your application.
- Queue Management: Monitor job queues and processing times.
- Performance Analytics: Insights into slow outgoing requests, queries, and application usage patterns.

## Installation

To integrate the Filament Laravel Pulse package into your project, use Composer:

```bash
composer require dotswan/filament-laravel-pulse
```

Filament Laravel Pulse can be configured to suit your application's specific needs. 
After installing the package, publish the configuration file using Artisan:

```bash
php artisan vendor:publish --provider="Dotswan\FilamentLaravelPulse\FilamentLaravelPulseServiceProvider"
```

## Basic Usage

To start using Filament Laravel Pulse, follow these steps:

1. **Create a Custom Filament Page:** Extend the default Filament dashboard by creating a custom page. You can define your custom dashboard class and extend `app/Filament/Pages/Dashboard`.

2. **Define Widgets:** Inside your custom dashboard class, define which widgets to include. Use the provided Pulse widgets (PulseCache, PulseExceptions, etc.) to display relevant metrics.

```php

<?php

use Dotswan\FilamentLaravelPulse\Widgets\PulseCache;
use Dotswan\FilamentLaravelPulse\Widgets\PulseExceptions;
use Dotswan\FilamentLaravelPulse\Widgets\PulseQueues;
use Dotswan\FilamentLaravelPulse\Widgets\PulseServers;
use Dotswan\FilamentLaravelPulse\Widgets\PulseSlowOutGoingRequests;
use Dotswan\FilamentLaravelPulse\Widgets\PulseSlowQueries;
use Dotswan\FilamentLaravelPulse\Widgets\PulseSlowRequests;
use Dotswan\FilamentLaravelPulse\Widgets\PulseUsage;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Pages\Dashboard\Concerns\HasFiltersAction;
use Filament\Support\Enums\ActionSize;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersAction;

    public function getColumns(): int|string|array
    {
        return 12;
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('1h')
                    ->action(fn() => $this->redirect(route('filament.manager.pages.dashboard'))),
                Action::make('24h')
                    ->action(fn() => $this->redirect(route('filament.manager.pages.dashboard', ['period' => '24_hours']))),
                Action::make('7d')
                    ->action(fn() => $this->redirect(route('filament.manager.pages.dashboard', ['period' => '7_days']))),
            ])
                ->label(__('Filter'))
                ->icon('heroicon-m-funnel')
                ->size(ActionSize::Small)
                ->color('gray')
                ->button()
        ];
    }

    public function getWidgets(): array
    {
        return [
            PulseServers::class,
            PulseCache::class,
            PulseExceptions::class,
            PulseUsage::class,
            PulseQueues::class,
            PulseSlowQueries::class,
            PulseSlowRequests::class,
            PulseSlowOutGoingRequests::class
        ];
    }
}
```

Example Configuration

Here's an example of what you might find in the published filament-laravel-pulse.php configuration file:

```php
<?php

return [
    'components' => [
        // Customize and configure your monitoring widgets here
        'cache' => [
            'columnSpan' => [
                'md' => 5,
                'xl' => 5,
            ],
            'cols' => 'full',
            'ignoreAfter' => '1 hour',
            'isDiscovered' => true,
            'isLazy' => true,
            'sort' => null,
            'canView' => true,
            'columnStart' => [],
        ],
        // Define more components as needed
    ],
];

```
Modify the array under 'components' to adjust settings for each monitoring widget provided by Filament Laravel Pulse.

## License

This package is distributed under the [MIT License](link-to-your-license).

## Security

Security is a priority for us. If you encounter any security-related issues or vulnerabilities, please report them via our [GitHub issue tracker][link-github-issue]. For direct communication, reach out to [tech@dotswan.com](mailto:tech@dotswan.com).

## Contribution

Contributions are welcome and valued. Enhancements, suggestions, and bug reports help improve this package for everyone. Here's how you can contribute:

1. Fork the Project
2. Create a Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

Thank you for considering contributing to the Filament Laravel Pulse!

[ico-version]: https://img.shields.io/packagist/v/dotswan/filament-laravel-pulse.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/dotswan/filament-laravel-pulse.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/dotswan/filament-laravel-pulse
[link-license]: https://github.com/dotswan/filament-laravel-pulse/blob/master/LICENSE.md
[link-downloads]: https://packagist.org/packages/dotswan/filament-laravel-pulse
[link-github-issue]: https://github.com/dotswan/filament-laravel-pulse/issues
