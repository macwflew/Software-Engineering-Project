<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
import Newsletter from "@/Pages/Events/Newsletter.vue";
import {onMounted} from "vue";

const props = defineProps({
    events: Object,
});

onMounted(() => {
    console.log(props.events)
})
</script>

<template>
    <AppLayout title="Events">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Events
            </h2>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                    <Link v-for="event in events.data" :key="event.id" :href="`events/${event.id}`">
                            <img :src="event.image_path" alt="" class="scale-100">
<!--                            <div class="absolute inset-0 -z-10 bg-gradient-to-t to-60% from-gray-900 to-transparent"></div>-->
<!--                            <div class="absolute inset-0 -z-10 rounded-2xl ring-0 ring-inset"></div>-->
<!--                            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">-->
<!--                                <time :datetime="event.dated_at" class="mr-8">{{ event.dated_at }}</time>-->
<!--                            </div>-->
<!--                            <h3 class="mt-3 text-lg font-semibold leading-6 text-white">-->
<!--                                <a href="#">-->
<!--                                    <span class="absolute inset-0"></span>-->
<!--                                    {{ event.title }}-->
<!--                                </a>-->
<!--                            </h3>-->
                    </Link>
                </div>
            </div>
        </div>

        <Newsletter/>
    </AppLayout>
</template>


