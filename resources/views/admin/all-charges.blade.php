

@extends('admin.index')
@include('components.sweetalert')
  @section('slot')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Extra charges</div>
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
                    <button type="button" class="btn btn-primary">Add Charges</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
            <h6 class="mb-0 text-uppercase">All Charges</h6>
            <hr/>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th >Item</th>
                                <th >Amount</th>
                                <th >Level</th>
                                <th >Program</th>
                                <th >Description</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($charges as $charge)
                            <tr class="hover:bg-gray-200">
                                <td>{{ $charge->item }}</td>
                                <td>{{ $charge->amount }}</td>
                                <td>{{ $charge->part->name }}</td>
                                <td>{{ $charge->program->title }}</td>
                                <td >
                                    {{Str::words($charge->description, 10, '...') }}
                                </td>
                                <td class="py-3 px-4 flex space-x-2">
                                    <a href="{{ route('charges.edit', $charge->id) }}" class="btn btn-info">Edit</a>
                                    <form action="{{ route('charge.delete', $charge->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Charge?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th >Item</th>
                                <th >Amount</th>
                                <th >Level</th>
                                <th >Program</th>
                                <th >Description</th>
                                <th >Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $charges->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>
</div>
  @endsection

