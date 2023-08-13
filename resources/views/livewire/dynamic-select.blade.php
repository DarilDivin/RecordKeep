<div>
    <div class="inputContainer">
        <label for="direction">Direction</label>
        <select class="inputContainer" id="direction" wire:model="selectedDirection" name="direction_id">
            @foreach ($directions as $id => $direction)
                <option @selected(old('direction_id', $document->direction_id) == $id) value="{{ $id }}">{{ $direction }}</option>
            @endforeach
        </select> <br>
        @error('direction_id')
            {{ $message }}
        @enderror
    </div>

    <div class="inputContainer">
        <label for="service">Service</label>
        <select class="inputContainer" id="service" wire:model="selectedService" name="service_id">
            @foreach ($services as $id => $service)
                <option @selected(old('service_id', $document->service_id) == $id)  value="{{ $id }}">{{ $service }}</option>
            @endforeach
        </select> <br>
        @error('service_id')
            {{ $message }}
        @enderror
    </div>

    <div class="inputContainer">
        <label for="division">Division</label>
        <select class="inputContainer" id="division" wire:model="selectedDivision" name="division_id">
            @foreach ($divisions as $id => $division)
                <option @selected(old('division_id', $document->division_id) == $id)  value="{{ $id }}">{{ $division }}</option>
            @endforeach
        </select> <br>
        @error('division_id')
            {{ $message }}
        @enderror
    </div>

</div>
