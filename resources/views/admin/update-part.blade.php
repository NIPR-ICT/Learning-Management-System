@extends('admin.index')
@section('slot')
@include('components.sweetalert')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Programme Level</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page">Programme Level</li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">List of Programme Levels</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Update Programme Level</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <h6 class="mb-0 text-uppercase">Programme Level</h6>
                <hr/>
                {{-- {{ route('part.update', $part->id) }} --}}
                <form action="{{route('parts.store', $part->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="program" class="form-label">Selected Program</label>
                    <input type="text" id="program" name="program" class="form-control mb-3" value="{{ $programs->firstWhere('id', $part->program_id)->title ?? 'N/A' }}" readonly>
                    <input type="hidden" id="program_id" name="program_id" class="form-control mb-3" value="{{ $part->program_id }}">
                    <x-input-error :messages="$errors->get('program_id')" class="mt-2" />

                    <label for="title" class="form-label">Select Program Level</label>
                    <select class="form-select mb-3" name="name" aria-label="Default select example">
                        <option disabled>Select Level</option>
                        <option value="Level I" {{ $part->name == 'Level I' ? 'selected' : '' }}>Level I</option>
                        <option value="Level II" {{ $part->name == 'Level II' ? 'selected' : '' }}>Level II</option>
                        <option value="Level III" {{ $part->name == 'Level III' ? 'selected' : '' }}>Level III</option>
                        <option value="Level IV" {{ $part->name == 'Level IV' ? 'selected' : '' }}>Level IV</option>
                        <option value="Level V" {{ $part->name == 'Level V' ? 'selected' : '' }}>Level V</option>
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <label for="max_credit" class="form-label">Maximum Credit</label>
                    <input min="1" type="number" class="form-control w-100 form-control-lg mb-3" name="max_credit" value="{{ $part->max_credit }}" aria-label=".form-control-lg example">
                    <x-input-error :messages="$errors->get('max_credit')" class="mt-2" />

                    <label for="min_credit" class="form-label">Minimum Credit</label>
                    <input min="1" type="number" class="form-control w-100 form-control-lg mb-3" name="min_credit" value="{{ $part->min_credit }}" aria-label=".form-control-lg example">
                    <x-input-error :messages="$errors->get('min_credit')" class="mt-2" />

                    <label for="program_duration" class="form-label">Program Duration</label>
                    <input min="1" type="text" class="form-control w-100 form-control-lg mb-3" name="program_duration" value="{{ $part->program_duration }}" aria-label=".form-control-lg example">
                    <x-input-error :messages="$errors->get('program_duration')" class="mt-2" />

                    <label for="formFile" class="form-label">Level Accessing Order</label>
                    <input min="1" type="number" class="form-control  w-100 form-control-lg mb-3" name="accessing_order" value="{{ $part->accessing_order }}"  placeholder="" aria-label=".form-control-lg example">
                    <x-input-error :messages="$errors->get('accessing_order')" class="mt-2" />

                    <label for="description" class="block text-sm font-medium text-gray-700">Part Description</label>
                    <textarea class="form-control w-100 form-control-lg mb-3" id="description" name="description" rows="4" style="resize: none">{{ $part->description }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    <button class="btn btn-primary px-4">
                        Update
                        <i class="bx bx-right-arrow-alt ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
