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
