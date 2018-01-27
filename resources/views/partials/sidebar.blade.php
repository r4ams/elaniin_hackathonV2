@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            
            @can('event_access')
            <li class="{{ $request->segment(2) == 'events' ? 'active' : '' }}">
                <a href="{{ route('admin.events.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">Eventos</span>
                </a>
            </li>
            @endcan
            
            @can('ticket_access')
            <li class="{{ $request->segment(2) == 'tickets' ? 'active' : '' }}">
                <a href="{{ route('admin.tickets.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">Tickets</span>
                </a>
            </li>
            @endcan
            
            @can('payment_access')
            <li class="{{ $request->segment(2) == 'payments' ? 'active' : '' }}">
                <a href="{{ route('admin.payments.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">Pago de tickets</span>
                </a>
            </li>
            @endcan
            
                
<!--                 @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan -->
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                Usuarios
                            </span>
                        </a>
                    </li>
                @endcan

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Cerra Sesion</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
