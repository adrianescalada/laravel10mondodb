<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Character Finder</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="card-body">
                        <nav class="navbar navbar-light bg-light shadow p-3 mb-1 rounded">
                            <strong><a href="/" class="navbar-brand">Character Finder</a></strong>
                        </nav>
                    </div>

                    {{ Form::open(['route' => 'index', 'method' => 'GET', 'class' => 'form-inline']) }}
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="campo1">Name</label>
                                    {{ Form::text('name', $name, ['id' => 'autocompleteName', 'class' => 'form-control', 'placeholder' => 'Name']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="campo2">House</label>
                                    {{ Form::text('house', $house, ['id' => 'autocompleteHouse', 'class' => 'form-control', 'placeholder' => 'House']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{ Form::close() }}

                    <div class="row mt-5">
                        <p>Showing {{ $characters->count() }} of {{ $characters->total() }} results.</p>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <a
                                            href="{{ route('index', ['sort_by' => 'name', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">Name</a>
                                    </th>
                                    <th>
                                        <a
                                            href="{{ route('index', ['sort_by' => 'house', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">House</a>
                                    </th>
                                    <th>Age</th>
                                    <th>
                                        <a
                                            href="{{ route('index', ['sort_by' => 'image', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">Image</a>
                                    </th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($characters) <= 0)
                                    <tr>
                                        <td colspan="8">There are no records</td>
                                    </tr>
                                @else
                                    @foreach ($characters as $character)
                                        <tr>
                                            <td>{{ $character->name }}</td>
                                            <td>{{ $character->house }}</td>
                                            @php
                                                $currentYear = date('Y');
                                                $age = $character->yearOfBirth ? $currentYear - $character->yearOfBirth : '-';
                                            @endphp
                                            <td>{{ $age }}</td>
                                            <td>
                                                @if ($character->image)
                                                    <img style="width: 70px;" src="{{ $character->image }}"
                                                        class="rounded mx-auto d-block" alt="{{ $character->name }}">
                                                @else
                                                    <img style="width: 100px;" src="https://placehold.co/200x200"
                                                        class="rounded mx-auto d-block" alt="{{ $character->name }}">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('characters.show', [$character->_id]) }}"
                                                        class="btn btn-xs btn-secondary">Show</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if (isset($characters))
                            <div class="d-flex">
                                {{ $characters->appends(['name' => $name, 'house' => $house])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script>
        function initializeAutocomplete(selector, route) {
            $(selector).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: route,
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            response(data);
                        }
                    });
                },
                minLength: 2
            });
        }
        var autocompleteNameRoute = "{{ route('search.autocomplete.name') }}";
        var autocompleteHouseRoute = "{{ route('search.autocomplete.house') }}";

        initializeAutocomplete("#autocompleteName", autocompleteNameRoute);
        initializeAutocomplete("#autocompleteHouse", autocompleteHouseRoute);
    </script>


</body>

</html>
