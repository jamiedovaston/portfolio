<section class="pb-52 container mx-auto mt-12 space-y-8">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Featured Projects</h2>
    <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($featuredProjects as $project)
            <a href="{{ route('projects.show', $project->id) }}" class="relative group w-full aspect-[16/9] rounded-lg overflow-hidden cursor-pointer shadow-lg">
                <!-- Card Image -->
                <div class="w-full h-full overflow-hidden">
                    <img class="w-full h-full object-cover object-center transition duration-700 ease-in-out group-hover:brightness-50 group-hover:scale-105"
                         src="{{ $project->background_image }}"
                         alt="{{ $project->title }}"/>
                </div>

                <!-- Border Effect -->
                <div class="absolute inset-0 border-2 border-white rounded-lg opacity-0 transition-all duration-700 ease-in-out group-hover:opacity-100 group-hover:inset-[10px]"></div>

                <!-- Card Content -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[80%] text-center">
                    <h3
                        class="text-lg font-bold text-white opacity-0 scale-90 transition-transform duration-700 ease-in-out delay-150 group-hover:opacity-100 group-hover:scale-100"
                    >
                        {{ $project->title }}
                    </h3>
                    <p
                        class="text-sm text-gray-300 opacity-0 translate-y-3 transition-transform duration-700 ease-in-out delay-150 group-hover:opacity-100 group-hover:translate-y-0"
                    >
                        {{ Str::limit($project->description, 100) }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</section>
