@extends('admin.index')
@include('components.sweetalert')

@section('slot')
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
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Add Assessments</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <h6 class="mb-0 text-uppercase">All Assessment</h6>
                <hr/>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <th>Course</th>
                                <th>Total Questions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizzes as $quiz)
                                <tr class="hover:bg-gray-200">
                                    <td>{{ $quiz->module->title }}</td>
                                    <td>{{ $quiz->module->course->title }}</td>
                                    <td>{{ $quiz->questions_count }}</td>
                                    <td>
                                        <form action=" {{ route('assessment.delete', $quiz->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Assessment?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Module</th>
                                <th>Course</th>
                                <th>Total Questions</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $quizzes->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
