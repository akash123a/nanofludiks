<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Position</th>
            <th>Applied At</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($applications as $app)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $app->full_name }}</td>
                <td>{{ $app->email }}</td>
                <td>{{ $app->phone }}</td>
                <td>{{ $app->position }}</td>
                <td>{{ $app->created_at->format('d M Y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-danger">
                    No applications found
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
