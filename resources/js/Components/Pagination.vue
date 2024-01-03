<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    data: Object,
});
</script>

<template>
    <div class="flex items-center justify-between border-t border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <div v-if="data.prev_page_url === null" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold">Previous</div>
            <Link preserve-scroll preserve-state v-if="data.prev_page_url !== null" :href="data.prev_page_url" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-900 dark:text-slate-200 ring-1 ring-inset ring-gray-300 dark:ring-gray-700 hover:bg-gray-50 hover:dark:bg-indigo-600 focus:z-20 focus:outline-offset-0">Previous</Link>
            <Link preserve-scroll preserve-state v-if="data.next_page_url !== null" :href="data.next_page_url" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-900 dark:text-slate-200 ring-1 ring-inset ring-gray-300 dark:ring-gray-700 hover:bg-gray-50 hover:dark:bg-indigo-600 focus:z-20 focus:outline-offset-0">Next</Link>
            <div v-if="data.next_page_url === null" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold">Next</div>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-slate-900 dark:text-slate-200">
                    Showing
                    {{ ' ' }}
                    <span class="font-medium">{{ data.from }}</span>
                    {{ ' ' }}
                    to
                    {{ ' ' }}
                    <span class="font-medium">{{ data.to }}</span>
                    {{ ' ' }}
                    of
                    {{ ' ' }}
                    <span class="font-medium">{{ data.total }}</span>
                    {{ ' ' }}
                    results
                </p>
            </div>

            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <!-- Buttons -->
                    <Link v-for="link in data.links"
                          preserve-scroll
                          preserve-state
                          :href="link.url ?? 'null'"
                          class="relative inline-flex items-center px-4 py-2 text-sm font-semibold"
                          :class="link.active ? 'z-10 bg-indigo-600 text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'text-slate-900 dark:text-slate-200 ring-1 ring-inset ring-gray-300 dark:ring-gray-700 hover:bg-gray-50 hover:dark:bg-indigo-600 focus:z-20 focus:outline-offset-0'"
                          v-html="link.label"/>
                </nav>
            </div>
        </div>
    </div>
</template>
