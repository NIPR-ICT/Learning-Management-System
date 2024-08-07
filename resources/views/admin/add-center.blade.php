
@extends('admin.index')
  @section('slot')
  @include('components.sweetalert')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Centre</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page">Centre</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">List of Centre</button>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Create Centre</h6>
        <hr/>
        <div class="card">
            <div class="card-body">



                    <h6 class="mb-0 text-uppercase">Centre</h6>
                    <hr/>
                    <form action="{{route('center.store')}}" method="POST">
                        @csrf
                            <label for="name" class="form-label">Centre Name</label>
                            <input class="form-control w-100 form-control-lg mb-3"  type="text" id="title" name="name" value="{{ old('name') }}" aria-label=".form-control-lg example">


                            <label for="state" class="form-label">State</label>
                            <select class="form-control w-100 form-control-lg mb-3" id="state" name="state"
                                aria-label=".form-control-lg example">
                                <option value="">{{ __('Select a state') }}</option>
                                @foreach (include(resource_path('states.php'))  as $state)
                                    <option value="{{ $state }}" {{ old('state') == $state ? 'selected' : '' }}>{{ $state }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('state')" class="mt-2" />


                            <label for="code" class="form-label">Centre Code</label>
                            <input class="form-control  w-100 form-control-lg mb-3" id="code" name="code" placeholder="E.g ABJ" aria-label=".form-control-lg example" value="{{ old('code') }}">
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                           
                            <label for="address" class="form-label">Centre Address</label>
                                <textarea class="form-control w-100 form-control-lg mb-3" id="address" name="address" rows="4"  style="resize: none" aria-label=".form-control-lg example">{{ old('address') }}</textarea>
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        
                            <button class="btn btn-primary px-4" >
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
