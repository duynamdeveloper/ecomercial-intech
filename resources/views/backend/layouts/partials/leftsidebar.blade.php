<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="nav-label">Quản lý sản phẩm</li>
                <li> <a href="{{ route('be.product.index') }}"><i class="fa fa-product-hunt"></i><span class="hide-menu">Sản phẩm</span></a>
                </li>
                <li> <a href="{{ route('be.category.index') }}"><i class="fa fa-book"></i><span class="hide-menu">Danh mục sản phẩm</span></a>
                </li>
                <li> <a href="{{ route('be.manufacture.index') }}"><i class="fa fa-industry"></i><span class="hide-menu">Thương hiệu</span></a>
                </li>
                
                <li> <a href="{{ route('be.attribute.index') }}"><i class="fa fa-list"></i><span class="hide-menu">Thuộc tính</span></a>
                </li>
                <li class="nav-label">Quản lý đơn hàng</li>
                <li> <a href="{{ route('be.customer.index') }}"><i class="fa fa-user"></i><span class="hide-menu">Khách hàng</span></a>
                </li>
                <li> <a href="{{ route('be.order.index') }}"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Đơn hàng</span></a>
                </li>
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>