

@extends('admin.index')
@section('slot')
    @include('components.sweetalert')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Courses</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item " aria-current="page">Course</li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">List of Courses</button>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Update Course</h6>
            <hr />
            <div class="card">
                <div class="card-body">



                    <h6 class="mb-0 text-uppercase">Course</h6>
                    <hr />
                    <form action="{{ route('course.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="title" class="form-label">Course Title</label>
                        <input class="form-control w-100 form-control-lg mb-3" id="title" name="title"
                            type="text" placeholder="" value="{{ old('title', $course->title) }}"
                            aria-label=".form-control-lg example">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />


                        <label for="part_id" class="form-label">Part Name with Program</label>
                        <select class="form-control w-100 form-control-lg mb-3" id="part_id" name="part_id"
                            aria-label=".form-control-lg example" onchange="updateProgramOptions()">
                            <option disabled>Select Program with Part</option>
                            @foreach ($parts as $part)
                                <option value="{{ $part->id }}" data-program="{{ $part->program->title }}"
                                    data-program-id="{{ $part->program->id }}"
                                    {{ $course->part_id == $part->id ? 'selected' : '' }}>
                                    {{ $part->name }} of {{ $part->program->title }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('part_id')" class="mt-2" />


                        <label for="program_id" class="form-label">Confirm Program</label>
                        <select class="form-control w-100 form-control-lg mb-3" id="program_id" name="program_id"
                            aria-label=".form-control-lg example">
                            <option disabled>Select Program</option>
                            @if ($course->part)
                                <option value="{{ $course->part->program->id }}" selected>
                                    {{ $course->part->program->title }}</option>
                            @endif
                        </select>
                        <x-input-error :messages="$errors->get('program_id')" class="mt-2" />


                            <label for="course_category" class="form-label">Course Category</label>
                            <select class="form-control w-100 form-control-lg mb-3" id="course_category" name="course_category"
                                aria-label=".form-control-lg example" onchange="updateProgramOptions()">
                                <option disabled>Select Course Category</option>
                                        <option value="Core"
                                            {{ $course->course_category == 'Core' ? 'selected' : '' }}>Core Course
                                        </option>
                                        <option value="Elective"
                                            {{ $course->course_category == 'Elective' ? 'selected' : '' }}>Elective
                                            Course</option>
                                        <option value="General"
                                            {{ $course->course_category == 'General' ? 'selected' : '' }}>General
                                            Course</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('course_category')" class="mt-2" />


                        <label for="course_amount" class="form-label">Course Amount</label>
                        <input class="form-control w-100 form-control-lg mb-3" type="number" id="course_amount" name="course_amount"
                           value="{{ old('course_amount', $course->course_amount) }}" 
                            aria-label=".form-control-lg example">
                        <x-input-error :messages="$errors->get('course_amount')" class="mt-2" />

                        <label for="course_code" class="form-label">Enter Course Code</label>
                        <input class="form-control  w-100 form-control-lg mb-3" type="text" id="course_code" name="course_code" aria-label=".form-control-lg example" value="{{ old('course_code', $course->course_code) }}">
                        <x-input-error :messages="$errors->get('course_code')" class="mt-2" />

                            <label for="description" class="form-label">Description</label>
                                <textarea class="form-control w-100 form-control-lg mb-3" id="description" name="description" rows="4"  style="resize: none" aria-label=".form-control-lg example">{{ old('description', $course->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />


                        <label for="credit_unit" class="form-label">Course Credit Unit</label>
                        <input class="form-control  w-100 form-control-lg mb-3" min="0" id="credit_unit" name="credit_unit" type="number"
                            placeholder="" aria-label=".form-control-lg example"
                            value="{{ old('credit_unit', $course->credit_unit) }}">
                        <x-input-error :messages="$errors->get('credit_unit')" class="mt-2" />


                            <div class="row">
                                <div class="col-md-2">
                            <label for="featured" class="form-label">Featured</label>
                            <div class="form-check w-100 mb-3">
                                <input class="form-check-input form-control-lg" type="checkbox" id="featured" name="featured"
                                       aria-label=".form-control-lg example" value="1" 
                                       {{ old('featured', $course->featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">Yes</label>
                            </div>
                            <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                            </div>
                            <div class="col-md-2">
                                <label for="standalone" class="form-label">Stand Alone</label>
                                <div class="form-check w-100 mb-3">
                                    <input class="form-check-input form-control-lg" type="checkbox" id="standalone" name="standalone"
                                           aria-label=".form-control-lg example" value="1" 
                                           {{ old('standalone', $course->standalone) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="standalone">Yes</label>
                                </div>
                                <x-input-error :messages="$errors->get('standalone')" class="mt-2" />
                                </div>
                            </div>
                            
<br/>
                        

                        <button class="btn btn-primary px-4">
                            Update
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
        defaultOption.text = 'Choose Program';
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
