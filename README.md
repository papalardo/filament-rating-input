# Filament Rating Input

Plugin built for Filament package with Laravel framework.

## Installation

Install via composer:

```bash
composer require papalardo/filament-rating-input
```

## Result
![Docs result](docs/result.png)

## Usage

```php
use Papalardo\FilamentRatingInput\RatingInput;

RatingInput::make('love')
    ->default(5)
    ->disableLabel()
    ->align('center') // start,center,end [default = start]
    ->maxValue(10) // max items for display [default = 5]
    ->color('red-800') // tailwind variant color [default = yellow-400]
    ->icon('heart'), // icon name [heroicon] [default = start]
```
