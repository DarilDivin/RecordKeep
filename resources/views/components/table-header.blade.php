<td wire:click="setOrderField('{{ $name }}')">
    {{ $label }}
    @if ($visible)
        @if ($direction === 'ASC')
            <ion-icon name="caret-up-outline"></ion-icon>
        @else
            <ion-icon name="caret-down-outline"></ion-icon>
        @endif
    @endif
</td>
