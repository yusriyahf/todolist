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
                @if (count($tasks) > 0)
                    @foreach ($tasks as $task)
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
                                        <button class="float-end rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="openModalDelete({{ $task->id }})">
                                            <img src="icon/bin black.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include("componens.deleteModal")

                @else
                    <h1>kosong cok</h1>
                @endif

            </div>
            <button class="btn btn-dark" type="button" id="prev" onclick="loadPrevData()"><< load before</button>
            <button class="btn btn-dark" type="button" id="next" onclick="loadMoreData()">load more >></button>
            <ul id="pagin"></ul>
        </div>

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
            let queryArr = ["page=1", "filter=all", "searchKey="]
            let page = 1
            let urlBase = 'http://localhost:8000/'
            setup()
            function setup() {
                let query = window.location.search
                if (query) {
                    query = query.replace("?", "")
                    query = query.split("&")
                    for (let i = 0; i < query.length; i++) {
                        const element = query[i];
                        if (query[i].includes("page")) {
                            let qVal = query[i].split("=")[1]
                            if (qVal === "1") {
                                document.getElementById("prev").disabled = true
                            }
                            queryArr[0] = query[i]
                        } else if (query[i].includes("filter")) {
                            let qVal = query[i].split("=")[1]
                            if (qVal === "") {
                                document.getElementById("all").classList.add("active")
                            } else {
                                document.getElementById(qVal).classList.add("active")
                            }
                            queryArr[1] = query[i]
                        } else if (query[i].includes("searchKey")) {
                            document.getElementById("searchInput").value = query[i].split("=")[1]
                            queryArr[2] = query[i]
                        }
                    }
                } else{
                    document.getElementById("all").classList.add("active")
                    document.getElementById("prev").disabled = true;
                }
            }

            function loadMoreData() {
                let query = window.location.search
                if (query) {
                    query = query.replace("?", "")
                    query = query.split("=")
                    let page = parseInt(query[1])+ 1
                    queryArr[0] = "page="+page
                    load()
                } else {
                    queryArr[0] = "page=2"
                    load()
                }
            }

            function loadPrevData() {
                let query = window.location.search
                if (query) {
                    query = query.replace("?", "")
                    query = query.split("=")
                    let page = parseInt(query[1])- 1
                    queryArr[0] = "page="+page
                    load()
                } else {
                    queryArr[0] = "page=2"
                    load()
                }
            }

            function search() {
                if (event.keyCode == 13) {
                    let valueSearch = document.getElementById("searchInput").value
                    queryArr[2] = "searchKey="+valueSearch
                    load()
                }
            }

            function filter(key) {
                if (key !== "all") {
                    queryArr[1] = "filter="+key
                } else {
                    queryArr[1] = "filter="
                }
                load()
            }

            function load(){
                console.log(queryArr);
                window.location.href = urlBase+"?"+queryArr.join("&")
            }
        </script>
</body>

</html>
