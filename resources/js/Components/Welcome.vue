<script setup>
import HeroLogo from "@/Components/HeroLogo.vue";
</script>

<template>
    <div class="p-10">
        <div class="py-6 px-4 mx-auto justify-center max-w-screen-xl text-center lg:py-16 lg:px-12">
            <div class="text-center pt-8">
                <!-- Heading for larger screens like laptops -->
                <h1 class=" hidden sm:block mb-5 text-5xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white typing-effect ">
                    Welcome back to our Club!
                </h1>

                <!-- Heading for smaller screens like mobile devices -->
                <h1 class="justify-center block sm:hidden mb-5 text-5xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-7xl dark:text-white typing-effect">
                    Welcome back!
                </h1>
                <p class="mb-10 pt-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Whether it's a textbook rental, a study/snack space, or a night out at the Hose & Hydrant, we're here to help you succeed throughout your EE and CME degree.
                </p>
            </div>
        </div>

        <div class="pt-8 flex flex-col lg:mb-8 sm:flex-row sm:justify-center sm:space-y-0">
            <div class="hidden md:block md:max-w-0 lg:max-w-sm">
                <HeroLogo/>
            </div>
        </div>

        <div class="lg:pt-12 px-4 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">
            <span class="font-semibold text-indigo-600 dark:text-gray-100 uppercase">Join our Discord Server</span>
        </div>
        <div class="pt-8 relative flex justify-center items-center mt-8 text-indigo-600 dark:text-gray-100 sm:justify-between w-full h-full">
            <a href="https://discord.gg/yEeFaEDNGF" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hover:text-indigo-700 dark:hover:text-indigo-700">
                <svg width="5em" height="5em" viewBox="-25.6 -25.6 307.20 307.20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" fill="#000000" stroke="#000000" stroke-width="0.00256" transform="rotate(0)">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier"> <g>
                        <path d="M216.856339,16.5966031 C200.285002,8.84328665 182.566144,3.2084988 164.041564,0 C161.766523,4.11318106 159.108624,9.64549908 157.276099,14.0464379 C137.583995,11.0849896 118.072967,11.0849896 98.7430163,14.0464379 C96.9108417,9.64549908 94.1925838,4.11318106 91.8971895,0 C73.3526068,3.2084988 55.6133949,8.86399117 39.0420583,16.6376612 C5.61752293,67.146514 -3.4433191,116.400813 1.08711069,164.955721 C23.2560196,181.510915 44.7403634,191.567697 65.8621325,198.148576 C71.0772151,190.971126 75.7283628,183.341335 79.7352139,175.300261 C72.104019,172.400575 64.7949724,168.822202 57.8887866,164.667963 C59.7209612,163.310589 61.5131304,161.891452 63.2445898,160.431257 C105.36741,180.133187 151.134928,180.133187 192.754523,160.431257 C194.506336,161.891452 196.298154,163.310589 198.110326,164.667963 C191.183787,168.842556 183.854737,172.420929 176.223542,175.320965 C180.230393,183.341335 184.861538,190.991831 190.096624,198.16893 C211.238746,191.588051 232.743023,181.531619 254.911949,164.955721 C260.227747,108.668201 245.831087,59.8662432 216.856339,16.5966031 Z M85.4738752,135.09489 C72.8290281,135.09489 62.4592217,123.290155 62.4592217,108.914901 C62.4592217,94.5396472 72.607595,82.7145587 85.4738752,82.7145587 C98.3405064,82.7145587 108.709962,94.5189427 108.488529,108.914901 C108.508531,123.290155 98.3405064,135.09489 85.4738752,135.09489 Z M170.525237,135.09489 C157.88039,135.09489 147.510584,123.290155 147.510584,108.914901 C147.510584,94.5396472 157.658606,82.7145587 170.525237,82.7145587 C183.391518,82.7145587 193.761324,94.5189427 193.539891,108.914901 C193.539891,123.290155 183.391518,135.09489 170.525237,135.09489 Z" fill="currentcolor" fill-rule="nonzero"> </path>
                    </g>
                    </g>
                </svg>
            </a>
        </div>
    </div>

</template>


<style scoped>

@keyframes typing {
    from { width: 0; }
    to { width: 100%; }
}

.typing-effect {
    overflow: hidden;
    border-right: .15em solid transparent; /* The typewriter cursor */
    white-space: nowrap;
    margin: 0 auto;
    letter-spacing: .09em;
    animation:
        typing 3.0s steps(500, end) ,
        blink-caret 1s 3.0s step-end infinite; /* Increased total duration for a smoother fade-out */
}

@keyframes typing {
    from { width: 0; }
    to { width: 100%; }
}


</style>

