<script setup>
import FooterLogo from "@/Components/FooterLogo.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="mx-auto w-full max-w-container px-4 sm:px-6 lg:px-8 border-t border-slate-900/5 py-10">
        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <FooterLogo />
        </div>
        <p class="mt-5 text-center text-sm leading-6 text-slate-500">© 2023 G42 - CMPT Labs Inc. All rights reserved.</p>
        <div class="mt-10 flex items-center justify-center space-x-4 text-sm font-semibold leading-6 text-slate-700 dark:text-gray-50">
            <Link :href="route('privacy-policy')">Privacy policy</Link>
            <div class="h-4 w-px bg-slate-500/20 dark:text-amber-100"></div>
            <Link :href="route('feedbacks.create')">Send us feedback</Link>
            <div class="h-4 w-px bg-slate-500/20 dark:text-amber-100"></div>
            <Link :href="route('contact-us')">Contact Us</Link>

        </div>
    </div>
</template>
