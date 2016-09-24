<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Campaign</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{route('post_new_path')}}" method="post" id="campaign-form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Campaign Name</label>

                        <div class="col-sm-8">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Campaign Name"
                                   value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-4 control-label">Campaign Description</label>

                        <div class="col-sm-8">
                            <input name="description" id="description" type="text" class="form-control"
                                   placeholder="Campaign Description" value="{{old('description')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mailing-list" class="col-sm-4 control-label">Mailing List</label>

                        <div class="col-sm-8">
                            <select name="mailingList" id="mailingList" class="form-control">
                                <option>&nbsp;</option>
                                @foreach($mailingList as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="startdate" class="col-sm-4 control-label">Start Date</label>

                        <div class="col-sm-8">
                            <input name="startdate" id="startdate" type="text" class="form-control"
                                   placeholder="Start Date" value="{{old('startdate')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="create">Create Campaign</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>