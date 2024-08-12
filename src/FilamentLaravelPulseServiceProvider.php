<?php

declare(strict_types=1);

namespace Dotswan\FilamentLaravelPulse;

use Dotswan\FilamentLaravelPulse\Widgets\PulseCache;
use Dotswan\FilamentLaravelPulse\Widgets\PulseExceptions;
use Dotswan\FilamentLaravelPulse\Widgets\PulseQueues;
use Dotswan\FilamentLaravelPulse\Widgets\PulseServers;
use Dotswan\FilamentLaravelPulse\Widgets\PulseSlowOutGoingRequests;
use Dotswan\FilamentLaravelPulse\Widgets\PulseSlowQueries;
use Dotswan\FilamentLaravelPulse\Widgets\PulseSlowRequests;
use Dotswan\FilamentLaravelPulse\Widgets\PulseUsage;
use Dotswan\FilamentLaravelPulse\Widgets\PulseSlowJobs;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentLaravelPulseServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-laravel-pulse';

    public static string $viewNamespace = 'filament-laravel-pulse';

    public function configurePackage(Package $package): void
    {

        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasConfigFile('filament-laravel-pulse')
            ->hasInstallCommand(function (InstallCommand $command): void {
                $command
                    ->publishConfigFile()
                    ->askToStarRepoOnGitHub('dotswan/filament-laravel-pulse');
            });

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        $this->registerLivewireComponents();
    }

    protected function getAssetPackageName(): ?string
    {
        return 'dotswan/filament-laravel-pulse';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            Css::make('filament-laravel-pulse', __DIR__.'/../resources/dist/css/filament-grapesjs.css'),
            Js::make('filament-laravel-pulse', __DIR__.'/../resources/dist/js/filament-laravel-pulse.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
        ];
    }

    protected function registerLivewireComponents(): void
    {
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-cache', PulseCache::class);
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-exceptions', PulseExceptions::class);
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-queues', PulseQueues::class);
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-servers', PulseServers::class);
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-slow-outgoing-requests', PulseSlowOutGoingRequests::class);
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-slow-queries', PulseSlowQueries::class);
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-slow-requests', PulseSlowRequests::class);
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-usage', PulseUsage::class);
        Livewire::component('dotswan.filament-laravel-pulse.widgets.pulse-slow-jobs', PulseSlowJobs::class);
    }
}
