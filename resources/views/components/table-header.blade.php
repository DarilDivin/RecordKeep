<td wire:click="setOrderField('{{ $name }}')" style="cursor: pointer;">
    {{ $label }}
    @if ($visible)
        @if ($direction === 'ASC')
            <ion-icon name="caret-up-outline"></ion-icon>
        @else
            <ion-icon name="caret-down-outline"></ion-icon>
        @endif
    @endif
</td>
