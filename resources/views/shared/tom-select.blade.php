@php
    $motclefs = explode('#', $document->motclefs);
    unset($motclefs[0]);
    $routeName = request()->route()->getName();
    $tabs = [
        'Administratif',
        'Économique',
        'Magistrat',
        'Capitaliste'
    ];
@endphp

<div class="inputContainer TomSelect">
    <label for="motclefs">Mots clés</label>
    <select name="motclefs[]" id="motclefs" multiple placeholder="Entrer quelques mots-clés...">
        @if ($routeName === 'admin.document.edit' && !empty($document->motclefs))
            @foreach ($motclefs as $clef)
                <option @if(in_array($clef, $motclefs)) selected @endif value="{{ $clef }}">{{ $clef }}</option>
            @endforeach
        @else
            @foreach ($tabs as $k => $tab)
                <option value="{{ $tab }}" {{ in_array($tab, old('motclefs', [])) ? 'selected' : '' }}>{{ $tab }}</option>
            @endforeach
        @endif
    </select>
    @error('motclefs')
        <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
    @enderror
</div>