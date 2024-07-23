@extends('admin.index')
@section('slot')
    @include('components.sweetalert')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Charge</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item " aria-current="page">Charges</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">List of Charges</button>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Create Charge</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Charge</h6>
                    <hr />
                    <form action="{{ route('charge.store') }}" method="POST">
                        @csrf
                        <label for="item" class="form-label">Item Name</label>
                        <input class="form-control w-100 form-control-lg mb-3" placeholder="E.g ICT Levy" type="text"
                            id="item" name="item" value="{{ old('item') }}" aria-label=".form-control-lg example">
                        <x-input-error :messages="$errors->get('item')" class="mt-2" />

                        <label for="part_id" class="form-label">Choose the program to which the fee applies.</label>
                        <select class="form-control w-100 form-control-lg mb-3" id="part_id" name="part_id" required
                            aria-label=".form-control-lg example" onchange="updateProgramOptions()">
                            <option disabled selected>Select Program with Level</option>
                            @foreach ($parts as $part)
                                <option value="{{ $part->id }}" data-program="{{ $part->program->title }}"
                                    data-program-id="{{ $part->program->id }}">
                                    {{ $part->name }} of {{ $part->program->title }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('part_id')" class="mt-2" />

                        <label for="program_id" class="form-label">Confirm Program</label>
                        <select class="form-control w-100 form-control-lg mb-3" id="program_id" name="program_id" required
                            aria-label=".form-control-lg example">
                            <option disabled selected>Select Program</option>
                        </select>
                        <x-input-error :messages="$errors->get('program_id')" class="mt-2" />

                        <label for="amount" class="form-label">Amount</label>
                        <input class="form-control w-100 form-control-lg mb-3" type="number" min="10" id="amount"
                            name="amount" value="{{ old('amount') }}" aria-label=".form-control-lg example">
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />

                        <label for="address" class="form-label">Charges Description</label>
                        <textarea class="form-control w-100 form-control-lg mb-3" id="description" name="description" rows="4"
                            style="resize: none" aria-label=".form-control-lg example">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                        <button class="btn btn-primary px-4">
                            Save
                            <i class="bx bx-right-arrow-alt ms-2"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>
@endsection

<script>
    function updateProgramOptions() {
        var partSelect = document.getElementById('part_id');
        var programSelect = document.getElementById('program_id');

        // Get the selected part's program ID and title
        var selectedOption = partSelect.options[partSelect.selectedIndex];
        var programId = selectedOption.getAttribute('data-program-id');
        var programTitle = selectedOption.getAttribute('data-program');

        // Clear existing options and set the selected program
        programSelect.innerHTML = '';

        // Add a default option
        var defaultOption = document.createElement('option');
        defaultOption.text = 'Select Program';
        defaultOption.disabled = true;
        defaultOption.selected = true;
        programSelect.appendChild(defaultOption);

        // Add the program options based on the selected part
        if (programId && programTitle) {
            var option = document.createElement('option');
            option.value = programId;
            option.text = programTitle; // Display program title as text
            programSelect.appendChild(option);
        }
    }
</script>

