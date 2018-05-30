<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{route('sekretare.dashboard')}}"><img src="{{asset('images/logosek2.png')}}"
                                                                                 alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{route('sekretare.dashboard')}}"><img
                        src="{{asset('images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('sekretare/dashboard')  ? 'active' : ''}}">
                    <a href="{{route('sekretare.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Menaxho</h3><!-- /.menu-title -->
                <li class="{{Request::is('sekretare/fakultet') || Request::is('*/sekretare/fakultet/*') ? 'active' : ''}}">
                    <a href="{{route('sekretare.fakultet.index')}}"> <i class="menu-icon fa fa-building-o"></i>Fakultet</a>
                </li>

                <li class="{{Request::is('sekretare/departament') || Request::is('*/sekretare/departament/*') ? 'active' : ''}}">
                    <a href="{{route('sekretare.departament.index')}}"> <i class="menu-icon fa fa-briefcase"></i>Departament</a>
                </li>

                <li class="{{Request::is('sekretare/grupMesimor') || Request::is('sekretare/grupMesimor/*') ? 'active' : ''}}">
                    <a href="{{route('sekretare.grupMesimor.index')}}"> <i class="menu-icon fa fa-address-book-o"></i>Grup
                        Mesimor</a>
                </li>

                <li class="{{Request::is('sekretare/student') || Request::is('sekretare/student/*') ? 'active' : ''}}">
                    <a href="{{route('sekretare.student.index')}}"> <i class="menu-icon fa fa-users"></i>Student</a>
                </li>

                <li class="{{Request::is('sekretare/pedagog') || Request::is('sekretare/pedagog/*') ? 'active' : ''}}">
                    <a href="{{route('sekretare.pedagog.index')}}"> <i
                                class="menu-icon fa fa-user-circle"></i>Pedagog</a>
                </li>

                <li class="{{Request::is('sekretare/lenda') || Request::is('sekretare/lenda/*') ? 'active' : ''}}">
                    <a href="{{route('sekretare.lenda.index')}}"> <i class="menu-icon fa fa-book"></i>Lenda</a>
                </li>

                <li class="{{Request::is('sekretare/provim') || Request::is('sekretare/provim/*') ? 'active' : ''}}">
                    <a href="{{route('sekretare.provim.index')}}"> <i class="menu-icon fa fa-question"></i>Provim</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->