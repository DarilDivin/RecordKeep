<!-- resources/views/shared/pagination.blade.php -->
@vite([
    'resources/css/app.css',
    'resources/css/body.css',
    'resources/css/Utilité.css',
    'resources/css/pagination.css',
])

<div class="pagination_container">
    <div class="pagination_infos">
        <p><span>{{ $paginator->firstItem() }}</span> à <span>{{ $paginator->lastItem() }}</span> sur <span>{{ $paginator->total() }}</span></p>
    </div>

    <ul class="pagination">
        <!-- Lien vers la première page -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Précédente</span></li>
        @else
            <li wire:click="previousPage" wire:loading.attr="disabled" class="page-item">
                {{-- <a href="{{ $paginator->previousPageUrl() }}" class="page-link"> --}}
                    Précédente
                {{-- </a> --}}
            </li>
        @endif

        <!-- Liens vers les pages individuelles -->
        @foreach ($elements as $links)
            @if (is_string($links))
                <li class="page-item disabled"><span class="page-link">{{ $links }}</span></li>
            @endif

            @if (is_array($links))
                @foreach ($links as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item" wire:click="gotoPage({{ $page }})">
                            {{-- <a href="{{ $url }}" class="page-link"> --}}
                                {{ $page }}
                            {{-- </a> --}}
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach



        <!-- Lien vers la dernière page -->
        @if ($paginator->hasMorePages())
            <li class="page-item" wire:click="nextPage" wire:loading.attr="disabled">
                {{-- <a href="{{ $paginator->nextPageUrl() }}" class="page-link"> --}}
                    Suivant
                {{-- </a> --}}
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">Suivant</span></li>
        @endif
    </ul>
</div>
