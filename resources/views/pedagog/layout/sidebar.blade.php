<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{asset('images/logosek2.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('pedagog.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Menaxho</h3><!-- /.menu-title -->

                <li class="{{Request::is('pedagog/detyrime') || Request::is('pedagog/detyrime/*') ? 'active' : ''}}">
                    <a href="{{route('pedagog.detyrime.index')}}"> <i class="menu-icon fa fa-sticky-note-o"></i>Detyrime
                        Akademike</a>
                </li>

                <li class="{{Request::is('pedagog/provim') || Request::is('pedagog/provim/*') ? 'active' : ''}}">
                    <a href="{{route('pedagog.provim.index')}}"> <i class="menu-icon fa fa-question"></i>Provim</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->