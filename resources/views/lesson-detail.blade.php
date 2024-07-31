<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Relations and Leadership Academy</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.svg')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            display: flex;
            flex-wrap: nowrap;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 300px;
            height: 100vh;
            background-color: #c51b0e;
            position: fixed;
            top: 0;
            left: 0;
            transform: translateX(0);
            /* Show sidebar by default */
            transition: transform 0.3s ease;
            z-index: 1000;
            /* Ensure the sidebar is above other content */
        }

        .sidebar .nav-link {
            color: #ffffff;
        }

        .sidebar .nav-link.active {
            background-color: #700404;
        }

        .content {
            margin-left: 300px;
            padding: 20px;
            width: 100%;
            transition: margin-left 0.3s ease;
        }

        .toggle-sidebar-btn {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1001;
            cursor: pointer;
            font-size: 30px;
            color: #007bff;
            display: none;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                transform: translateX(-300px);
                /* Hide sidebar off-screen by default */
            }

            .content {
                margin-left: 0;
                /* Reset margin on mobile */
            }

            .sidebar-visible .sidebar {
                transform: translateX(0);
                /* Show sidebar when visible */
            }

            .sidebar-visible .content {
                margin-left: 300px;
                /* Adjust content margin when sidebar is visible */
            }

            .toggle-sidebar-btn {
                display: block;
                /* Show hamburger icon on mobile */
            }
        }

        .pagination {
            justify-content: center;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #dee2e6;
        }

        .page-link {
            color: #c00404;
        }

        .page-link:hover {
            color: #7c1008;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #570d0d;
            border-color: #3f0707;
        }

        .fixed-btn {
            position: fixed;
            right: 20px;
            /* Adjust the right position as needed */
            top: 10px;
            /* Adjust the top position as needed */
        }
    </style>
</head>

<body>
    <div class="toggle-sidebar-btn">&#9776;</div>
    <div class="sidebar d-flex flex-column p-3">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('list.courses', $partID) }}">Go Back</a>
            </li>
            @foreach ($lessons as $lessonItem)
            <li class="nav-item">
                <a class="nav-link {{ $lessonItem->id == $lesson->id ? 'active' : '' }}"
                    href="{{ route('bought.lesson.details', $lessonItem->id) }}">
                    {{ $lessonItem->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="content">
        <div class="fixed-btn">
            @if (!$existingProgress)
                <a class="btn btn-danger mt-3" href="{{ route('student.complete.lesson', $lessonId) }}">Complete</a>
            @else
                <a class="btn btn-danger mt-3" href="{{ route('student.complete.lesson', $lessonId) }}">Lesson
                    Completed</a>
            @endif
        </div>
        <h3>{{ $title }}</h3>
        <p>{!! $content !!}</p>

        <div class="lesson-materials">
            <h5 class="h6 font-weight-bold mb-2">Materials:</h5>
            <ul class="list-unstyled">
                @foreach ($materials as $material)
                    <li class="lesson-material d-flex align-items-center mb-2">
                        @if ($material->file_path)
                            <a href="{{ route('materials.download', $material->id) }}"
                                class="btn btn-danger text-white font-weight-light py-1 px-3 rounded-md text-sm mr-2">Download</a>
                        @endif
                        &nbsp;<span class="material-title">{{ $material->title }}</span>
                        [<span class="material-type text-muted">{{ $material->type }}</span>]
                    </li>
                @endforeach
            </ul>
        </div>

        <nav aria-label="Lesson navigation">
            <ul class="pagination">
                <li class="page-item {{ is_null($previousLesson) ? 'disabled' : '' }}">
                    <a class="page-link"
                        href="{{ $previousLesson ? route('bought.lesson.details', $previousLesson->id) : '#' }}"
                        tabindex="-1">Previous</a>
                </li>
                <li class="page-item {{ is_null($nextLesson) ? 'disabled' : '' }}">
                    <a class="page-link"
                        href="{{ $nextLesson ? route('bought.lesson.details', $nextLesson->id) : '#' }}">Next</a>
                </li>
            </ul>
        </nav>
        @include('components.sweetalert')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelector('.toggle-sidebar-btn').addEventListener('click', function() {
            document.body.classList.toggle('sidebar-visible');
        });
    </script>
</body>

</html>
