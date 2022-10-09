<div class="modal fade" id="update" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Detail</h4>
            </div>
            <form action="{{ URL::to('Admin/khohang/detailupdate') }}" method="POST" id="frm-update">
                <div class="modal-body">
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                    </div>
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
                            <label>Kho hàng</label>
                            <select class="form-control" id="khohang_id" name="khohang_id">
                                <option value="">-----</option>
                                @foreach($kho as $key => $khohang)
                                    <option value="{{ $key }}">{{ $khohang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="text" name="soluong" class="form-control" id="soluong">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <label>Đơn giá</label>
                            <input type="text" name="gianhap" class="form-control" id="gianhap">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success pull-left"  value="Update">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>