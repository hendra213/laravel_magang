<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidenav">
    <div
        class="overflow-y-auto py-5 px-3 h-full bg-indigo-600 border-r border-indigo-700">
        
        <ul class="space-y-2 font-medium mt-10">
            @if (auth()->user()->role == 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-2 text-white hover:bg-indigo-700 rounded-lg">
                        <svg class="w-5 h-5 text-white" ...></svg>
                        <span class="ml-3">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.artikel') }}"
                        class="flex items-center p-2 text-white hover:bg-indigo-700 rounded-lg">
                        <svg class="w-5 h-5 text-white" ...></svg>
                        <span class="ml-3">Kelola Berita</span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 'user')
                <li>
                    <a href="{{ route('user.dashboard') }}"
                        class="flex items-center p-2 text-white hover:bg-indigo-700 rounded-lg">
                        <svg class="w-5 h-5 text-white" ...></svg>
                        <span class="ml-3">User Dashboard</span>
                    </a>
                </li>
            @endif
        </ul>

        <a
            class="flex items-center p-2 text-white hover:bg-indigo-700 rounded-lg mt-2"
            href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg class="w-5 h-5 text-white" ...></svg>
            <span class="ml-3">Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout.post') }}" method="POST" class="hidden">
            @csrf
        </form>

    </div>
</aside>