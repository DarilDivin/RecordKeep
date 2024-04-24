<div class="structure">
    <div class="inputContainer requiredStar">
        <label for="direction">Direction</label>
        <select class="inputContainer" id="direction" wire:model="selectedDirection" name="direction_id">
            @foreach ($directions as $direction)
                <option value="{{ $direction->id }}">{{ $direction->direction }}</option>
            @endforeach
        </select>
        @error('direction_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    <div class="inputContainer requiredStar">
        <label for="service">Service</label>
        <select class="inputContainer" id="service" wire:model="selectedService" name="service_id">
            @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->service }}</option>
            @endforeach
        </select>
        @error('service_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    <div class="inputContainer requiredStar">
        <label for="division">Division</label>
        <select class="inputContainer" id="division" wire:model="selectedDivision" name="division_id">
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}">{{ $division->division }}</option>
            @endforeach
        </select>
        @error('division_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

</div>
