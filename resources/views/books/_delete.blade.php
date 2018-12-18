<div class="modal fade" id="myModal{{$chapter->id}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete chapter {{$chapter->name}}?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" data-url='/books/{{$book->id}}/chapters/{{$chapter->id}}' class='submitdeleteform'>                    
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-default">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>