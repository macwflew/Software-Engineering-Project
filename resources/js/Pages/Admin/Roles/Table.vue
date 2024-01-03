<script setup>
import Row from '@/Pages/Admin/Roles/Row.vue';

defineProps({
    roles: Object,
    permissions: Object
});
</script>

<template>
    <div class="text-gray-500 dark:text-gray-400">
        <table class="table-auto border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
            <caption class="text-slate-500 dark:text-slate-400 pt-4 text-xs caption-bottom">
                Roles Table: List of all roles.
            </caption>
            <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Name</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Permissions</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Add/Remove Permissions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="role in roles">
                <Row :role="role" :permissions="permissions"/>
            </tr>
            </tbody>
        </table>
    </div>
</template>
