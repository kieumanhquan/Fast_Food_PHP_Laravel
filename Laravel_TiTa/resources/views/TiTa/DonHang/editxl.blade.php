<div class="modal fade" id="xuly-update" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Handling</h4>
            </div>
            <form action="{{ URL::to('Admin/donhang/detailxuly') }}" method="POST" id="xuly-update1">
                <div class="modal-body">
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="diachikh_id" class="form-control" id="diachikh_id">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <label>Nhân Viên</label>
                            <select class="form-control" id="nhanvien_id" name="nhanvien_id">
                                @foreach($nhanvien as $key => $namenhanvien)
                                    <option value="{{ $key }}">{{ $namenhanvien }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <label>Tình Trạng</label>
                            <select class="form-control" id="tinhtrang" name="tinhtrang">
                                <option value="1">Chưa Giao</option>
                                <option value="2">Đã Giao</option>
                                <option value="3">Huỷ Giao</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="tongtien" class="form-control" id="tongtien">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="ghichu" class="form-control" id="ghichu">
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