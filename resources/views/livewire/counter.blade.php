{{-- <div x-data ="{ open:false }">
   <span>Compteur : {{ $count }}</span>
   <button wire:click="increment" x-on:click="open = true">Incrémenter</button>
   <p x-show="open">Petit Paragraphe pour tester Alpine JS</p>
</div> --}}

{{-- <div x-data ="{ open:false }">
    Compteur : <span x-text="$wire.count"></span>
    <button x-on:click="$wire.increment()">Incrémenter</button>
 </div> --}}

 <div>
    <div x-data="{ open: @entangle('showDropdown').defer }">
        <button @click="open = true">Show More...</button>

        <ul x-show="open" @click.outside="open = false">
            <li><button wire:click="archive">Archive</button></li>
            <li><button wire:click="delete">Delete</button></li>
        </ul>
    </div>
</div>
