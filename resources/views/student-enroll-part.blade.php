@extends('welcome')
@section('content')
<div class="breadcrumb-bar py-5"></div>

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">
            
            <!-- Sidebar -->
            <div class="col-xl-3 col-lg-3">
                @include('includes.layout-frontend.side-bar')
            </div>
            <!-- /Sidebar -->

            <!-- Student Dashboard -->
            <div class="col-xl-9 col-lg-9">
                <div class="col-12 col-sm-12 col-md-9 p-4">
                    <div class="container mx-auto">
                        <!-- Note -->
           
                            <p>The list of Level for the program you are enrolled in.</p>

                        
                        <div class="row">
                            @foreach ($parts as $part)
                            <div class="col-12 col-md-12 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h2 class="card-title h5 mb-2">{{ $part->name }} of {{ $part->program->title }}</h2>
                                        <div class="d-flex mb-4 text-muted">
                                            <p class="me-4"><strong>Max Credit:</strong> {{ $part->max_credit }}</p>
                                            <p class="me-4"><strong>Min Credit:</strong> {{ $part->min_credit }}</p>
                                            <p><strong>Duration:</strong> {{ $part->program_duration }}</p>
                                        </div>
                                        <p class="card-text mb-4">
                                            @php
                                            $description = $part->description;
                                            $words = explode(' ', $description);
                                            $shortened = implode(' ', array_slice($words, 0, 10)); // Adjust the number of words shown
                                            if (count($words) > 10) {
                                                $shortened .= '...';
                                            }
                                            @endphp
                                            {{ $shortened }}
                                        </p>
                                        <form id="all-course-form-{{ $part->id }}" action="{{ route('list.courses') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="part_id" value="{{ $part->id }}">
                                            <button type="submit" class="btn btn-danger">View Enroll Courses</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $parts->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /Student Dashboard -->

        </div>
    </div>
</div>
@endsection
