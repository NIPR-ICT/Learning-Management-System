@extends('admin.index')
@section('slot')
    @include('components.sweetalert')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Post</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item " aria-current="page">Post</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">List of Post</button>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Create Post</h6>
            <hr />
            <div class="row">
                <div class="col-8">
                    <div class="card ">
                        <div class="card-body">

                            <h6 class="mb-0 text-uppercase">Blog Post</h6>
                            <hr />
                            <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <label for="formFile" class="form-label">Post Title </label>
                                <input value="{{ old('title') }}" class="form-control w-100 form-control-lg mb-3"
                                    id="title" name="title" type="text" aria-label=".form-control-lg example">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />


                                <label for="title" class="form-label">Select Category</label>
                                <select class="form-select mb-3" name="category_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />


                                <label for="body" class="form-label">Enter Post Body</label>
                                <textarea class="form-control w-100 form-control-lg mb-3" id="body" name="body" rows="4"
                                    style="resize: none" aria-label=".form-control-lg example">{{ old('body') }}</textarea>
                                <x-input-error :messages="$errors->get('body')" class="mt-2" />

                        </div>

                    </div>
                </div>

                <div class="col-4">
                    <div class="card ">
                        <div class="card-body">
                            <label for="formFile" class="form-label">Publish Time </label>
                            <input value="{{ old('published_at') }}" class="form-control w-100 form-control-lg mb-3"
                                id="published_at" name="published_at" type="date"
                                aria-label=".form-control-lg example">
                            <x-input-error :messages="$errors->get('published_at')" class="mt-2" />

                            <label for="formFile" class="form-label"> Post Cover Image</label>
                            <input type="file" id="image" name="image"
                                class="form-control w-100 form-control-lg mb-3" placeholder=""
                                aria-label=".form-control-lg example">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />

                            <label for="featured" class="form-label">Featured Post?</label>
                            <div class="form-check w-100 mb-3">
                                <input class="form-check-input form-control-lg" type="checkbox" id="featured"
                                    name="featured" aria-label=".form-control-lg example" value="1"
                                    {{ old('featured') ? 'checked' : '' }}>
                            </div>
                            <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                            <br />
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

    </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/dci5szikf4daw17kiq5crzw8azz6oi0bzgb896fs3po9skmj/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection
