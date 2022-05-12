<?php

namespace Papalardo\FilamentRatingInput;

use Closure;
use Filament\Forms\Components\Contracts\CanHaveNumericState;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Concerns;

class RatingInput extends Field implements CanHaveNumericState
{
    use Concerns\HasExtraAlpineAttributes;
    use Concerns\HasExtraInputAttributes;

    protected string $view = 'filament-rating-input::rating-input';

    protected string $icon = 'star';

    protected string $iconColor = 'yellow-400';

    protected int $maxValue = 5;

    /**
     * @var string $align 'start' | 'center' | 'end'
     */
    protected string $align = 'start';

    public function icon(string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function align(string $align): static
    {
        throw_if(! in_array($align, ['start', 'center', 'end']), 'Invalid alignment');

        $this->align = $align;

        return $this;
    }

    public function maxValue(int $value): static
    {
        throw_if($value <= 0, 'Max value must be greater than zero');

        $this->maxValue = $value;

        return $this;
    }

    public function color(string $color): static
    {
        $this->iconColor = $color;

        return $this;
    }

    public function getRange(): array
    {
        return range(1, $this->maxValue);
    }

    public function getAlign(): string
    {
        return $this->align;
    }

    public function isReactive(): bool
    {
        return empty($this->getStateBindingModifiers());
    }

    public function getIconColor(): string
    {
        return $this->iconColor;
    }

    public function getActiveIconComponent(): string
    {
        return sprintf('heroicon-s-%s', $this->icon);
    }

    public function getInactiveIconComponent(): string
    {
        return sprintf('heroicon-o-%s', $this->icon);
    }

    public function isNumeric(): bool
    {
        return true;
    }
}
