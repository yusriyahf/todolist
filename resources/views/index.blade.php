<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- MetroUI -->
    <!-- <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>TDL</title>

    <script>
        function openModalDelete(id) {
            $(".addform").attr('action', '/task/' + id)
        }
    </script>
</head>

<body>

    <div class="container position-relative">
        <div class="header mt-4">
            <div class="row">
                <div class="col-lg-6 col-10 mb-3">
                    <h2>Hey Yusriyah</h2>
                </div>
                <div class="col-lg-1 col-2">
                    <img src="img/001.jpeg" class="rounded-circle float-end" alt="...">
                </div>
                <div class="col-lg-5 col-12">
                    <input autocomplete="off" class="form-control me-2" id="searchInput" type="text" data-role="input" data-search-button-click="custom" data-on-search-button-click="search()">
                </div>
            </div>
        </div>
        <div class="sub-header mt-2">
            <div class="row">
                <div class="col-lg-8 col-md-12 mt-2">
                    <p>Click + New To create new list and wait for project manager card. Don't Create a card by yourself to
                        manage a good colaboration.</p>
                </div>
            </div>
            <div class="row mt-2 filter-button-group">
                <div class="col-md-2 col-6 mb-3">
                    <button class="filter" data-filter="*" onclick="myfunc()" id="btn0">
                        <h1>All</h1>
                    </button>
                </div>
                <div class="col-md-2 col-6 mb-3">
                    <button class="filter" data-filter=" .Game">
                        <h1>Game</h1>
                    </button>
                </div>
                <div class="col-md-2 col-6 mb-3">
                    <button class="filter" data-filter=".School">
                        <h1>School</h1>
                    </button>
                </div>
                <div class="col-md-2 col-6 mb-3">
                    <button class="filter" data-filter=".Birthday">
                        <h1>Birthday</h1>
                    </button>
                </div>
                <div class="col-md-2 col-6">
                    <button class="filter" data-filter=".Party">
                        <h1>Meeting</h1>
                    </button>
                </div>
                <div class="col-md-2 col-6">
                    <button class="filter" data-filter=".Done">
                        <h1>Done</h1>
                    </button>
                </div>

            </div>
        </div>

        <div class="content mt-3">
            <div class="row grid" id="task-list">
                @if (!empty($tasks))
                @foreach ($tasks as $task)
                @if ($task->isDeleted == FALSE)
                <div class="col-lg-4 col-md-6 isotope-item {{ $task->category }}">
                    <div class="card list-item ({{ strtolower($task->title) }})">
                        <div class="card-body">
                            <div class="menu">
                                <div class="abc">
                                    <button class="rounded-circle">
                                        @if ($task->category == 'Game')
                                        <img src="icon/console.png" alt="">
                                        @elseif ($task->category == 'School')
                                        <img src="icon/school.png" alt="">
                                        @elseif ($task->category == 'Birthday')
                                        <img style="margin-right: -6px;" src="icon/birthday.png" alt="">
                                        @elseif ($task->category == 'Meeting')
                                        <img src="icon/meeting.png">
                                        @endif
                                    </button>
                                </div>
                                <h5 class="card-title text-lowercase">{{ $task->title }}</h5>
                                <p class="card-text text-lowercase">{{ $task->description }}</p>
                                <a href="#" class="btn btn-dark"><i class="far fa-clock"></i> {{ date_format(new DateTime($task->end_date), 'd/m/Y') }}
                                </a>
                                <button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete"><img src="icon/done black.png" alt=""></button>
                                <button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="openModalDelete" ({{ $task }})">
                                    <img src="icon/bin black.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endif

            </div>
            <ul id="pagin"></ul>
        </div>

        <!-- Modal Delete -->
        <div class="modal-popup-delete">
            <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="menu">
                                <h3>Are you sure you want to delete it!!</h3>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form class="addform" action="/task/{{ $task->id }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-dark">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="add-modal">
            <!-- Button trigger modal -->
            <div class="trigger-modal">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="icon/plus white.png" alt="">
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create new task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/someurl" method="post" class="modal-body">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="title" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Tap to add description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="category" class="form-select" aria-label="Default select example">
                                    <option selected>Select Category</option>
                                    <option value="Game">Game</option>
                                    <option value="School">School</option>
                                    <option value="Birthday">Birthday</option>
                                    <option value="Meeting">Meeting</option>
                                </select>
                            </div>
                            <div class="form-date">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                                            <input name="start_date" type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">End Date</label>
                                            <input name="end_date" type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-dark">Save Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- isotope -->
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

        <script>
            var $grid = $('.grid').isotope({
                // options
                itemSelector: '.isotope-item',
            });
            // filter items on button click
            $('.filter-button-group').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
        </script>

        <script src="js/main.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script>
            searchPagination();

            function searchPagination() {
                pageSize = 5;

                var pageCount = $(".isotope-item").length / pageSize;

                $("#pagin").html('');
                for (var i = 0; i < pageCount; i++) {

                    $("#pagin").append('<li><a style="cursor: pointer;">' + (i + 1) + '</a></li> ');
                }
                $("#pagin li").first().find("a").addClass("current");

                showPage = function(page) {
                    $(".isotope-item").hide();
                    $(".isotope-item").each(function(n) {
                        if (n >= pageSize * (page - 1) && n < pageSize * page)
                            $(this).show();
                    });
                }

                showPage(1);

                $("#pagin li a").click(function() {
                    $("#pagin li a").removeClass("current");
                    $(this).addClass("current");

                    showPage(parseInt($(this).text()))
                });
            }
        </script>
</body>

</html>