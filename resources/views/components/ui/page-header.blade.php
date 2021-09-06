@props([
    'subtitle' => false,
    'actions' => false,
    'breadcrumbs' => collect(),
    'tabs' => collect(),
])

<div class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
        <div class="space-y-2">
            {{-- Breadcrumb --}}
            @if($breadcrumbs->isNotEmpty())
                <div>
                    {{-- Mobile --}}
                    <nav class="sm:hidden">
                        <a href="#" class="flex items-center text-sm leading-5 font-medium text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">
                            <svg class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $breadcrumbs->first()['title'] }}
                        </a>
                    </nav>
                    {{-- Desktop --}}
                    <nav class="hidden sm:flex items-center text-sm leading-5 font-medium">
                        @foreach($breadcrumbs as $breadcrumb)
                            <a href="{{ $breadcrumb['url'] }}"
                               class="underline text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">
                                {{ $breadcrumb['title'] }}
                            </a>
                            @if(!$loop->last)
                                <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            @endif
                        @endforeach
                    </nav>
                </div>
            @endif

            {{-- Content --}}
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0 space-y-2">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                        {{ $slot }}
                    </h2>
                    @if($subtitle)
                        <p class="text-xs text-gray-500">
                            {{ $subtitle }}
                        </p>
                    @endif
                </div>
                @if($actions)
                    <div class="mt-4 flex-shrink-0 flex md:mt-0 md:ml-4">
                        {{ $actions }}
                    </div>
                @endif
            </div>

            {{-- Tabs --}}
            @if($tabs->isNotEmpty())
                <div>
                    {{-- Mobile --}}
                    <div class="sm:hidden mb-4">
                        <select aria-label="Selected tab"
                                onchange="window.location = this.value"
                                class="form-select block w-full">
                            @foreach($tabs as $tab)
                                <option value="{{ $tab['url'] }}">
                                    {{ $tab['title'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Desktop --}}
                    @php
                        $tabClasses = 'group inline-flex items-center py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300';
                        $svgClasses = '-ml-0.5 mr-2 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-600';

                        $activeTabClasses = 'group inline-flex items-center py-4 px-1 border-b-2 border-teal-500 font-medium text-sm leading-5 text-teal-600 focus:outline-none focus:text-teal-800 focus:border-teal-700';
                        $activeSvgClasses = '-ml-0.5 mr-2 h-5 w-5 text-teal-500 group-focus:text-teal-600';
                    @endphp
                    <div class="hidden sm:block">
                        <nav class="flex -mb-px space-x-8">
                            @foreach($tabs as $tab)
                                <a href="{{ $tab['url'] }}"
                                   class="{{ $tab['is_active'] ? $activeTabClasses : $tabClasses }}">
                                    <svg class="{{ $tab['is_active'] ? $activeSvgClasses : $svgClasses }}"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="{{ $tab['svg_path'] }}"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <span>
                                    {{ $tab['title'] }}
                                </span>
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            @else
                {{-- Add extra separation from bottom border --}}
                <div class="h-2"></div>
            @endif
        </div>
    </div>
</div>
