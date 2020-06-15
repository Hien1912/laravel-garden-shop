<div  class="container">
    <form action="{{ route('check-out') }}" id="form-order" method="post" class="row">
        @csrf
        <div class="form-group col-12 col-sm-4 col-lg-12">
            <label>Họ Và Tên</label>
            <input class="form-control" type="text" name="name" required value="{{ old('name') }}">
        </div>
        <div class="form-group col-12 col-sm-4 col-lg-12">
            <label>Email</label>
            <input class="form-control" type="email" name="email" required value="{{ old('phone') }}">
        </div>
        <div class="form-group col-12 col-sm-4 col-lg-12">
            <label>Số diện thoại</label>
            <input class="form-control" type="tel" name="phone" required value="{{ old('phone') }}">
        </div>
        <div class="form-group col-12 col-lg-12 col-sm-8">
            <label>Địa chỉ</label>
            <input class="form-control" name="address" required value="{{ old('address') }}">
        </div>
        <div class="form-group col-12 col-sm-4 col-lg-12">
            <label>Tỉnh/Thành Phố</label>
            <input class="form-control" type="text" name="city" required value="{{ old('city') }}" list="citylist">
            <datalist id="citylist">
                @foreach($citylist as $city)
                <option value="{{ ucfirst($city) }}">
                @endforeach
            </datalist>
        </div>
        <div class="col">
            <button type="button" class="btn btn-success float-right" onclick="Obj.cartOrder()">Xác nhận</button>
        </div>
    </form>
</div>