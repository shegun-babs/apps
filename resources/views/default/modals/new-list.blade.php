<div class="modal fade" id="list-modal" tabindex="-1" role="dialog" aria-labelledby="listModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New List</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{route('post_new_ml_path')}}" method="post" id="list-form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">List Name</label>

                        <div class="col-sm-8">
                            <input name="name" id="name" type="text" class="form-control" placeholder="List Name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-4 control-label">List Description</label>

                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="20" rows="5" class="form-control" placeholder="List Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hidden" class="col-sm-4 control-label">Hidden</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="hidden">
                                <option value="0">Select one</option>
                                <option value="0">Show</option>
                                <option value="1">Hide</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="create">Create List</button>
            </div>
        </div>
    </div>
</div>