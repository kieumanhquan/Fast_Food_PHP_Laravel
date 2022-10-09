<div class="modal fade" id="getedit" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Sale</h4>
            </div>
            <form action="" method="POST" id="sale-update">
                <div class="modal-body">
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <input type="hidden" name="menu_id" class="form-control" id="menu_id">
                        </div>
                    </div>
                    <div class="col-4-md">
                        <div class="form-group">
                            <label>Giảm Giá</label>
                            <input type="text" name="phantram" class="form-control" id="phantram">
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