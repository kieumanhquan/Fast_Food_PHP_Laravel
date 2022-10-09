<div class="modal fade" id="xuly-update" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Handling</h4>
            </div>
            <form action="{{ URL::to('Admin/khohang/editkhoton') }}" method="POST" id="xuly-update1">
                <div class="modal-body">
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="text" name="sanphamkho" class="form-control" id="sanphamkho">
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
                            <label>Số Lượng</label>
                            <input type="number" name="soluong" class="form-control" id="soluong">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="text" name="giasanpham" class="form-control" id="giasanpham">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="tongtienkho" class="form-control" id="tongtienkho">
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
