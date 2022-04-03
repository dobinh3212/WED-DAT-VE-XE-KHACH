<div class="menu_account">
    <!-- <h3 class="h3-title">Trang cá nhân</h3> -->
    <ul>
        @foreach(get_menu(5) as $menu_account)
        <li></i></i><a href="{{ $menu_account->url }}">{{ $menu_account->name }}</a></li>
        @endforeach
    </ul>
</div>