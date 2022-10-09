@extends('TiTa.master')
@section('content')
@section('acction','Search Clients')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <form method="GET" id="frmsearch" class="form-horizontal">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Search by ID">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Search</button>
                    </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div  class="panel-body">
    <table class="table table-striped table-advance table-hover">
        <hr>
        <thead>
        <tr>
            <th><i class="fa fa-bullhorn"></i> STT</th>
            <th class="hidden-phone"><i class="fa li_calendar"></i> Họ Tên</th>
            <th><i class="fa li_note"></i> PhoneNumber</th>
            <th><i class="fa  li_data"></i> Email</th>
            <th><i class="fa li_banknote"></i> Address</th>
            <th><i class=" fa li_calendar"></i> Maps</th>
            <th><i class=" fa li_calendar"></i> Time</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($data as $key => $item)
            <?php $stt= $stt+1 ?>
            <tr>
                <td>{!! $stt !!}</td>
                <td class="hidden-phone">{{ $item->hoten }}</td>
                <td class="hidden-phone">{{ $item->sdt }}</td>
                <td class="hidden-phone">{{ $item->email }}</td>
                <td class="hidden-phone">{{ $item->diachi }}</td>
                <td class="hidden-phone">{{ $item->maps }}</td>
                <td>
                    {!! \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
