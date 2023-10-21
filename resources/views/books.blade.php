<div class="container">
    <h1 class="text-center mt-5">List of Books</h1>
    
    <button class="btn btn-success mt-4" data-toggle="modal" data-target="#createModal">Create New Book</button>

    <div class="row mt-4">
        @foreach($books as $book)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="book_cover.jpg" alt="Book Cover" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">Author: {{ $book->author }}</p>
                        <p class="card-text">Year: {{ $book->publication_year }}</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{ $book->id }}">
                            Update
                        </button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $book->id }}">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Update Modals -->
@foreach($books as $book)
    <div class="modal fade" id="updateModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModal{{ $book->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModal{{ $book->id }}Label">Update Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add form fields for updating the book here -->
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Delete Modals -->
@foreach($books as $book)
    <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $book->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to delete this book?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteBook{{ $book->id }}">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create New Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                    <div class="form-group">
                        <label for="publication_year">Publication Year</label>
                        <input type="number" class="form-control" id="publication_year" name="publication_year">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
