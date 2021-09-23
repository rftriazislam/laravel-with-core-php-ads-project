<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="{{ url('/home') }}">DREAMPLOY</a>
        </li>
    <li class="nav" id="username"><a href="">Hello, {{ Auth::user()->name }} @if (Auth::user()->active == 1) <i class="fa fa-check-circle" aria-hidden="true"></i>@else
                    <div></div>
                @endif</a></li>
        <li>
            <a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span> Home</a>
        </li>
        <li>
            <a href="{{ url('/tutorial') }}"><span class="fa fa-television"></span> Tutorial</a>
        </li>
        <li>
            <a href="{{ url('/dashboard') }}"><span class="glyphicon glyphicon-check"></span> Dashboard</a>
        </li>
        <li>
            <a href="{{ url('/my-profile') }}"><span class="glyphicon glyphicon-user"></span> My Profile</a>
        </li>
        <li>
            <a href="{{ route('accAct') }}"><span class="glyphicon glyphicon-user"></span> Activation(Training
                Charge)</a>
        </li>
        <li>
            <a href="{{ url('/hotlist') }}"><span class="glyphicon glyphicon-fire"></span> Hotlist</a>
        </li>
        <li>
            <a href="{{ url('/my-team/1/' . Auth::user()->id) }}"><span class="glyphicon glyphicon-home"></span> My
                Team
            </a>
        </li>
        <li>
            <a href="{{ url('/goal') }}"><span class="glyphicon glyphicon-usd"></span> Goal</a>
        </li>
        <li>
            <a href="{{ url('/rank') }}"><span class="glyphicon glyphicon-road"></span>My Rank</a>
        </li>
        <li>
            <a href="https://orbittimes.com/"><span class="glyphicon glyphicon-blackboard"></span> Orbit Times</a>
        </li>
        <li>
            <a href="http://dreamploy.net/"><span class="glyphicon glyphicon-blackboard"></span> Blog Site</a>
        </li>
        <li>
            <a href="{{ url('/income-valley') }}"><span class="glyphicon glyphicon-usd"></span> Income Valley</a>
        </li>
        <li>
            <a href="{{ url('/media-social') }}"><span class="glyphicon glyphicon-blackboard"></span> Media & Social
                Network</a>
        </li>
        <li>
            <a href="{{ url('/microworks') }}"><span class="glyphicon glyphicon-blackboard"></span> Microworks</a>
        </li>
        <li>
            <a href="{{ url('/email-marketing') }}"><span class="glyphicon glyphicon-usd"></span> Email Marketing</a>
        </li>
        <li>
            <a href="{{ url('/video-add') }}"><span class="glyphicon glyphicon-facetime-video"></span> Video Add</a>
        </li>
        <li>
            <a href="{{ url('/earn-more') }}"><span class="glyphicon glyphicon-usd"></span> Earn More</a>
        </li>
        <li>
            <a href="{{ url('ad-valley') }}"><span class="glyphicon glyphicon-home"></span> Ad valley</a>
        </li>
        <li>
            <a href="{{ url('/challenge') }}"><span class="glyphicon glyphicon-baby-formula"></span>Challenge</a>
        </li>
        <li>
            <a href="{{ url('/withdraw') }}"><span class="glyphicon glyphicon-usd"></span> Withdraw</a>
        </li>


        <li>
            <a href=""><span class="glyphicon glyphicon-grain"></span>Tree View</a>
        </li>
        <li>
            <a href="http://www.unistag.com/"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-send"></span> Freelancing</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-plus"></span> Bonus</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-certificate"></span> Rate Us</a>
        </li>
        <li>
            <a href="{{ url('terms-and-condition') }}"><span class="glyphicon glyphicon-usd"></span> Term &
                Condition</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-hand-up"></span> Support</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-phone-alt"></span> Help</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-question-sign"></span> Faq</a>
        </li>

        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-log-out"></span>
                Logout
            </a>
            {!! Form::open(['url' => '/logout', 'id' => 'logout-form']) !!}
            {!! Form::close() !!}
        </li>
    </ul>
</div>
