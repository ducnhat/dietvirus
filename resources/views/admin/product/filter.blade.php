<!-- begin: .tray-right -->
<aside class="tray tray-right tray290 va-t pn" data-tray-height="match">

    <!-- menu quick links -->
    <div class="p20 admin-form">

        <h4 class="mt5 text-muted fw500"> Tìm kiếm</h4>

        <hr class="short">

        {!! Form::open(['url' => 'admin-ant/user/search']) !!}
        <div class="section mb15">
            <label for="name" class="field prepend-icon">
                <input type="text" name="name" id="name" class="gui-input" placeholder="Tên truy cập, email hoặc họ tên">
                <label for="name" class="field-icon"><i class="fa fa-user"></i>
                </label>
            </label>
        </div>

        <h6 class="fw400">Ngày tạo</h6>
        <div class="section row">
            <div class="col-md-6">
                <label for="date1" class="field prepend-icon">
                    <input type="text" name="date1" id="date1" class="gui-input" placeholder="01/01/15">
                    <label for="date1" class="field-icon"><i class="fa fa-calendar"></i>
                    </label>
                </label>
            </div>
            <div class="col-md-6">
                <label for="date2" class="field prepend-icon">
                    <input type="text" name="date2" id="date2" class="gui-input" placeholder="01/31/15">
                    <label for="date2" class="field-icon"><i class="fa fa-calendar"></i>
                    </label>
                </label>
            </div>
        </div>

        <h6 class="fw400">Tìm theo tình trạng</h6>
        <div class="section mb15">
            <label class="field select">
                <select id="status" name="status">
                    <option value="-1" selected="selected">Tất cả</option>
                    <option value="1">Hoạt động</option>
                    <option value="0">Đã khóa</option>
                </select>
                <i class="arrow double"></i>
            </label>
        </div>

        <hr class="short">

        <div class="section row">
            <div class="col-sm-12">
                <button class="btn btn-default btn-sm ph25" type="submit">Tìm</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

</aside>
<!-- end: .tray-right -->