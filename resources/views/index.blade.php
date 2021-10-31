<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>TDL</title>
  </head>
  <body>

    <div class="container">
      <div class="header mt-4">
        <div class="row">
          <div class="col-md-6">
            <h2>Hey Yusriyah</h2> 
          </div>
          <div class="col-md-6">
            <img src="img/001.jpeg" class="rounded-circle float-end" alt="...">
            <button class="float-end rounded-circle"><img src="icon/search.png" alt=""></button>
            <button class="float-end rounded-circle"><img src="icon/notif.png" alt=""></button>
          </div>
        </div>
      </div>
      <div class="sub-header mt-2">
        <div class="row">
          <div class="col-md-8">
            <p>Click + New To create new list and wait for project manager card. Don't Create a card by yourself to manage a good colaboration.</p>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-4">
            <div class="filter active">
              <h1>Next Up</h1>
            </div>
          </div>
          <div class="col-md-4">
            <div class="filter">
              <h1>In Progress</h1>
            </div>
          </div>
          <div class="col-md-4">
            <div class="filter">
              <h1>Complete</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content mt-3">
        <div class="row">
          @if (!empty($tasks))
          @foreach ($tasks as $task)
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="abc">
                <button class="rounded-circle"><img src="icon/console.png" alt=""></button>
              </div>
              <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                <a href="#" class="btn btn-dark"><i class="far fa-clock"></i> {{ $task->created_at }}</a>
                <button class="float-end rounded-circle"><img src="icon/done black.png" alt=""></button>
                <button class="float-end rounded-circle"><img src="icon/bin black.png" alt=""></button>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          
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
              <div class="modal-body">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Title</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                  <label for="floatingTextarea">Tap to add description</label>
                </div>
                <div class="form-date">
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-dark">Save Task</button>
              </div>           
            </div>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
