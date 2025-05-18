@if($paginator->hasPages())
    @php
        $current = $paginator->currentPage();
        $last = $paginator->lastPage();
    @endphp

    {{-- Previous Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link disabled" href="#"><i class="fi-rs-arrow-small-left"></i></a>
        </li>
    @else
        <li class="page-item">
            <a wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="page-link" href="javascript:void(0)">
                <i class="fi-rs-arrow-small-left"></i>
            </a>
        </li>
    @endif

    {{-- First page always --}}
    <li class="page-item {{ $current == 1 ? 'active' : '' }}">
        <a wire:click="gotoPage(1)" wire:loading.attr="disabled" class="page-link" href="javascript:void(0)">1</a>
    </li>

    {{-- Left dots --}}
    @if($current > 3)
        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
    @endif

    {{-- Pages around current --}}
    @for ($i = max(2, $current - 1); $i <= min($last - 1, $current + 1); $i++)
        <li class="page-item {{ $i == $current ? 'active' : '' }}">
            <a wire:click="gotoPage({{ $i }})" wire:loading.attr="disabled" class="page-link" href="javascript:void(0)">{{ $i }}</a>
        </li>
    @endfor

    {{-- Right dots --}}
    @if($current < $last - 2)
        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
    @endif

    {{-- Last page always --}}
    @if($last > 1)
        <li class="page-item {{ $current == $last ? 'active' : '' }}">
            <a wire:click="gotoPage({{ $last }})" wire:loading.attr="disabled" class="page-link" href="javascript:void(0)">{{ $last }}</a>
        </li>
    @endif

    {{-- Next Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="page-link" href="javascript:void(0)">
                <i class="fi-rs-arrow-small-right"></i>
            </a>
        </li>
    @else
        <li class="page-item disabled">
            <a class="page-link disabled" href="#"><i class="fi-rs-arrow-small-right"></i></a>
        </li>
    @endif
@endif
