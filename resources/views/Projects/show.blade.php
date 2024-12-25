<section class="container h-auto pb-10 pt-10 mx-auto mt-12">
    <!-- Project Title -->
    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">{{ $project->title }}</h1>

    <!-- Tags -->
    <div class="my-4 flex flex-wrap gap-3">
        @foreach ($project->tags as $tag)
            <span class="px-3 py-1 text-sm font-semibold text-white rounded-full"
                  style="background: {{ $tag->primary_colour }}; color: {{ $tag->secondary_colour }};">
                {{ $tag->name }}
            </span>
        @endforeach
    </div>

    <!-- Description -->
    <p class="text-lg text-gray-700 dark:text-gray-300 mt-4">{{ $project->description }}</p>

    <!-- Video or Background Image -->
    @if ($project->video)
        <div class="mt-6">
            <video class="w-full rounded-lg" controls>
                <source src="{{ asset($project->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @else
        <img class="w-full rounded-lg mt-6" src="{{ $project->background_image }}" alt="{{ $project->title }}">
    @endif

    <!-- Images -->
    <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($project->images as $image)
            <img class="w-full rounded-lg" src="{{ asset('storage/' . $image['url']) }}" alt="Project Image">


        @endforeach
    </div>

    <!-- Links -->
    <div class="mt-6">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Links</h3>
        <ul class="mt-2 space-y-2">
            @foreach ($project->links as $link)
                <li>
                    <a href="{{ $link['url'] }}" target="_blank"
                       class="inline-flex items-center text-blue-500 hover:underline">
                        <i class="{{ $link['icon'] }} text-2xl mr-2"></i>
                        {{ $link['url'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
