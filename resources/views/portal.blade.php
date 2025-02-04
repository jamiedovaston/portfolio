<section class="bg-white pt-10 dark:bg-[#1c1c20]">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Jamie Dovaston</h1>
            <p class="max-w-2xl mb-6 font-bold text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                <span id="typewriter" class="text-gray-300"></span><span id="cursor" class="text-white font-bold blink">|</span>
            </p>
        </div>
        <div class="hidden lg:mt-0 col-span-5 pl-10 w-[225px] h-[125px] lg:flex">
            <img src="https://image.overtimehosting.cloud/u/WSa5Vl.png" alt="mockup">
        </div>
    </div>
</section>


<script>
    const words = [
        "Bsc/Hons Games Design and Programming Student at University of Staffordshire",
    ];
    const el = document.querySelector("#typewriter");

    const sleepTime = 50;
    let currWordIndex = 0;

    const sleep = (time) => {
        return new Promise((resolve) => setTimeout(resolve, time));
    };

    const effect = async () => {
        while (true) {
            currWord = words[currWordIndex];

            for (let i = 0; i < currWord.length; i++) {
                el.innerText = currWord.substring(0, i + 1);
                await sleep(sleepTime);
            }

            await sleep(500);

            if (currWordIndex >= words.length - 1) {
                currWordIndex = 0;
                await sleep(1000);
            } else currWordIndex++;
        }
    };

    effect();
</script>
