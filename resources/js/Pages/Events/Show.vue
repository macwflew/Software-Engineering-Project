<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Newsletter from "@/Pages/Events/Newsletter.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Link, router, useForm} from "@inertiajs/vue3";
import {onMounted} from "vue";

const props = defineProps({
    event: Object,
});

const event = props.event.data;

const form = useForm({
    event: props.event.data,
});

const submit = () => {
    router.post('volunteers', form)

    form.post(route('volunteers.store'), {
        onFinish: (response) => console.log(response),
    });
};
</script>

<template>
    <AppLayout title="Events">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Event - {{ event.title }}
            </h2>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-4 flex flex-col items-center">
                <img :src="event.image_path" alt="" class="rounded-lg w-3/4 ">
            </div>

            <div class="mt-4">
                <div class="relative isolate overflow-hidden bg-white dark:bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-lg sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                    <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
                        <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
                        <defs>
                            <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                                <stop stop-color="#7775D6" />
                                <stop offset="1" stop-color="#E935C1" />
                            </radialGradient>
                        </defs>
                    </svg>
                    <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Do you want to volunteer?<br>Be part of our team!</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Join us as a volunteer and be the spark that blends tech innovation with unforgettable social fun.</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                            <form @submit.prevent="submit">
                                <PrimaryButton class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Be a volunteer
                                </PrimaryButton>
                            </form>
                        </div>
                    </div>
                    <div class="relative mt-16 h-80 lg:mt-8">
                        <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md opacity-50" src="/images/volunteer.png" alt="App screenshot">
                    </div>
                </div>
            </div>
        </div>

        <Newsletter/>


    </AppLayout>
</template>
