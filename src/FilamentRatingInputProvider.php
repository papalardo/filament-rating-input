<?php

namespace Papalardo\FilamentRatingInput;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentRatingInputProvider extends PluginServiceProvider
{
    public static string $name = 'filament-rating-input';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)->hasViews();
    }

}
