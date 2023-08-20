<div class="structure">
    <div class="inputContainer">
        <label for="direction">Direction</label>
        <select class="inputContainer" id="direction" wire:model="selectedDirection" name="direction_id">
            <option>Sélectionnez une Direction</option>
            @foreach ($directions as $id => $direction)
                <option @selected(old('direction_id', $document->direction_id) == $id) value="{{ $id }}">{{ $direction }}</option>
            @endforeach
        </select>
        @error('direction_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    <div class="inputContainer">
        <label for="service">Service</label>
        <select class="inputContainer" id="service" wire:model="selectedService" name="service_id">
            <option>Sélectionnez un Service</option>
            @foreach ($services as $id => $service)
                <option @selected(old('service_id', $document->service_id) == $id)  value="{{ $id }}">{{ $service }}</option>
            @endforeach
        </select>
        @error('service_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    <div class="inputContainer">
        <label for="division">Division</label>
        <select class="inputContainer" id="division" wire:model="selectedDivision" name="division_id">
            <option>Sélectionnez une Division</option>
            @foreach ($divisions as $id => $division)
                <option @selected(old('division_id', $document->division_id) == $id)  value="{{ $id }}">{{ $division }}</option>
            @endforeach
        </select>
        @error('division_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

</div>
