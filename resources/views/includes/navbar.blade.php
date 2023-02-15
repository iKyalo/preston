@php
    $menuItems = [
        [
            'text' => 'Home',
            'url' => '/',
        ],
        [
            'text' => 'Vehicles',
            'url' => '/vehicles',
        ],
        [
            'text' => 'Orders',
            'url' => '/orders',
        ],
        [
            'text' => 'Customers',
            'url' => '/customers',
        ],
        [
            'text' => 'Logout',
            'url' => '/logout',
        ],
    ];
    
    $authItems = [
        [
            'text' => 'Login',
            'url' => '/login',
        ],
        [
            'text' => 'Register',
            'url' => '/register',
        ],
    ];
    
@endphp

<nav class="navbar" id="nb">
    <a href="#" class="logo">Preston</a>
    <ul class="menu" :class="{ 'menu-visible': isMenuVisible }">

        @if (!Auth::guest())
            @foreach ($menuItems as $mi)
                @php
                    if ($mi['text'] == 'logout') {
                        $class = 'button';
                    } else {
                        $class = '';
                    }
                @endphp
                <li>
                    <a class="{{ $class }}" href="{{ $mi['url'] }}">{{ $mi['text'] }}</a>
                </li>
            @endforeach
        @else
            @foreach ($authItems as $ai)
                <li>
                    <a class="" href="{{ $ai['url'] }}">{{ $ai['text'] }}</a>
                </li>
            @endforeach
        @endif

    </ul>
    <button class="hamburger-menu" @click="toggleMenu">&#9776;</button>
</nav>

<script type="application/javascript">
    var app = new Vue({
        el: '#nb',
        data() {
            return {
                auth: 
                menuItems: [{
                        text: 'Home',
                        url: '/'
                    },
                    {
                        text: 'Vehicles',
                        url: 'vehicles'
                    },
                    {
                        text: 'Orders',
                        url: 'orders'
                    },
                    {
                        text: 'Customers',
                        url: 'customers'
                    },
                    {
                        text: 'Logout',
                        url: 'logout'
                    },
                ],
                authItems: [{
                    {
                        text: 'Login',
                        url: 'login'
                    },
                    {
                        text: 'Register',
                        url: 'register'
                    },
                }]
                isMenuVisible: false,
            };
        },
        methods: {
            toggleMenu() {
                this.isMenuVisible = !this.isMenuVisible;
            },
        },
    })
</script>
