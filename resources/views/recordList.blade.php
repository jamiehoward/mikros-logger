<!DOCTYPE html>
<html>
<head>
    <title>Mikros Logger</title>
    <link rel="stylesheet" href="/assets/css/foundation.min.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>{{ $project->name }}</h1>
        </div>

        <div class="row">
            <table class="table">
                @forelse ($project->records as $record)
                <tr>
                    <td>{{ $record->created_at }}</td>
                    <td>{{ $record->data }}</td>
                </tr>
                @empty
                    <h4 class="info">No records submitted</h4>
                @endforelse
            </table>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/foundation.min.js"></script>
</body>
</html>