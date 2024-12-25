<section class="container mx-auto mt-12 space-y-8">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">All Projects</h2>
    <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($projects as $project)
            <!-- Single Project Card -->
            <div class="relative bg-gray-700 rounded-[26px] overflow-hidden shadow-lg">
                <!-- Background Image -->
                <img class="object-cover w-full h-[191px]" src="{{ $project->background_image }}" alt="{{ $project->title }}">

                <!-- Content -->
                <div class="p-4">
                    <h3 class="text-lg font-bold text-white">{{ $project->title }}</h3>
                    <p class="text-sm text-gray-300">{{ Str::limit($project->description, 100) }}</p>
                    <a href="{{ route('projects.show', $project->id) }}" class="mt-2 text-blue-500 hover:underline">
                        Read More
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Pagination -->
    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</section>
