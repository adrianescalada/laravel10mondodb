<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Character Finder</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {{-- buscador --}}
                    <div class="card-body">
                        <nav class="navbar navbar-light bg-light shadow p-3 mb-1 rounded">
                            <strong><a href="/" class="navbar-brand">Character Finder</a></strong>
                        </nav>
                    </div>

                    <div class="container my-5">
                        <div style="max-width: 700px; top: -80px;" class="mx-auto text-secondary">
                            <div>
                                <small>
                                    <a href="{{ route('index') }}" class="text-primary">Return</a>
                                </small>
                            </div>
                            <h1 class="font-weight-bold text-dark">{{ $character->name }} </h1>
                            <h3 class="font-weight-bold text-dark">{{ $character->actor }} </h3>
                            <p class="my-2" style="line-height: 2;">
                                @php
                                    $rolesArray = json_decode($character->alternate_names, true);
                                    echo implode(', ', $rolesArray);
                                @endphp

                            <div class="my-3 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    @if ($character->image)
                                        <img style="width: 100px;" src="{{ $character->image }}"
                                            class="rounded mx-auto d-block" alt="{{ $character->name }}">
                                    @else
                                        <img style="width: 100px;" src="https://placehold.co/200x200"
                                            class="rounded mx-auto d-block" alt="{{ $character->name }}">
                                    @endif
                                    <ul class="ml-2">
                                        <li>Species: {{ $character->species }}</li>
                                        <li>Gender: {{ $character->gender }}</li>
                                        <li>House: {{ $character->house }}</li>
                                        <li>Date O fBirth: {{ $character->dateOfBirth }}</li>
                                        <li>Year Of Birth: {{ $character->yearOfBirth }}</li>
                                        <li>Ancestry: {{ $character->ancestry }}</li>
                                        <li>Hair Colour: {{ $character->hairColour }}</li>
                                        <li>Patronus: {{ $character->patronus }}</li>
                                        <li>Actor: {{ $character->actor }}</li>

                                    </ul>
                                </div>
                                <div class="text-primary">


                                </div>
                            </div>
                        </div>
                        @if ($character->image)
                            <img src="{{ $character->image }}" class="w-100 my-3" alt="{{ $character->name }}">
                        @else
                            <img src="https://placehold.co/200x200" class="w-100 my-3" alt="{{ $character->name }}">
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

</body>

</html>
