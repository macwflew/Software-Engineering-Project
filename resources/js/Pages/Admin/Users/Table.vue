<script setup>
import Row from '@/Pages/Admin/Users/Row.vue';

defineProps({
    users: Object,
    roles: Object
});
</script>

<template>
    <div class="text-gray-500 dark:text-gray-400">
        <table class="table-auto border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
            <caption class="text-slate-500 dark:text-slate-400 pt-4 text-xs caption-bottom">
                Users Table: List of all registered users.
            </caption>
            <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">ID</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Name</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Roles</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Add/Remove Role</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <Row :user="user" :roles="roles"/>
            </tr>
            </tbody>
        </table>
    </div>
</template>
