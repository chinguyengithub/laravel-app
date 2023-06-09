<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('storage/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ request()->is('/') ? 'active has-sub' : '' }}">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Quản lí bán hàng</a>
                </li>
                <li class="{{ request()->is('products') ? 'active has-sub' : '' }}">
                    <a href="{{ URL::to('/products') }}">
                        <i class="fas fa-chart-bar"></i>Quản lí sản phẩm</a>
                </li>
                <li>
                    <a href="{{ URL::to('/suppliers') }}">
                        <i class="fas fa-table"></i>Quản lí nhà cung cấp</a>
                </li>

                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Quản lí phiếu nhập hàng</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ URL::to('/phieu-nhap-hang') }}">
                                Danh sách phiếu </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/phieu-nhap-hang') }}">
                                Tạo phiếu nhập hàng</a>
                        </li>

                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-calendar-alt"></i>Quản lí báo cáo</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ URL::to('/salereport') }}">
                                Báo cáo bán hàng</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/rp_inventory') }}">
                               Báo cáo hàng tồn</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>