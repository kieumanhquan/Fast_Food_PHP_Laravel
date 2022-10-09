@extends('TiTa.master')
@section('content')
@section('acction','Menu - Thực đơn')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            @include('TiTa.Menu.Page')
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
@endsection()
@section('script')
    <script type="text/javascript">
        $(document).on('click','.pagination a',function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            readPage(page)
        })

        function readPage(page) {
            $.ajax({
                url: '/Admin/menu/pagea?page='+page
            }).done(function (data) {
                $('.content-panel').html(data)
            })
        }


    </script>
@endsection