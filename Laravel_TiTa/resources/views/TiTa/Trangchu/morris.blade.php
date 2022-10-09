@extends('TiTa.master')
@section('content')
    <div id="morris">
        <div class="row mt">
            <div class="col-lg-6">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> WareHouse</h4>
                    <div class="panel-body">
                        <div id="hero-graph" class="graph">
                            <table class="table table-hover">
	                  	  	  <hr>
	                              <thead>
	                              <tr>
	                                  <th>ID</th>
	                                  <th>Name</th>
	                                  <th>Amount</th>
	                                  <th>Money</th>
									  <th>All Money</th>
									  {{-- <th>Employees</th> --}}
									  {{-- <th>Date</th> --}}
	                              </tr>
	                              </thead>
								@foreach( $khohang as $item)
	                              <tbody>
	                              <tr>
	                                  <td>{{ $item->id }}</td>
									  <td><span class="label label-warning label-mini">{{ $item->sanphamkho }}</span></td>
	                                  <td>{{ $item->soluong }}</td>
	                                  <td>{{ number_format($item->giasanpham) }}.VNĐ</td>
									  <td>{{ number_format($item->tongtienkho) }}.VNĐ</td>
									  {{--<td><span class="label label-info label-mini">{{ $item->name }}</span></td>--}}
									  {{-- <td>{!! date('Y-m-d',strtotime($item["created_at"])) !!}</td> --}}
	                              </tr>
	                              </tbody>
								@endforeach
	                          </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> Warehouse Details </h4>
                    <div class="panel-body">
                        <div id="hero-bar" class="graph">
                            <table class="table table-hover">
	                  	  	  <hr>
	                              <thead>
	                              <tr>
	                                  <th>ID</th>
									  <th>Menu</th>
									  <th>Warehouse</th>
	                                  <th>Amount</th>
	                                  <th>Import prices</th>
									  <th>Date</th>
	                              </tr>
	                              </thead>
								@foreach($detailkhohang as $item)
	                              <tbody>
	                              <tr>
	                                  <td>{{ $item->id }}</td>
									  <td><span class="label label-warning label-mini">{{ $item->tensp }}</span></td>
									  <td><span class="label label-success label-mini">{{ $item->sanphamkho }}</span></td>
	                                  <td>{{ $item->soluong }}</td>
	                                  <td>{{ number_format($item->gianhap) }}.VNĐ</td>
									  <td>{{ date('Y-m-d',strtotime($item->created_at)) }}</td>
	                              </tr>
	                              </tbody>
								@endforeach
	                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt">
            <div class="col-lg-6">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> Menus</h4>
                    <div class="panel-body">
                        <div id="hero-area" class="graph">
                            <table class="table table-hover">
	                  	  	  <hr>
	                              <thead>
	                              <tr>
	                                  {{-- <th>#</th> --}}
	                                  <th>Menu</th>
	                                  <th>Category</th>
	                                  <th>Giá Cũ</th>
                									  <th>Giá Mới</th>
                									  <th>Date</th>
	                              </tr>
	                              </thead>
								@foreach( $menu as $item)
	                              <tbody>
	                              <tr>
	                                  {{-- <td>{{ $item->id }}</td> --}}
									  <td><span class="label label-warning label-mini">{{ $item->tensp }}</span></td>
									  <td><span class="label label-success label-mini">{{ $item->tendanhmuc }}</span></td>
	                                  <td>{{ number_format($item->giaold) }}.VNĐ</td>
									  <td>{{ number_format($item->gianew) }}.VNĐ</td>
	                                  <td>{{ date('Y-m-d',strtotime($item->created_at)) }}</td>
	                              </tr>
	                              </tbody>
								@endforeach
	                          </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> Sale</h4>
                    <div class="panel-body">
                        <div id="hero-donut" class="graph">
                            <table class="table table-hover">
	                  	  	  <hr>
	                              <thead>
	                              <tr>
	                                  <th>ID</th>
	                                  <th>Menu</th>
	                                  <th>Sale Off</th>
									  <th>Date</th>
	                              </tr>
	                              </thead>
								@foreach( $sale as $item )
	                              <tbody>
	                              <tr>
	                                  <td>{{ $item->id }}</td>
									  <td><span class="label label-warning label-mini">{{ $item->tensp }}</span></td>
									  <td><span class="badge bg-important">{{ $item->phantram }}%</span></td>
	                                  <td>{{ date('Y-m-d',strtotime($item->updated_at)) }}</td>
	                              </tr>
	                              </tbody>
								@endforeach
	                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
