
@extends('admin.index')
  @section('slot')
  @include('components.sweetalert')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Assessment</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page">Assessment</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">List of Assessment</button>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Create Assessment</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Assessment</h6>
                    <hr/>
                    <form action="{{route('quiz.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label for="module_name" class="form-label">Module</label>
                        <input class="form-control w-100 form-control-lg mb-3"  type="text" id="module_name" name="module_name" value="{{$module->title}} of {{$module->course->title}}" readonly>
                        <input class="form-control w-100 form-control-lg mb-3"  type="hidden" id="module_id" name="module_id" value="{{$module->id}}" readonly>
                        <x-input-error :messages="$errors->get('module_id')" class="mt-2" />

                            <label for="file" class="form-label">Select File to Upload</label>
                            <input class="form-control w-100 form-control-lg mb-3"  type="file" id="file" name="file" accept=".xlsx, .xls" required>
                        
                            <button class="btn btn-primary px-4" >
                                Import
                            <i class="bx bx-right-arrow-alt ms-2"></i>
                        </button>
                        </form>
                </div>

            </div>
        </div>

    </div>
</div>
  @endsection
