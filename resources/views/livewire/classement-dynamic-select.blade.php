<div class="structure">

    <div class="inputContainer">
        <label for="rayon">Rayon Rangement</label>
        <select class="inputContainer" id="rayon" wire:model="selectedRayon" {{-- name="rayon_rangement_id" --}}>
            <option>Sélectionnez un Rayon</option>
            @foreach ($rayons as $id => $rayon)
                <option {{-- @selected(old('rayon_rangement_id', $document->rayon_rangement_id) == $id) --}}  value="{{ $id }}">{{ $rayon }}</option>
            @endforeach
        </select>
        @error('rayon_rangement_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    <div class="inputContainer">
        <label for="boite">Boîte Archive</label>
        <select class="inputContainer" id="boite" wire:model="selectedBoite" {{-- name="boite_archive_id" --}}>
            <option>Sélectionnez une Boîte</option>
            @foreach ($boites as $id => $boite)
                <option {{-- @selected(old('boite_archive_id', $document->boite_archive_id) == $id) --}}  value="{{ $id }}">{{ $boite }}</option>
            @endforeach
        </select>
        @error('boite_archive_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    <div class="inputContainer">
        <label for="chemise">Chemise Dossier</label>
        <select class="inputContainer" id="chemise" wire:model="selectedChemise" {{-- name="chemise_dossier_id" --}}>
            <option>Sélectionnez une Chemise</option>
            @foreach ($chemises as $id => $chemise)
                <option {{-- @selected(old('chemise_dossier_id', $document->chemise_dossier_id) == $id) --}} value="{{ $id }}">{{ $chemise }}</option>
            @endforeach
        </select>
        @error('chemise_dossier_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

</div>

