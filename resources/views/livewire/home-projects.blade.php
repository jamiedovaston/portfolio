<section class="container mx-auto mt-12 pb-10 space-y-8">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Featured Projects</h2>
    <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($featuredProjects as $project)
            <div wire:navigate href="{{ route('projects.show', $project->id) }}" class="relative w-full rounded-[26px] overflow-hidden bg-gray-700 shadow-lg">
                <!-- Image -->
                <img class="object-cover w-full h-[191px]" src="{{ $project->background_image }}" alt="{{ $project->title }}">

                <!-- Content (Text Box Below Image) -->
                <div class="p-4 space-y-3">
                    <!-- Title -->
                    <h3 class="text-white text-lg font-bold leading-tight">
                        <a>{{ $project->title }}</a>
                    </h3>

                    <!-- Description -->
                    <p class="text-sm font-normal text-gray-300 text-justify">
                        {{ Str::limit($project->description, 150) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>
