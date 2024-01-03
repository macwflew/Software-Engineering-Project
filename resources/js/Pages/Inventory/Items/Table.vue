<script setup>
// import Pagination from '@/Components/Pagination.vue';

import Pagination from "@/Components/Pagination.vue";
import {onMounted} from "vue";

const props = defineProps({
    items: Object,
});

onMounted(() => {
    console.log(props.items.data);
})
</script>

<template>
    <div class="text-gray-500 dark:text-gray-400">
        <table class="table-auto border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
            <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">ID</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Name</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Image</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Description</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Category</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Type</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">State</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items.data">
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ item.id }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ item.name }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><img :src="item.image_path" class="w-640 h-480" :alt="item.name"/></td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ item.description }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4">
                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset" :class=" item.item_category.badge_color ">
                        {{ item.item_category.name }}
                    </span>
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4">
                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset" :class=" item.item_type.badge_color ">
                        {{ item.item_type.name }}
                    </span>
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4">
                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset" :class=" item.item_state.badge_color ">
                        {{ item.item_state.name }}
                    </span>
                </td>
            </tr>
            </tbody>
        </table>
        <Pagination :data="items"/>
    </div>

</template>
