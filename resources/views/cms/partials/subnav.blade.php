<nav class="mb-8 flex space-x-4 border-b border-gray-200 pb-2">
    <a href="{{ route('landingcontent.edit') }}" 
       class="px-3 py-2 rounded-t-lg font-medium {{ request()->routeIs('landingcontent.edit') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800' }}">
       Konten
    </a>
    <a href="{{ route('landingtestimony.index') }}" 
       class="px-3 py-2 rounded-t-lg font-medium {{ request()->routeIs('landingtestimony.*') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800' }}">
       Testimoni
    </a>
</nav>
