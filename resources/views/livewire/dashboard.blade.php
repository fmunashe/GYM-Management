<div class="mt-6 gap-x-4 row">
    <x-chart-widget class="sm:col-span-12">
        <x-slot name="title">Members Count Per Club</x-slot>
        <livewire:livewire-column-chart key="{{ $usersPerClub->reactiveKey() }}" :column-chart-model="$usersPerClub"/>
    </x-chart-widget>

    <x-chart-widget class="sm:col-span-12">
        <x-slot name="title">Total Registrations Per Month</x-slot>
        <livewire:livewire-column-chart key="{{ $registrationsPerMonth->reactiveKey() }}"
                                        :column-chart-model="$registrationsPerMonth"/>
    </x-chart-widget>
@if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
    <x-chart-widget class="sm:col-span-12">
        <x-slot name="title">Active vs In-Active Subscriptions</x-slot>
        <livewire:livewire-pie-chart key="{{ $subscriptions->reactiveKey() }}" :pie-chart-model="$subscriptions"/>
    </x-chart-widget>

    <x-chart-widget class="sm:col-span-12">
        <x-slot name="title">Payments Per Club Comparison</x-slot>
        <livewire:livewire-column-chart key="{{ $payments->reactiveKey() }}" :column-chart-model="$payments"/>
    </x-chart-widget>

    <x-chart-widget class="sm:col-span-12">
        <x-slot name="title">subscription Plans Comparison</x-slot>
        <livewire:livewire-column-chart key="{{ $membership_plans->reactiveKey() }}" :column-chart-model="$membership_plans"/>
    </x-chart-widget>
    @endif
</div>

