<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchBar from "@/Components/SearchBar.vue";
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    items: Object,
});

const selectedTab = ref(1)

let input = ref("");

const rentItems = props.items.data.filter((item) => item.item_type_id === 1);

const buyItems = props.items.data.filter((item) => item.item_type_id === 2);

function filteredList() {
    if (selectedTab.value === 1) {
        return rentItems.filter((item) =>
                item.name.toLowerCase().includes(input.value.toLowerCase()) ||
                item.item_category.name.toLowerCase().includes(input.value.toLowerCase()) ||
                item.item_state.name.toLowerCase().includes(input.value.toLowerCase()));
    } else {
        return buyItems.filter((item) =>
                item.name.toLowerCase().includes(input.value.toLowerCase()) ||
                item.item_category.name.toLowerCase().includes(input.value.toLowerCase()) ||
                item.item_state.name.toLowerCase().includes(input.value.toLowerCase()));
    }
}
</script>

<template>
    <AppLayout title="Items">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Items
            </h2>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="">

                <div class="mt-5 lg:mt-7 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex focus:outline focus:outline-2 focus:outline-red-500">
                        <div>

                            <div class="mx-auto max-w-3xl">
                                <div>
                                    <div class="block">
                                        <nav class="isolate flex divide-x divide-x-border-gray-200 rounded-lg sm:shadow" aria-label="Tabs">
                                            <a @click="selectedTab = 1" href="#" class="text-gray-900 rounded-l-lg relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-semibold" :class="selectedTab === 1 ? 'dark:text-white dark:bg-indigo-500' : 'dark:text-white dark:bg-gray-700'" aria-current="page">
                                                <span>RENT</span>
                                                <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-0.5" :class="selectedTab === 1 ? 'bg-indigo-500' : 'bg-transparent'"></span>
                                            </a>
                                            <a @click="selectedTab = 2" href="#" class="text-gray-500 rounded-r-lg relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-semibold" :class="selectedTab === 2 ? 'dark:text-white dark:bg-indigo-500' : 'dark:text-white dark:bg-gray-700'" aria-current="page">
                                                <span>BUY</span>
                                                <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-0.5" :class="selectedTab === 2 ? 'bg-indigo-500' : 'bg-transparent'"></span>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>


                            <div class="p-2">
                                <SearchBar
                                        id="name"
                                        v-model="input"
                                        type="text"
                                        class="block w-full mt-1"
                                        placeholder="Search items..."
                                        autofocus
                                />
                            </div>
                            <div  class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                <Link v-for="item in filteredList()" :key="item" :href="item.item_state.id === 1 ? `items/${item.id}` : ''" class="group relative" >
                                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md lg:aspect-none lg:h-80"
                                         :class="item.item_state.id === 1 ? 'group-hover:opacity-75' : ''">
                                        <img :src="item.image_path"
                                             alt="Front of men&#039;s Basic Tee in black."
                                             class="h-full w-full object-cover object-center lg:h-full lg:w-full"
                                             :class="item.item_state.id !== 1 ? 'opacity-20 dark:opacity-10 bg-gray-400/50 dark:bg-gray-900/50' : ''">
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm text-gray-700 dark:text-gray-100">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ item.name }}
                                            </h3>
                                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset" :class="item.item_state.badge_color">
                                                {{ item.item_state.name }}
                                            </span>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ item.description }}</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200">${{ item.price.amount.toFixed(2) }}</p>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- This code is only for load the colours at the badges. If this code is not here, the colours at the top doesn't work.-->
        <div class="hidden">
            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset dark:bg-gray-400/10 dark:text-gray-400 ring-gray-500/10 dark:ring-gray-400/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset dark:bg-red-400/10 dark:text-red-400 ring-red-600/10 dark:ring-red-400/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset dark:bg-yellow-400/10 dark:text-yellow-500 ring-yellow-600/20 dark:ring-yellow-400/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset dark:bg-green-500/10 dark:text-green-400 ring-green-600/20 dark:ring-green-500/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset dark:bg-blue-400/10 dark:text-blue-400 ring-blue-700/10 dark:ring-blue-400/30">Badge</span>
            <span class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset dark:bg-indigo-400/10 dark:text-indigo-400 ring-indigo-700/10 dark:ring-indigo-400/30">Badge</span>
            <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset dark:bg-purple-400/10 dark:text-purple-400 ring-purple-700/10 dark:ring-purple-400/30">Badge</span>
            <span class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset dark:bg-pink-400/10 dark:text-pink-400 ring-pink-700/10 dark:ring-pink-400/20">Badge</span>
        </div>

    </AppLayout>
</template>

