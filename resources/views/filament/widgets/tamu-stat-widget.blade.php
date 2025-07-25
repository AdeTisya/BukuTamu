<x-filament::widget class="fi-wi-stats-overview">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        @foreach($stats as $stat)
            <div @class([
                'rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900',
                'ring-2 ring-'.$stat['color'].'-500 dark:ring-'.$stat['color'].'-400' => $loop->first,
            ])>
                <div class="flex items-center gap-x-4">
                    <div @class([
                        'flex h-12 w-12 items-center justify-center rounded-lg',
                        'bg-'.$stat['color'].'-50 text-'.$stat['color'].'-600 dark:bg-'.$stat['color'].'-900/50 dark:text-'.$stat['color'].'-400',
                    ])>
                        <x-filament::icon
                            :icon="$stat['icon']"
                            class="h-6 w-6"
                        />
                    </div>

                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            {{ $stat['label'] }}
                        </p>

                        <div class="flex items-baseline gap-x-2">
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                                {{ number_format($stat['value']) }}
                            </p>

                            @if($stat['trend'])
                                <span @class([
                                    'inline-flex items-center text-sm font-medium',
                                    'text-'.$stat['color'].'-600 dark:text-'.$stat['color'].'-400' => $stat['trend'] === 'up',
                                    'text-red-600 dark:text-red-400' => $stat['trend'] === 'down',
                                ])>
                                    @if($stat['trend'] === 'up')
                                        <x-filament::icon
                                            icon="heroicon-m-arrow-trending-up"
                                            class="h-4 w-4"
                                        />
                                    @else
                                        <x-filament::icon
                                            icon="heroicon-m-arrow-trending-down"
                                            class="h-4 w-4"
                                        />
                                    @endif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                @if($loop->first)
                    <div class="mt-4 border-t border-gray-200 pt-4 dark:border-gray-800">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Statistik terkini pengunjung
                        </p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-filament::widget>