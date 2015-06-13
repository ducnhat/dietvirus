<!-- begin: .tray-right -->
<aside class="tray tray-right tray290 va-t pn" data-tray-height="match">

    <!-- menu quick links -->
    <div class="p20 admin-form">

        <h4 class="mt5 text-muted fw500"> Tìm kiếm</h4>

        <hr class="short">

        <div class="section mb15">
            <label for="order-id" class="field prepend-icon">
                <input type="text" name="order-id" id="order-id" class="gui-input" placeholder="Tên truy cập, email hoặc họ tên">
                <label for="order-id" class="field-icon"><i class="fa fa-user"></i>
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

        <h6 class="fw400">Tìm theo nhóm</h6>
        <div class="section mb15">
            <label class="field select">
                <select id="filter-categories" name="filter-categories">
                    <option value="0" selected="selected">Tất cả</option>
                    <option value="1">Administrator</option>
                    <option value="2">Author</option>
                    <option value="2">Member</option>
                </select>
                <i class="arrow double"></i>
            </label>
        </div>

        <h6 class="fw400">Tìm theo tình trạng</h6>
        <div class="section mb15">
            <label class="field select">
                <select id="filter-customers" name="filter-customers">
                    <option value="0" selected="selected">Tất cả</option>
                    <option value="1">Hoạt động</option>
                    <option value="2">Đã khóa</option>
                </select>
                <i class="arrow double"></i>
            </label>
        </div>

        <hr class="short">

        <div class="section row">
            <div class="col-sm-12">
                <button class="btn btn-default btn-sm ph25" type="button">Tìm</button>
            </div>
        </div>

    </div>

</aside>
<!-- end: .tray-right -->