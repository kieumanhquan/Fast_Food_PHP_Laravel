@extends('TiTa.master')
@section('content')
@section('acction','Sale Menu')
@include('TiTa.Sale.add')
@include('TiTa.Sale.edit')
<div class="row mt">
    <div class="col-md-12">
        <section class="task-panel tasks-widget">
            <div class="panel-heading">
                <div class="pull-left"><h5><i class="fa fa-tasks"></i>  Sale - Menu</h5></div>
                <br>
            </div>
            <div class="panel-body">
                <div class="task-content">
                    <ul class="task-list" id="loadgiam">

                    </ul>
                </div>

                <div class=" add-task-row">
                    <a class="btn btn-success btn-sm pull-left" data-toggle="modal" data-target="#myModal" href="">Add Sale</a>
                    <a class="btn btn-default btn-sm pull-right" id="read-data" href="#">Loading</a>
                </div>
            </div>
        </section>
    </div><!-- /col-md-12-->
</div><!-- /row -->
@endsection()
@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#read-data').on('click',function () {
            $.get("{{ URL::to('Admin/menu/sale/data') }}",function (data) {
                $('#loadgiam').empty().html(data);
            })
        })

        $('#insertsale').on('submit',function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            var post = $(this).attr('method');
            $.ajax({
                type : post,
                url : url,
                data : data,
                dataTy : 'json',
                success:function (data) {
                    console.log(data)
                }
            })
        });
        $(document).on('click','#del',function (e) {
            var id=$(this).data('id');
            $.post('{{URL::to("Admin/menu/destroy")}}',{id:id},function (data) {
                $('#loadgiam #'+id).remove();
                console.log(data)
            })
        });

        $('body').delegate('#loadgiam #edit','click',function (e) {
            var id = $(this).data('id');
            $.get("{{ URL::to('Admin/menu/saleedit') }}",{id:id},function (data) {
                $('#sale-update').find('#menu_id').val(data.menu_id)
                $('#sale-update').find('#phantram').val(data.phantram)
                $('#sale-update').find('#id').val(data.id)
                $('#updatesale').modal('show');
            })
        })

        $('#sale-update').on('submit',function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            $.post(url,data,function (data) {
                console.log(data)
            })
        })


    </script>
@endsection
