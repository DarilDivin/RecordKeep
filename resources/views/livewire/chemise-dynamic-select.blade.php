<div class="structure">
    <div class="inputContainer">
        <label for="rayon">Rayon de Rangement</label>
        <select class="inputContainer" id="rayon" wire:model="selectedRayon" name="rayon_rangement_id">
            @foreach ($rayons as $rayon)
                <option value="{{ $rayon->id }}">{{ $rayon->libelle }}</option>
            @endforeach
        </select>
        @error('rayon_rangement_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    <div class="inputContainer">
        <label for="boite">Boîte Archive</label>
        <select class="inputContainer" id="boite" wire:model="selectedBoite" name="boite_archive_id">
            @foreach ($boites as $boite)
                <option value="{{ $boite->id }}">{{ $boite->libelle }}</option>
            @endforeach
        </select>
        @error('boite_archive_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>
</div>
