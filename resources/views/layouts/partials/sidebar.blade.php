<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
        <img class="c-sidebar-brand-full" src="{{ asset('assets/brand/coreui-base-white.svg') }}" width="118" height="46"
            alt="CoreUI Logo">
        <img class="c-sidebar-brand-minimized" src="{{ asset('assets/brand/coreui-signet-white.svg') }}" width="118" height="46"
            alt="CoreUI Logo">
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <i class="c-sidebar-nav-icon cil-square"></i> Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-title">Theme</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('posts.index') }}">
                <i class="c-sidebar-nav-icon cil-newspaper"></i> Posts
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('category.index') }}">
                <i class="c-sidebar-nav-icon cil-clipboard"></i> Categories
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('tags.index') }}">
                <i class="c-sidebar-nav-icon cil-bookmark"></i> Tags
            </a>
        </li>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{-- route('users.index') --}}">
                <i class="c-sidebar-nav-icon cil-user"></i> Users
            </a>
        </li>
        <li class="c-sidebar-nav-title">Components</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{-- route('recycle') --}}">
                <i class="c-sidebar-nav-icon cil-trash"></i> Recycle bin
            </a>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized">
    </button>
</div>