<script setup>
import Pagination from '@/Components/Pagination.vue';

defineProps({
    feedbacks: Object,
});
</script>

<template>
    <div class="text-gray-500 dark:text-gray-400">
        <table class="table-auto border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
<!--            <caption class="text-slate-500 dark:text-slate-400 pt-4 text-xs caption-top">-->
<!--                Feedbacks Table: List of all the users' feedbacks .-->
<!--            </caption>-->
            <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">ID</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Title</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">User</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Description</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="feedback in feedbacks.data">
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ feedback.id }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ feedback.title }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ feedback.user.name }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ feedback.description }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ feedback.created_at }}</td>
            </tr>
            </tbody>
        </table>
        <Pagination :data="feedbacks"/>
    </div>
</template>
