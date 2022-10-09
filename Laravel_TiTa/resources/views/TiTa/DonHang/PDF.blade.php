<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hambuger TITA</title>
    <link rel="stylesheet" href="{{url('TiTa/Pint/style.css')}}" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{url('TiTa/Pint/img/logo.png')}}">
    </div>
    <h1>HAMBUGER TITA</h1>
    <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>1 Lý Tự Trọng, Quận Hải Châu<br />TP Đà Nẵng</div>
        <div>(+84) 1283743269</div>
        <div><a href="">cuahangtita@gmail.com</a></div>
    </div>
    @foreach($donhang as $item)
    <div id="project">
        <div><span>CLIENT</span> {{$item->hoten}}</div>
        <div><span>ADDRESS</span> {{ $item->diachi }}, <?php $maps=DB::table('maps')->where('id',$item["maps_id"])->first(); echo $maps->maps; ?></div>
        <div><span>EMAIL</span> <a href="">{{ $item->email }}</a></div>
        <div><span>DATE</span> {{ date('d-m-Y',strtotime($item->created_at)) }}</div>
    </div>
    @endforeach
</header>
<main>
    <table>
        <h1>Detail Order</h1>
        <thead>
        <tr>
            <th class="service">MENU</th>
            <th class="desc">Mô Tả</th>
            <th class="desc">Giá Bán</th>
            <th class="desc">Số Lượng</th>
            <th class="desc">Tổng</th>
        </tr>
        </thead>
        <tbody>
        @foreach($donhang as $item)
        <tr>
            <td class="service">
              {{ $item->tensp }}
            </td>
            <td class="desc">
                {!! $item["mota"] !!}
            </td>
            <td class="desc">
                {{ $item->gianew }}.VNĐ
            </td>
            <td class="desc">{{ $item->soluong }}</td>
            <td class="desc">{{ number_format($item->tongtien) }}.VNĐ</td>
        </tr>
        </tbody>
        @endforeach
    </table>
    <table>
        <thead>
        <tr>
            <th class="desc"></th>
            <th class="desc"></th>
            <th class="desc"></th>
            <th class="desc"></th>
            <th class="desc">Tổng Tiền</th>
        </tr>
        </thead>
        @foreach($donhang as $item)
        <tbody>
            <tr>
                <td class="desc"></td>
                <td class="desc"></td>
                <td class="desc"></td>
                <td class="desc"></td>
                <td class="desc">{{ number_format($item->tongtien) }}.VNĐ</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <table>
        <h1>Detail Note</h1>
        <thead>
        <tr>
            <th class="service">MENU</th>
            <th class="desc">Note</th>
        </tr>
        </thead>
        <tbody>
        @foreach($donhang as $item)
        @foreach ($chitiet as $key)
          @if ($key["luachon_id"] == $item["luachon_id"])
            <tr >

                <td class="service">
                  <?php
                    $danhmuccha=DB::table('menu')->where('id',$key["menu_id"])->first();
                    echo $danhmuccha->tensp;
                    ?>
                </td>
                <td class="desc">{{ $key->tentuychon }}</td>
            </tr>
          @else

          @endif

        @endforeach
        @endforeach
        </tbody>
    </table>
    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Bảng giá trên có thể thay đổi theo từng thời điểm.</div>
    </div>
</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>
