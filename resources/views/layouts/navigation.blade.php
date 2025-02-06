<header>
    <nav class="bg-gray-100 dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-900 dark:border-white">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a class="flex items-center space-x-3 rtl:space-x-reverse">
                <svg class="pt-2 w-8 h-8 text-gray-800 dark:text-white inline-block align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 274.58 164.09" aria-hidden="true">
                    <g>
                        <path class="fill-gray-300" d="M118.84 0v27.12L46.98 68.61l23.27 13.44 48.59 28.06v27.11L23.27 82.04 0 68.61 86.29 18.79 118.84 0Z"></path>
                        <path class="fill-gray-700" d="M118.84 27.12v26.87L70.25 82.05 46.98 68.61 118.84 27.12Z"></path>
                        <path class="fill-gray-700" d="M118.84 137.22v26.87L0 95.48V68.61l23.27 13.43L118.84 137.22Z"></path>
                        <path class="fill-gray-300" d="M155.74 0v27.12l71.86 41.49-23.27 13.44-48.59 28.06v27.11l95.57-55.18 23.27-13.43L188.29 18.79 155.74 0Z"></path>
                        <path class="fill-gray-700" d="M155.74 27.12v26.87l48.59 28.06 23.27-13.44L155.74 27.12Z"></path>
                        <path class="fill-gray-700" d="M155.74 137.22v26.87l118.84-68.61V68.61l-23.27 13.43L155.74 137.22Z"></path>
                    </g>
                </svg>
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">jamdov</span>
            </a>
            <div class="flex pb-2 md:order-2 justify-center mt-4 space-x-6 sm:mt-0">
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                </a>
                <svg class="w-5 h-5 text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                    <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                </svg>
                <svg class="w-5 h-5 text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                </svg>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-900 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a wire:navigate href="{{ route('home') }}"
                           class="block py-2 pr-4 pl-3 rounded lg:p-0 {{ \Illuminate\Support\Facades\Route::is('home') ? 'text-gray-700 dark:text-white' : 'text-gray-400 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white' }}"
                           aria-current="page">Home</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('projects') }}"
                           class="block py-2 pr-4 pl-3 rounded lg:p-0 {{ \Illuminate\Support\Facades\Route::is('projects') ? 'text-gray-700 dark:text-white' : 'text-gray-400 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white' }}"
                           aria-current="page">Projects</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('projects') }}"
                           class="block py-2 pr-4 pl-3 rounded lg:p-0 {{ \Illuminate\Support\Facades\Route::is('projects') ? 'text-gray-700 dark:text-white' : 'text-gray-400 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white' }}"
                           aria-current="page">Resources</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('projects') }}"
                           class="block py-2 pr-4 pl-3 rounded lg:p-0 {{ \Illuminate\Support\Facades\Route::is('projects') ? 'text-gray-700 dark:text-white' : 'text-gray-400 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white' }}"
                           aria-current="page">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
