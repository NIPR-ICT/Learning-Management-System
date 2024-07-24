@extends('admin.index')
@include('components.sweetalert')

@section('slot')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Programme</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Add Programme</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <h6 class="mb-0 text-uppercase">All Programmes</h6>
                <hr/>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Accessing level</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $program)
                            <tr>
                                <td>{{ $program->title }}</td>
                                <td>{{ $program->accessing_order }}</td>
                                <td>{{ Str::words($program->description, 25, '...') }}</td>
                                <td>
                                    <a href="{{ route('program.edit', $program->id) }}" class="btn btn-info">
                                        Edit <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('program.delete', $program->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this program?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $programs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
