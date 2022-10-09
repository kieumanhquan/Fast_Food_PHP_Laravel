@extends('TiTa.master')
@section('content')
@section('acction','Quản Lý')
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <b>Oh snap ! </b> {!! $error !!} .<br>
        @endforeach
    </div>
@endif
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4> Nhân viên Table</h4>
                <hr>
                <thead>
                <tr>
                    <th><i class="fa fa-bullhorn"></i> STT</th>
                    <th class="hidden-phone"><i class="fa li_user"></i> Name</th>
                    <th><i class="li_study"></i> Position</th>
                    <th><i class="li_study"></i> Position</th>
                    <th><i class=" fa li_calendar"></i> Thời gian</th>
                    <th><a class="btn btn-success btn-sm pull-left" href="{!! route('themnhanvien') !!}">Add New</a></th>
                    <th><a class="btn btn-info btn-sm pull-left" id="read-data">Loading</a></th>
                </tr>
                </thead>
                <tbody id="std-info">

                </tbody>
            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
<script src="{{url('TiTa/javacripnew/jquery.min.js')}}"></script>
<script src="{{url('TiTa/javacripnew/mindmup-editabletable.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#read-data').on('click',function () {
        $.get("{{ URL::to('Admin/nhanvien/read-data') }}",function (data) {
            $('#std-info').empty().html(data)
        })
    })
    $('#frm-insert').on('submit',function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var post = $(this).attr('method');
        $.ajax({
            type : post,
            url : url,
            data : data,
            dataTy :'json',
            success:function (data) {
                var tr = $('<tr/>',{
                    id : data.id
                });
                tr.append($("<td/>",{
                    text: data.id
                })).append($("<td/>",{
                    text: data.name
                })).append($("<td/>",{
                    text: data.keywords
                })).append($("<td/>",{
                    html :
                    '<a href="#" class="btn btn-info btn-xs" id="view" data-id="'+ data.id +'">View</a> ' +
                    '<a href="#" class="btn btn-success btn-xs" id="edit" data-id="'+ data.id +'">Edit</a> ' +
                    '<a href="#" class="btn btn-danger btn-xs" id="del" data-id="'+ data.id +'">Delete</a> '
                }))
                $('#std-info').append(tr);
            }
        })
    })

    $('body').on('click', '#submitForm', function(){
        var registerForm = $("#Register");
        var formData = registerForm.serialize();
        $( '#name-error' ).html( "" );
        $( '#email-error' ).html( "" );
        $( '#password-error' ).html( "" );

        $.ajax({
            url:'/Nhanvien/Add',
            type:'POST',
            data:formData,
            success:function(data) {
                console.log(data);
                if(data.errors) {
                    if(data.errors.name){
                        $( '#name-error' ).html( data.errors.name[0] );
                    }
                    if(data.errors.email){
                        $( '#email-error' ).html( data.errors.email[0] );
                    }
                    if(data.errors.password){
                        $( '#password-error' ).html( data.errors.password[0] );
                    }
                }
                if(data.success) {
                    $('#success-msg').removeClass('hide');
                    setInterval(function(){
                        $('#SignUp').modal('hide');
                        $('#success-msg').addClass('hide');
                    }, 3000);
                }
            },
        });
    });


</script>

@endsection()
