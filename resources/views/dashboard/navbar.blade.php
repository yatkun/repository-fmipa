<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item {{ $title == "Dashboard" ? "active" : "" }} ">
            <a href="/dashboard" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item {{ $title == "Posts" ? "active" : "" }}">
            <a href="/dashboard/posts" class='sidebar-link'>
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Posts</span>
            </a>
        </li>
        <li class="sidebar-item {{ $title == "Members" ? "active" : "" }}">
            <a href="/dashboard/members" class='sidebar-link'>
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Members</span>
            </a>
        </li>



        <li class="sidebar-item bg-danger" style="border-radius:0.5rem; position:absolute; bottom:0;margin-bottom:20px">
            <form action="/logout" method="post">
                @csrf

                <a href="/logout" class='nav-logout'  style="color:#fff !important">
                    <i class="bi bi-arrow-left-square-fill" style="color:#fff !important"></i>
                    <span>Logout</span>
                </a>
        </form>
        

        </li>
    </ul>
</div>