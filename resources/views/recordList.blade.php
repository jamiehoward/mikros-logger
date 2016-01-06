<!DOCTYPE html>
<html>
<head>
    <title>Mikros Logger</title>
    <link rel="stylesheet" href="/assets/css/foundation.min.css" />
    <link rel="stylesheet" href="/assets/css/jquery.dataTables.min.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>{{ $project->name }}</h1>
        </div>

        <div class="row">
            <table class="table display" id="record-list-table">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($project->records as $record)
                    <tr>
                        <td>{{ $record->created_at }}</td>
                        <td>{{ $record->data }}</td>
                    </tr>
                    @empty
                        <h4 class="info">No records submitted</h4>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/foundation.min.js"></script>
    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function(){
            $("#record-list-table").DataTable();
        })
    </script>
</body>
</html>