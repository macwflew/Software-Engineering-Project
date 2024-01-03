<script setup>
// import Pagination from '@/Components/Pagination.vue';

defineProps({
    textbooks: Object,
});
</script>

<template>
    <div class="text-gray-500 dark:text-gray-400">
        <table class="table-auto border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
            <caption class="text-slate-500 dark:text-slate-400 pt-4 text-xs caption-bottom">
                Textbooks Table: List of all textbooks available to rent.
            </caption>
            <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">ID</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Title</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Cover</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Author</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="textbook in textbooks">
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ textbook.id }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ textbook.title }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><img :src="textbook.cover" class="w-640 h-480" :alt="textbook.title"/></td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ textbook.author }}</td>
            </tr>
            </tbody>
        </table>
<!--        <Pagination :items="items"/>-->
    </div>
</template>
