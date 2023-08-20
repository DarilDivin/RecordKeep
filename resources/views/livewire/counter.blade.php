{{-- <div x-data ="{ open:false }">
   <span>Compteur : {{ $count }}</span>
   <button wire:click="increment" x-on:click="open = true">Incrémenter</button>
   <p x-show="open">Petit Paragraphe pour tester Alpine JS</p>
</div> --}}

<div x-data ="{ open:false }">
    Compteur : <span x-text="$wire.count"></span>
    <button x-on:click="$wire.increment()">Incrémenter</button>
 </div>
