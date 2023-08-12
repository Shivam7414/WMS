<section id="sidebar">
    <a href="#" class="brand"><i class='bx bxs-smile icon'></i>WMS</a>
    <ul class="side-menu">
        <li><a href="{{ url('admin') }}"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
        <li class="divider" data-text="main">Main</li>
        <li><a href="{{ url('admin/customer/index') }}" class="{{ request()->tab =='customer' ? 'active' : ''}}"><i class='bx bxs-user-detail icon fs-4'></i>Manage Customers</a></li>
        <li><a href="#"><i class="fa-solid fa-cart-flatbed icon" class="{{ request()->tab =='items' ? 'active' : ''}}"></i>Manage Items</a></li>
        <li>
            <a href="#"><i class='bx bxs-inbox icon'></i> Elements <i
                    class='bx bx-chevron-right icon-right'></i></a>
            <ul class="side-dropdown">
                <li><a href="#">Alert</a></li>
                <li><a href="#">Badges</a></li>
                <li><a href="#">Breadcrumbs</a></li>
                <li><a href="#">Button</a></li>
            </ul>
        </li>
        <li class="divider" data-text="table and forms">Table and forms</li>
        <li><a href="#"><i class='bx bx-table icon'></i> Tables</a></li>
        <li>
            <a href="#"><i class='bx bxs-notepad icon'></i> Forms <i
                    class='bx bx-chevron-right icon-right'></i></a>
            <ul class="side-dropdown">
                <li><a href="#">Basic</a></li>
                <li><a href="#">Select</a></li>
                <li><a href="#">Checkbox</a></li>
                <li><a href="#">Radio</a></li>
            </ul>
        </li>
    </ul>
</section>
