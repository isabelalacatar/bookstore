<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Meniu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">{{ __('Acasa') }}</a>
            </li>
            @if(!Auth::guest())
            @hasrole("admin")
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('books.index') }}">{{ __('Manage Books') }}</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Manage Categories') }}</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('tags.index') }}">{{ __('Manage Tags') }}</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('orders.index') }}">{{ __('Manage Orders') }}</a>
                </li>
                @endhasrole
            @else
            @endif
            <!-- @hasrole("guest") -->
                <li class="nav-item">
                <a class="nav-link" href="{{ route('books.list') }}">{{ __('View all books') }}</a>
            </li>
            <!-- @endhasrole -->
           


        </ul>


    </div>
</nav>
