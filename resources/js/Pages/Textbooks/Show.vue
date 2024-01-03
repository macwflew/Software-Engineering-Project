<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {useForm} from "@inertiajs/vue3";
import {computed, ref} from "vue";

const props = defineProps({
    textbook: Object,
});

const book = props.textbook.data;

const open = ref(false);
const openCart = () => open.value = true;
const closeCart = () => open.value = false;

const addTextbookForm = useForm({
    textbook: book,
});

const isDisabled = computed(() => {
    return props.textbook.data.cart_textbooks.length > 0
});

const addToCart = () => {
    addTextbookForm.post(route('cartTextbooks.store'), {
        errorBag: 'addToCart',
        preserveScroll: true,
        onSuccess: () => openCart(),
    });
};
</script>

<template>
    <AppLayout title="Items" :toOpen="open" @openCart="openCart" @closeCart="closeCart">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Item {{ book.title }}
            </h2>
        </template>

        <div class="">
            <div class="pt-6">

                <!-- Product info -->
                <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">

                    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 dark:lg:border-gray-800 lg:pr-8">
                        <div class="lg:col-span-2 pb-6">
                            <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                                <img :src="book.cover" :alt="book.title" class="h-full w-full object-cover object-center" />
                            </div>
                        </div>
                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-100 sm:text-3xl">{{ book.title }}</h1>
                    </div>

                    <!-- Options -->
                    <div class="mt-4 lg:row-span-3 lg:mt-0">
                        <h2 class="sr-only">Product information</h2>
                        <p class="text-3xl tracking-tight text-gray-900 dark:text-gray-200">$ {{ book.price }}</p>
                        <span class="mt-2 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset" :class="book.textbook_state.badge_color">
                            {{ book.textbook_state.name }}
                        </span>

                        <div class="mt-10">
                            <button class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent px-8 py-3 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    :class="!isDisabled ? 'text-white bg-indigo-600 hover:bg-indigo-700' : 'text-gray-100 dark:text-gray-500 bg-indigo-600/30'"
                                    type="button"
                                    @click="addToCart"
                                    :disabled="isDisabled">
                                Add to bag
                            </button>
                        </div>
                    </div>

                    <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 dark:lg:border-gray-800 lg:pb-4 lg:pr-8 lg:pt-4">
                        <!-- Description and details -->
                        <div>
                            <h3 class="sr-only">Description</h3>

                            <div class="space-y-6">
                                <p class="text-base text-gray-900 dark:text-gray-300">{{ book.author }}</p>
                            </div>
                        </div>
                    </div>

<!--                    <div v-if="props.textbook.can.update" class="items-center mt-4">-->
<!--                        <div class="flex justify-start">-->
<!--                            <Link :href="`${textbook.id}/edit` " class="">-->
<!--                                <PrimaryButton class="ml-4">-->
<!--                                    Edit Product-->
<!--                                </PrimaryButton>-->
<!--                            </Link>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

    </AppLayout>
</template>
