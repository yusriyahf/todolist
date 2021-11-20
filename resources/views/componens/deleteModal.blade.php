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
