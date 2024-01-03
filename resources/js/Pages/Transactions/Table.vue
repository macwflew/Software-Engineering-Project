<script setup>
import Pagination from "@/Components/Pagination.vue";

defineProps({
    transactions: Object,
});
</script>

<template>
    <div class="text-gray-500 dark:text-gray-400">
        <table class="table-auto border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
<!--            <caption class="text-slate-500 dark:text-slate-400 pt-4 text-xs caption-bottom">-->
<!--                Transaction Table: List of all transactions made by different users.-->
<!--            </caption>-->
            <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">ID</th>
<!--                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">User</th>-->
<!--                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Email</th>-->
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Amount</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="transaction in transactions.data">
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ transaction.id }}</td>
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ transaction.user.name }}</td>-->
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ transaction.user.email }}</td>-->
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ transaction.item.name }}</td>-->
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">$ {{ transaction.amount }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ transaction.created_at }}</td>
            </tr>
            </tbody>
        </table>
        <Pagination :data="transactions"/>
    </div>
</template>
