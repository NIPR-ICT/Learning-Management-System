@extends('admin.index')
@section('slot')
    @include('components.sweetalert')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Category</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item " aria-current="page">Category</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">List of Category</button>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Create Category</h6>
            <hr />
            <div class="card">
                <div class="card-body">

                    <h6 class="mb-0 text-uppercase">Category</h6>
                    <hr />
                    <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <label for="formFile" class="form-label">Category Title</label>
                        <input class="form-control w-100 form-control-lg mb-3" name="title" type="text"
                            aria-label=".form-control-lg example">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="text_color" class="form-label">Text Color</label>
                                    <input class="form-control w-100 form-control-lg mb-3" name="text_color" type="color"
                                        aria-label=".form-control-lg example">
                                    <x-input-error :messages="$errors->get('text_color')" class="mt-2" />
                                </div>
                                <div class="col-md-6">
                                    <label for="bg_color" class="form-label">Background Color</label>
                                    <input class="form-control w-100 form-control-lg mb-3" name="bg_color" type="color"
                                        aria-label=".form-control-lg example">
                                    <x-input-error :messages="$errors->get('bg_color')" class="mt-2" />
                                </div>
                            </div>
                        </div>

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
