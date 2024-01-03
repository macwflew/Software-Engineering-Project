<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import {ref} from "vue";
import InputError from "@/Components/InputError.vue";
import {Link} from "@inertiajs/vue3";

const nameInput = ref(null);
const emailInput = ref(null);
const message = ""

const agree = ref(true);

const form = useForm({
    name: '',
    email: '',
    message: ''
});

const createInquiry = () => {
    form.post(route('inquiries.store'), {
        errorBag: 'createInquiry',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onFinish: () => nameInput.value.focus(),
    });
};
</script>
<template>
    <AppLayout title="Contact Us">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Contact Us
            </h2>
        </template>

        <div class="max-w-7xl mx-auto lg:mt-8">
            <div class="">
                <div class="bg-white dark:bg-gray-900 px-6 py-24 sm:py-32">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">Contact Us</h2>
                <p class="mt-2 text-2xl leading-8 text-gray-600 dark:text-gray-400">We're Here to Listen. Enter Your Information and Speak to Us</p>

            </div>
            <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div>
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">First name</label>
                        <div class="mt-2.5">
                            <TextInput
                                    id="name"
                                    ref="nameInput"
                                    v-model="form.name"
                                    type="text"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 dark:text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    autofocus
                            />
                            <InputError :message="form.errors.name" class="mt-2" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">Email</label>
                        <div class="mt-2.5">
                            <TextInput
                                    id="email"
                                    ref="emailInput"
                                    v-model="form.email"
                                    type="text"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 dark:text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                            />
                            <InputError :message="form.errors.email" class="mt-2" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">Message</label>
                        <div class="mt-2.5">
                            <TextArea
                                    id="message"
                                    ref="messageInput"
                                    rows="4"
                                    v-model="form.message"
                                    type="text"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 dark:text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                            />
                            <InputError :message="form.errors.message" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="flex gap-x-4 sm:col-span-2">
                    <label class="text-sm leading-6 text-gray-600 dark:text-gray-400" id="switch-1-label">
                        By clicking <em> Let's talk</em>, you agree to our

                        <Link :href="route('privacy-policy')" class="font-semibold text-indigo-600"> Privacy Policy</Link>
                    </label>
                </div>
                <div class="mt-10">
                    <button class="block w-full rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click="createInquiry">
                        Let's talk
                    </button>
                </div>
            </form>
                    <div class="mx-auto max-w-2xl text-left">
                        <p class="ml-12 mt-4 leading-8 text-gray-600 dark:text-gray-400">Or, contact us directly via:</p>
                    </div>
                    <div class="flex pt- 6 mt-4 sm:justify-center sm:mt-0" style="padding-top: 10px">

                        <a href="https://discord.gg/yEeFaEDNGF" class="text-gray-500 hover:text-gray-900 dark:hover:text-white px-4">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16" >
                                <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                            </svg>
                            <span class="sr-only">Discord community</span>
                        </a>
                        <a href="mailto:ieee@usask.ca" class="text-gray-500 hover:text-gray-900 dark:hover:text-white px-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="h-6 w-6">
                                <path
                                    d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                <path
                                    d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                            </svg>
                            <span class="sr-only">Email account</span>
                        </a>
                        <a href="tel:+1 732 562 5501" class="text-gray-500 hover:text-gray-900 dark:hover:text-white px-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="mr-3 h-6 w-6">
                                <path
                                    fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Phone Number</span>
                        </a>
                    </div>
        </div>
            </div>
        </div>

    </AppLayout>
</template>

