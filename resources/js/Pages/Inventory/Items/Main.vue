<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Table from '@/Pages/Inventory/Items/Table.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    items: Object,
});

const form = useForm({
    processing: false,
});

const exportForm = () => {
    form.processing = true;
    form.get(route('inventory.export'), {
        errorBag: 'exportForm',
        preserveScroll: true,
        responseType: 'arraybuffer',
        onSuccess: () => {
            let fileLink = document.createElement('a');
            fileLink.href = '/inventory/export';
            fileLink.download = 'Inventory.xlsx';
            fileLink.click()
        },
        onFinish: () => form.processing = false
    });
};
</script>

<template>
    <AppLayout title="Items Inventory">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Inventory - Items
            </h2>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="">
                <div class="mt-5 lg:mt-7 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="columns-2 items-center ">
                                <div class="flex justify-start">
                                    <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5"
                                             class="w-7 h-7 stroke-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex justify-end p-4">
                                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="exportForm">
                                        Export
                                    </PrimaryButton>
                                </div>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Items Inventory</h2>

                            <p class="mt-4 mb-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                This table shows the list of items that the platform has for sell or rent, ordered by name.

                            </p>

                            <Table :items="items" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

