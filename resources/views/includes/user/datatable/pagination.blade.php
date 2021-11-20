<div>
  @if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
      {{-- small screen --}}
      <div class="flex justify-between flex-1 sm:hidden">
        <span>
          @if ($paginator->onFirstPage())
            <span
              class="relative h-full inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-700 cursor-default leading-6 rounded-md">
              {!! __('pagination.previous') !!}
            </span>
          @else
            <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage.before"
              class="relative h-full inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-700 leading-6 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
              {!! __('pagination.previous') !!}
            </button>
          @endif
        </span>

        <span>
          @if ($paginator->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before"
              class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-700 leading-6 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
              {!! __('pagination.next') !!}
            </button>
          @else
            <span
              class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-700 cursor-default leading-6 rounded-md">
              {!! __('pagination.next') !!}
            </span>
          @endif
        </span>
      </div>

      {{-- desktop --}}
      <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between flex-col-reverse">
        {{-- <div>
                    <p class="text-sm text-gray-500 leading-6 mt-2">
                        <span>{!! __('Результаты c') !!}</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('по') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('из') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>{!! __('results') !!}</span>
                    </p>
                </div> --}}

        <div>
          <span class="relative z-0 inline-flex items-stretch shadow-sm">
            <span>
              {{-- Previous Page Link --}}
              @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                  <span
                    class="relative h-full inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 border border-gray-700 cursor-default rounded-l-md leading-6 opacity-50"
                    aria-hidden="true">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                    </svg>
                  </span>
                </span>
              @else
                {{-- <button wire:click="previousPage" dusk="previousPage.after" rel="prev" class="relative h-full inline-flex items-center px-2 py-2 text-sm font-medium bg-gray-800 text-gray-400 border border-gray-700 rounded-l-md leading-6 hover:text-gray-300 hover:border-gray-500 focus:z-10 focus:outline-none focus:border-gray-200 focus:text-gray-200" aria-label="{{ __('pagination.previous') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button> --}}
                <a href="{{ url()->current() . '?page=' . max($this->page - 1, 1) }}" rel="prev"
                  class="relative h-full inline-flex items-center px-2 py-2 text-sm font-medium bg-gray-800 text-gray-400 border border-gray-700 rounded-l-md leading-6 hover:text-gray-300 hover:border-gray-500 focus:z-10 focus:outline-none focus:border-gray-200 focus:text-gray-200"
                  aria-label="{{ __('pagination.previous') }}">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                      clip-rule="evenodd" />
                  </svg>
                </a>
              @endif
            </span>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                <span aria-disabled="true">
                  <span
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-700 cursor-default leading-6">{{ $element }}</span>
                </span>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                @foreach ($element as $page => $url)
                  <span wire:key="paginator-page{{ $page }}">
                    @if ($page == $paginator->currentPage())
                      <span aria-current="page">
                        <span
                          class="relative h-full inline-flex items-center px-4 py-2 -ml-px z-10 font-medium border border-gray-500 text-gray-400 cursor-default leading-6">{{ $page }}</span>
                      </span>
                    @else
                      {{-- changed default livewire's "gotoPage()" to anchor href, because deals are getting messed up, have no time to figure out how to reindex table without full page refresh --}}
                      <a href="{{ url()->current() . $page == 1 ? '' : '?page=' . $page }}"
                        class="relative h-full inline-flex items-center px-4 py-2 -ml-px font-medium bg-gray-800 text-gray-400 hover:text-gray-300 hover:border-gray-500 border border-gray-700 leading-6 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                        {{ $page }}
                      </a>
                    @endif
                  </span>
                @endforeach
              @endif
            @endforeach

            <span>
              {{-- Next Page Link --}}
              @if ($paginator->hasMorePages())
                {{-- <button wire:click="nextPage" dusk="nextPage.after" rel="next" class="relative h-full inline-flex items-center px-2 py-2 -ml-px text-sm font-medium bg-gray-800 text-gray-400 border border-gray-700 rounded-r-md leading-6 hover:text-gray-300 hover:border-gray-500 focus:z-10 focus:outline-none focus:border-gray-200 focus:text-gray-200 focus:shadow-outline-blue" aria-label="{{ __('pagination.next') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button> --}}
                <a href="{{ url()->current() . '?page=' . ($this->page + 1) }}" rel="next"
                  class="relative h-full inline-flex items-center px-2 py-2 -ml-px text-sm font-medium bg-gray-800 text-gray-400 border border-gray-700 rounded-r-md leading-6 hover:text-gray-300 hover:border-gray-500 focus:z-10 focus:outline-none focus:border-gray-200 focus:text-gray-200 focus:shadow-outline-blue"
                  aria-label="{{ __('pagination.next') }}">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd" />
                  </svg>
                </a>
              @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                  <span
                    class="relative h-full inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 border border-gray-700 cursor-default opacity-50 rounded-r-md leading-6"
                    aria-hidden="true">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                    </svg>
                  </span>
                </span>
              @endif
            </span>
          </span>
        </div>
      </div>
    </nav>
  @endif
</div>
