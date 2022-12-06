<form role="form" action="{{ isset($ngayNghi) ? route('khoa.update', $ngayNghi->id) : route('khoa.store') }}" method="post" enctype="multipart/form-data"
      id="myform">
    @csrf
    @if(isset($ngayNghi))
        @method('PUT')
    @endif
    <div class="box-body">
        <div class="col-md-3">
                <label>Tên khoa @include('admin::required')</label>
                <input type="text" class="form-control" name="ten" value="{{ isset($ngayNghi) ? $ngayNghi->ten_khoa : null }}"
                       placeholder="Nhập tên" required>
        </div>

        <div class="col-md-3 text-left" style="margin-top: 20px">
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> {{ isset($ngayNghi) ? 'Cập nhật' : 'Thêm mới' }} </button>
            </div>
        </div>
    </div>
</form>
