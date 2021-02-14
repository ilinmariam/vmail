<div id="layoutSidenav">
<div id="layoutSidenav_nav">


    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('dashboard') }}" tabindex="1">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard</a>
            </div>
            <div class="nav">
                <a class="nav-link" href="{{ route('compose') }}" tabindex="2">
                    <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                    Compose</a>
            </div>
            <div class="nav">
                <a class="nav-link" href="{{ route('inbox') }}" tabindex="3">
                    <div class="sb-nav-link-icon"><i class="fas fa-inbox"></i></div>
                    Inbox</a>
            </div>
            <div class="nav">
                <a class="nav-link" href="{{ route('sent') }}" tabindex="4">
                    <div class="sb-nav-link-icon"><i class="fas fa-paper-plane"></i></div>
                    Sent</a>
            </div>
            <div class="nav">
                <a class="nav-link" href="{{ route('trash') }}" tabindex="5">
                    <div class="sb-nav-link-icon"><i class="fas fa-trash-restore"></i></div>
                    Trash</a>
            </div>

            <div class="nav">
                <a class="nav-link" href="{{ route('contact') }}" tabindex="6">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                    Contact</a>
            </div>

            <div class="sb-sidenav-footer align-bottom">
                <div class="small">Logged in as:</div>
                {{ auth()->user()->name }}
            </div>


    </nav>



</div>

