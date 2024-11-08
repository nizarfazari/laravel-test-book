@if ($paginator->hasPages())
<nav role="navigation"
  aria-label="Pagination Navigation"
  class="flex items-center justify-between p-4 border-t select-none border-gray-300 dark:border-gray-600 sm:px-6">
  
  <!-- Mobile Pagination Controls -->
  <div class="flex justify-between flex-1 sm:hidden">
    @if ($paginator->onFirstPage())
    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
      {!! __('pagination.previous') !!}
    </span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}"
      class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 rounded dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600 hover:bg-blue-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
      {!! __('pagination.previous') !!}
    </a>
    @endif

    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}"
      class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 rounded dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600 hover:bg-blue-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
      {!! __('pagination.next') !!}
    </a>
    @else
    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
      {!! __('pagination.next') !!}
    </span>
    @endif
  </div>

  <!-- Desktop Pagination Controls -->
  <div class="flex-col hidden lg:flex-row sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-600 dark:text-gray-300">
        {{ __('pagination.showing') }}
        <span class="font-medium">{{ $paginator->firstItem() }}</span>
        {{ __('pagination.to') }}
        <span class="font-medium">{{ $paginator->lastItem() }}</span>
        {{ __('pagination.of') }}
        <span class="font-medium">{{ $paginator->total() }}</span>
        {{ __('pagination.results') }}
      </p>
    </div>

    <div>
      <span class="relative z-0 inline-flex shadow-sm lg:mt-0">
        @if ($paginator->onFirstPage())
        <span aria-disabled="true" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-l dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
          class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 rounded-l dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600 hover:bg-blue-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50"
          aria-label="{{ __('pagination.previous') }}">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
        @endif

        @foreach ($elements as $element)
        @if (is_string($element))
        <span aria-disabled="true" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span aria-current="page" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600">
          {{ $page }}
        </span>
        @else
        <a href="{{ $url }}"
          class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 hover:bg-blue-100 dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
          {{ $page }}
        </a>
        @endif
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
          class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 rounded-r hover:bg-blue-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50"
          aria-label="{{ __('pagination.next') }}">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
        @else
        <span aria-disabled="true" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-r dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </span>
        @endif
      </span>
    </div>
  </div>
</nav>
@endif
