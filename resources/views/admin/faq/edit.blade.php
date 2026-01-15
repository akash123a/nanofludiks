@extends('admin.layout.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit FAQ</h5>
                <a href="{{ route('faq.index') }}" class="btn btn-sm btn-danger">✕</a>
            </div>

            <div class="card-body">
                <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Question</label>
                        <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Answer</label>
                        <textarea name="answer" class="form-control" rows="4" required>{{ $faq->answer }}</textarea>
                    </div>

                    <button class="btn btn-primary">Update FAQ</button>
                </form>
            </div>
        </div>

    </div>
@endsection
