<nav>
    <div class="logo">
        <a href="/home">
            <img src="/img/Bookey-08-08.png" alt="Booky Logo" sizes="210x59">
        </a>
    </div>
    <ul>
        @if (Auth::user()->isAdmin == 0)
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a class="createEvent" href="/events">Create an Event</a>   
            </li>
            <li class="more">
                <a href="#">Account</a>
                <div class="account">
                    <a href="/account/profile">Profile</a>
                    <a href="/logout">Logout</a>
                </div>
            </li>
        @else
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a class="createEvent" href="/edit_customer">Edit Customers</a>   
            </li>
            <li class="more">
                <a href="#">Account</a>
                <div class="account">
                    <a href="/account/profile">Profile</a>
                    <a href="/logout">Logout</a>
                </div>
            </li>

        @endif
    </ul>
</nav>