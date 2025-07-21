<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .form-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        .form-header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            text-align: center;
            padding: 2rem;
            border-radius: 20px 20px 0 0;
        }
        .form-header h2 {
            margin: 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .form-body {
            padding: 2.5rem;
        }
        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid #e3f2fd;
            padding: 12px 16px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4facfe;
            box-shadow: 0 0 0 0.2rem rgba(79, 172, 254, 0.25);
            transform: translateY(-2px);
        }
        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        }
        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e3f2fd;
            border-radius: 12px 0 0 12px;
            color: #667eea;
        }
        .form-control.with-icon {
            border-radius: 0 12px 12px 0;
        }
        .row.g-3 {
            margin-bottom: 1rem;
        }
        .alert {
            border-radius: 12px;
            border: none;
            font-weight: 500;
        }
        .form-text {
            color: #6c757d;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="form-card">
                        <div class="form-header">
                            <h2><i class="fas fa-book"></i> Book Management System</h2>
                            <p class="mb-0">Add or Edit Book Information</p>
                        </div>
                        <div class="form-body">
                            <form id="bookForm" action="{{ route('userupdate',$task->id) }} " method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label for="bookTitle" class="form-label">
                                            <i class="fas fa-heading text-primary me-2"></i>Book Title *
                                        </label>
                                        <input type="text" class="form-control" id="bookTitle" name="book_title" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="isbn" class="form-label">
                                            <i class="fas fa-barcode text-primary me-2"></i>ISBN
                                        </label>
                                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="978-0-123456-78-9">
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="author" class="form-label">
                                            <i class="fas fa-user-edit text-primary me-2"></i>Author *
                                        </label>
                                        <input type="text" class="form-control" id="author" name="author" required>
                                    </div>
                                                                       <div class="col-md-4">
                                        <label for="publicationYear" class="form-label">
                                            <i class="fas fa-calendar-alt text-primary me-2"></i>Publication Year
                                        </label>
                                        <input type="number" class="form-control" id="publicationYear" name="publication_year" min="1800" max="2025">
                                    </div>
                                </div>

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="genre" class="form-label">
                                            <i class="fas fa-tags text-primary me-2"></i>Genre
                                        </label>
                                        <select class="form-select" id="genre" name="genre">
                                            <option value="">Select Genre</option>
                                            <option value="fiction">Fiction</option>
                                            <option value="non-fiction">Non-Fiction</option>
                                            <option value="science">Science</option>
                                            <option value="technology">Technology</option>
                                            <option value="history">History</option>
                                            <option value="biography">Biography</option>
                                            <option value="mystery">Mystery</option>
                                            <option value="romance">Romance</option>
                                            <option value="fantasy">Fantasy</option>
                                            <option value="sci-fi">Science Fiction</option>
                                            <option value="self-help">Self Help</option>
                                            <option value="education">Education</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pages" class="form-label">
                                            <i class="fas fa-file-alt text-primary me-2"></i>Number of Pages
                                        </label>
                                        <input type="number" class="form-control" id="pages" name="pages" min="1">
                                    </div>
                                                                        <div class="col-md-6">
                                        <label for="language" class="form-label">
                                            <i class="fas fa-language text-primary me-2"></i>Language
                                        </label>
                                        <select class="form-select" id="language" name="language">
                                            <option value="">Select Language</option>
                                            <option value="english">English</option>
                                            <option value="spanish">Spanish</option>
                                            <option value="french">French</option>
                                            <option value="german">German</option>
                                            <option value="italian">Italian</option>
                                            <option value="portuguese">Portuguese</option>
                                            <option value="russian">Russian</option>
                                            <option value="chinese">Chinese</option>
                                            <option value="japanese">Japanese</option>
                                            <option value="arabic">Arabic</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="condition" class="form-label">
                                            <i class="fas fa-star text-primary me-2"></i>Condition
                                        </label>
                                        <select class="form-select" id="condition" name="condition">
                                            <option value="">Select Condition</option>
                                            <option value="new">New</option>
                                            <option value="like-new">Like New</option>
                                            <option value="good">Good</option>
                                            <option value="fair">Fair</option>
                                            <option value="poor">Poor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">
                                        <i class="fas fa-align-left text-primary me-2"></i>Description
                                    </label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter book description, summary, or notes..."></textarea>
                                    <div class="form-text">Optional: Brief description or summary of the book</div>
                                </div>

                                <div class="mb-3">
                                    <label for="coverImage" class="form-label">
                                        <i class="fas fa-image text-primary me-2"></i>Book Cover Image
                                    </label>
                                    <input type="file" class="form-control" id="coverImage" name="cover_image" accept="image/*">
                                    <div class="form-text">Upload book cover image (JPG, PNG, GIF)</div>
                                </div>


                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Book
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Reset form function
        function resetForm() {
            document.getElementById('bookForm').reset();
            document.getElementById('isAvailable').checked = true;
            document.getElementById('stock').value = 0;
            showAlert('Form has been reset.', 'info');
        }

        // Show alert function
        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.innerHTML = `
                <i class="fas fa-info-circle me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            const formBody = document.querySelector('.form-body');
            formBody.insertBefore(alertDiv, formBody.firstChild);
            
            // Auto-dismiss after 5 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
        }

        // Auto-generate ISBN check digit (basic implementation)
        document.getElementById('isbn').addEventListener('blur', function() {
            const isbn = this.value.replace(/[^0-9]/g, '');
            if (isbn.length === 12) {
                // Simple ISBN-13 check digit calculation
                let sum = 0;
                for (let i = 0; i < 12; i++) {
                    sum += parseInt(isbn[i]) * (i % 2 === 0 ? 1 : 3);
                }
                const checkDigit = (10 - (sum % 10)) % 10;
                this.value = isbn.slice(0, 3) + '-' + isbn.slice(3, 4) + '-' + isbn.slice(4, 10) + '-' + isbn.slice(10, 12) + '-' + checkDigit;
            }
        });

    </script>
</body>
</html>