@props(['description' => null, 'actions' => null])

<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 col-md-12']) }}>
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-1">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ $title }}
                </h3>
                @if ($description)
                    <p class="mt-1 text-sm text-gray-500">
                        {{ $description }}
                    </p>
                @endif
            </div>
            @if ($actions)
                <div class="ml-4 mt-4 flex-shrink-0">
                    {{ $actions }}
                </div>
            @endif
        </div>
    </div>
    <div class="flex-1 px-4 py-2 sm:p-6" style="height: 24rem;">
        {{ $slot }}
    </div>
</div>
