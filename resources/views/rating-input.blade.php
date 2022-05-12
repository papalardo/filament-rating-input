<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div
        x-data="{
            state: $wire.entangle('{{ $getStatePath() }}'),
            localState: $wire.entangle('{{ $getStatePath() }}').defer,
        }"
        class="flex justify-{{ $getAlign() }}"
    >
        @foreach($getRange() as $i)
            <label for="{{ $getId() }}.{{ $i }}" class="cursor-pointer">
                <input
                    dusk="filament.forms.{{ $getStatePath() }}"
                    type="radio"
                    name="{{ $getStatePath() }}"
                    id="{{ $getId() }}.{{ $i }}"
                    @input="localState = {{ $i }}"
                    {{ $getExtraInputAttributeBag()->class('hidden')  }}
                />
                <x-dynamic-component :component="$getActiveIconComponent()" class="h-6 w-6 text-{{ $getIconColor() }}"
                    x-show="localState >= {{ $i }}"
                ></x-dynamic-component>
                <x-dynamic-component :component="$getInactiveIconComponent()" class="h-6 w-6"
                    x-show="localState < {{ $i }}"
                ></x-dynamic-component>
            </label>
        @endforeach
    </div>
</x-forms::field-wrapper>
