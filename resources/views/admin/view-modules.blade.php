


@extends('admin.index')
  @section('slot')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Materials</div>
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
                    <button type="button" class="btn btn-primary">Add Materials</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
            <h6 class="mb-0 text-uppercase">All Modules</h6>
            <hr/>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Program</th>
                                <th >Course(Level)</th>
                                <th >Module</th>
                                <th >Description</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $module)
                            <tr class="hover:bg-gray-200">
                                @php
                                $levelTitle = App\Models\Part::find($module->course->part_id);
                                $programTitle = App\Models\Program::find($module->course->program_id);
                                @endphp
                                <td>{{ $programTitle->title }}</td>
                                <td>{{ $module->course->title  }} <br>
                                    @php
                                        $levelTitle = App\Models\Part::find($module->course->part_id);
                                        $programTitle = App\Models\Program::find($module->course->program_id);
                                    @endphp
                                     ({{ $levelTitle->name }})
                                </td>
                                <td>{{ '('.$module->order.') '. $module->title }}</td>
                                <td >
                                    {{Str::words($module->description, 15, '...') }}
                                </td>
                                <td class="py-3 px-4 flex space-x-2">
                                    <a href="{{ route('lesson.course.module', $module->id) }}" class="btn btn-warning"><i class="fa fa-eye"></i> View</a>
                                    <a href="{{ route('add.lesson', $module->id) }}" class="btn btn-success"><i class="fa fa-plus"></i>Add</a>
                                    <form action="{{ route('lesson.delete', $module->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Lesson?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Program</th>
                                <th >Course(Level)</th>
                                <th >Module</th>
                                <th >Description</th>
                                <th >Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $modules->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
  @endsection

