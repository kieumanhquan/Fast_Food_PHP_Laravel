<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Detail</h4>
            </div>
            <form action="{{ URL::to('Admin/menu/saleadd') }}" method="POST" id="insertsale">
                <div class="modal-body">
                    <div class="col-4-md">
                        <div class="form-group">
                            <label>Menu</label>
                            <select class="form-control" id="menu_id" name="menu_id">
                                <option value="">-----</option>
                                @foreach($menu as $key => $spmenu)
                                    <option value="{{ $key }}">{{ $spmenu }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <label>Giảm giá</label>
                            <input type="text" name="phantram" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success pull-left"  value="Save">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>