<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchBar from "@/Components/SearchBar.vue";
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    textbooks: Object,
});

let input = ref("");

function filteredList() {
    return props.textbooks.data.filter((textbook) =>
        textbook.title.toLowerCase().includes(input.value.toLowerCase()) || textbook.author.toLowerCase().includes(input.value.toLowerCase())
    );
}

</script>

<template>
    <AppLayout title="Textbooks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Textbooks
            </h2>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="">

                <div class="mt-5 lg:mt-7 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="p-2">
                                <SearchBar
                                    id="name"
                                    v-model="input"
                                    type="text"
                                    class="block w-full mt-1"
                                    placeholder="Search textbooks..."
                                    autofocus
                                />
                            </div>

                            <div  class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                <Link v-for="textbook in filteredList()" :key="textbook.id" :href="textbook.textbook_state.id === 1 ? `textbooks/${textbook.id}` : ''" class="group relative">
                                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md lg:aspect-none lg:h-80"
                                         :class="textbook.textbook_state.id === 1 ? 'group-hover:opacity-75' : ''">
                                        <img :src="textbook.cover"
                                             alt="Front of men&#039;s Basic Tee in black."
                                             class="h-full w-full object-cover object-center lg:h-full lg:w-full"
                                             :class="textbook.textbook_state.id !== 1 ? 'opacity-20 dark:opacity-20 bg-gray-400/50 dark:bg-gray-900/50' : ''">
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm text-gray-700 dark:text-gray-100">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ textbook.title }}
                                            </h3>
                                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset" :class="textbook.textbook_state.badge_color">
                                                {{ textbook.textbook_state.name }}
                                            </span>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ textbook.author }}</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200">${{ textbook.price }}</p>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
