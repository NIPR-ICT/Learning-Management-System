@extends('admin.index')
  @section('slot')
  @include('components.sweetalert')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Lessons</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page">Lesson</li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">List of Lessons</button>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Add Lesson</h6>
        <hr/>
        <div class="card">
            <div class="card-body">



                    <h6 class="mb-0 text-uppercase">Lesson</h6>
                    <hr/>
                    <form action="{{ route('lesson.store') }}" method="POST">
                        @csrf
                            <label for="title" class="form-label">Lesson Title</label>
                            <input class="form-control w-100 form-control-lg mb-3"  name="title"  type="text" value="{{ old('title') }}" aria-label=".form-control-lg example">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                
                                <label for="course_name" class="form-label">Course Name</label>
                                <input class="form-control w-100 form-control-lg mb-3"  name="course_name"  type="text" value="{{ $module->course->title }}" readonly aria-label=".form-control-lg example">
                                <input type="hidden" id="course_id" name="course_id" value="{{ $module->course->id }}">
                                <x-input-error :messages="$errors->get('course_id')" class="mt-2" />

                            <label for="module_name" class="form-label">Module Name</label>
                            <input class="form-control  w-100 form-control-lg mb-3" name="module_name" type="text" aria-label=".form-control-lg example" value="{{ $module->title }}" readonly>
                            <input type="hidden" id="module_id" name="module_id" value="{{ $module->id }}">
                            <x-input-error :messages="$errors->get('module_id')" class="mt-2" />

                            <label for="order" class="form-label">Lesson Order</label>
                            <input class="form-control  w-100 form-control-lg mb-3" name="order" type="number" placeholder="" aria-label=".form-control-lg example" value="{{ old('order') }}">
                            <x-input-error :messages="$errors->get('order')" class="mt-2" />


                                <label for="content" class="form-label">Enter Lesson Content</label>
                                <textarea class="form-control w-100 form-control-lg mb-3" id="content" name="content" rows="4"  style="resize: none" aria-label=".form-control-lg example">{{ old('content') }}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />

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
<script src="https://cdn.tiny.cloud/1/dci5szikf4daw17kiq5crzw8azz6oi0bzgb896fs3po9skmj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>

  @endsection
  

