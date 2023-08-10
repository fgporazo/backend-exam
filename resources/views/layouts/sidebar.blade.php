 <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Backend Exam
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing.index') }}" @if(request()->routeIs('landing.*')) class="active" @endif href="#">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}"  @if(request()->routeIs('users.*')) class="active" @endif>User Manager</a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}"  @if(request()->routeIs('category.*')) class="active" @endif>Category Manager</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"  @if(request()->routeIs('products.*')) class="active" @endif>Product Manager</a>
                </li>
            </ul>
        </div>