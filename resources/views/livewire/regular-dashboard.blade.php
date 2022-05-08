

<div class="mt-6 gap-x-4 row">
{{--    <x-regular-chart-widget class="md:col-span-2">--}}
{{--        <x-slot name="title">My Payments</x-slot>--}}
{{--        <livewire:livewire-column-chart key="{{ $payments->reactiveKey() }}" :column-chart-model="$payments"/>--}}
{{--    </x-regular-chart-widget>--}}

    <x-regular-chart-widget class="md:col-span-2">
        <x-slot name="title">Weight Loss/Gain Progress</x-slot>
        <livewire:livewire-column-chart key="{{ $weight_progress->reactiveKey() }}"
                                        :column-chart-model="$weight_progress"/>
    </x-regular-chart-widget>
</div>

