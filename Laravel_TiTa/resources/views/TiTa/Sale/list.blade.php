@foreach( $sale as $item)
<li>
    <div class="task-checkbox">
        <input type="checkbox" class="list-child" value=""  />
    </div>
    <div class="task-title" id="{{ $item->id }}">
        <span class="task-title-sp">{{ $item->tensp }}</span>
        <span class="badge bg-warning">{{ number_format($item->giaold) }}.VNĐ</span>
        <span class="badge bg-warning">{{ number_format($item->gianew) }}.VNĐ</span>
        <span class="badge bg-important">{{ $item->phantram }}%</span>
        <div class="pull-right">
            <a class="btn btn-success btn-xs fa fa-check"></a>
            <a class="btn btn-primary btn-xs fa fa-pencil" id="edit" data-id="{{ $item->id }}"></a>
            <a class="btn btn-danger btn-xs fa fa-trash-o" id="del" data-id="{{ $item->id }}"></a>
        </div>
    </div>
</li>
@endforeach