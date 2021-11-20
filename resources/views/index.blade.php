<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    @include('componens.header')

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

        @include("componens.deleteModal")
        @include("componens.fab")

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
