<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System - View Books</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .main-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        .content-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            overflow: hidden;
        }
        .header-section {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 2rem;
        }
        .header-section h2 {
            margin: 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .controls-section {
            padding: 2rem 2rem 1rem 2rem;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }
        .search-control, .filter-control {
            border-radius: 12px;
            border: 2px solid #e3f2fd;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        .search-control:focus, .filter-control:focus {
            border-color: #4facfe;
            box-shadow: 0 0 0 0.2rem rgba(79, 172, 254, 0.25);
        }
        .btn-action {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        .table-section {
            padding: 0;
        }
        .custom-table {
            margin: 0;
            border: none;
        }
        .custom-table thead th {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #495057;
            font-weight: 700;
            border: none;
            padding: 1.25rem 1rem;
            vertical-align: middle;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
        }
        .custom-table tbody td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border-top: 1px solid #f1f3f4;
            font-size: 0.95rem;
        }
        .custom-table tbody tr:hover {
            background-color: #f8f9ff;
            transform: scale(1.002);
            transition: all 0.3s ease;
        }
        .book-cover {
            width: 60px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .no-cover {
            width: 50px;
            height: 65px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1976d2;
            font-size: 1.5rem;
        }
        .genre-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .condition-badge {
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .condition-new { background: #d4edda; color: #155724; }
        .condition-like-new { background: #d1ecf1; color: #0c5460; }
        .condition-good { background: #fff3cd; color: #856404; }
        .condition-fair { background: #f8d7da; color: #721c24; }
        .condition-poor { background: #f5c6cb; color: #721c24; }
        
        .genre-fiction { background: #e1f5fe; color: #01579b; }
        .genre-non-fiction { background: #f3e5f5; color: #4a148c; }
        .genre-science { background: #e8f5e8; color: #1b5e20; }
        .genre-technology { background: #fff3e0; color: #e65100; }
        .genre-history { background: #fce4ec; color: #880e4f; }
        .genre-biography { background: #f1f8e9; color: #33691e; }
        .genre-mystery { background: #efebe9; color: #3e2723; }
        .genre-romance { background: #fde2e7; color: #ad1457; }
        .genre-fantasy { background: #e8eaf6; color: #283593; }
        .genre-sci-fi { background: #e0f2f1; color: #00695c; }
        .genre-self-help { background: #fff8e1; color: #f57f17; }
        .genre-education { background: #e3f2fd; color: #1565c0; }
        .genre-other { background: #f5f5f5; color: #616161; }

        .action-buttons {
            display: flex;
            gap: 5px;
        }
        .btn-sm-action {
            padding: 6px 10px;
            font-size: 0.8rem;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-edit {
            background: #17a2b8;
            color: white;
        }
        .btn-edit:hover {
            background: #138496;
            transform: translateY(-1px);
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-1px);
        }
        .stats-cards {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .stat-card {
            flex: 1;
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            border-left: 4px solid;
        }
        .stat-card.books { border-left-color: #4facfe; }
        .stat-card.authors { border-left-color: #00f2fe; }
        .stat-card.genres { border-left-color: #667eea; }
        .stat-card h3 {
            margin: 0;
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 700;
        }
        .stat-card p {
            margin: 0.5rem 0 0 0;
            color: #6c757d;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .pagination-wrapper {
            padding: 2rem;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
        .table-responsive {
            border-radius: 0;
        }
        @media (max-width: 768px) {
            .controls-section {
                padding: 1rem;
            }
            .stats-cards {
                flex-direction: column;
            }
            .custom-table thead th,
            .custom-table tbody td {
                padding: 0.75rem 0.5rem;
                font-size: 0.8rem;
            }
            .book-cover, .no-cover {
                width: 35px;
                height: 45px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="container-fluid">
            <div class="content-card">
                <!-- Header -->
                <div class="header-section">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2><i class="fas fa-books"></i> Book Collection</h2>
                        <button class="btn btn-light btn-action">
                            <i class="fas fa-plus me-2"></i><a href="{{ route('usercreate') }}" > Add New Book </a>
                        </button>
                    </div>
                </div>


                <!-- Books Table -->
                <div class="table-section">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Genre</th>
                                    <th>Year</th>
                                    <th>Pages</th>
                                    <th>Condition</th>
                                    <th>Language</th>
                                    <th>ISBN</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                            <td>
                               <div class="book-cover">
                                @if ($task->coverImage)
                                   <img src="{{ asset('storage/covers/' . $task->coverImage->image_path) }}" alt="Cover">
                                @else
                                   <div class="no-cover">
                                   <i class="fas fa-image"></i>
                                </div>
                                @endif
                                </div>
                            </td>

                                    <td>
                                        <strong>{{ $task->book_title }}</strong><br>
                                        <small class="text-muted">{{ Str::limit($task->description, 60) }}</small>
                                    </td>
                                    <td>{{ $task->author }}</td>
                                    <td>
                                        <span class="badge genre-badge genre-{{ Str::slug($task->genre) }}">{{ $task->genre }}</span>
                                    </td>
                                    <td>{{ $task->publication_year }}</td>
                                    <td>{{ $task->pages }}</td>
                                    <td>
                                        <span class="badge condition-badge condition-{{ Str::slug($task->condition) }}">{{ ucfirst($task->condition) }}</span>
                                    </td>
                                    <td>{{ $task->language }}</td>
                                    <td><code>{{ $task->isbn }}</code></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('useredit', $task->id) }}" class="btn btn-sm-action btn-edit" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('userdelete', $task->id) }}" class="btn btn-sm-action btn-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this book?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    <nav aria-label="Books pagination">
                        <ul class="pagination pagination-sm justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>