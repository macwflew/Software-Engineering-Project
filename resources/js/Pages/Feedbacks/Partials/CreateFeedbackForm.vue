<script setup>
import { useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextArea from '@/Components/TextArea.vue';
import TextInput from '@/Components/TextInput.vue';
import {ref} from "vue";
import ActionMessage from "@/Components/ActionMessage.vue";

const titleInput = ref(null);
const descriptionInput = ref(null);
const message = ""

const form = useForm({
    title: '',
    description: '',
});

const createFeedback = () => {
    form.post(route('feedbacks.store'), {
        errorBag: 'createFeedback',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onFinish: () => titleInput.value.focus(),
    });
};
</script>

<template>
    <FormSection @submitted="createFeedback">
        <template #title>
            Feedback Creation
        </template>

        <template #description>
            Create a new feedback to share your opinion with our team and help us to improve our service.
        </template>

        <template #form>
            <div class="col-span-6">
                <InputLabel value="Feedback Creator" />

                <div class="flex items-center mt-2">
                    <img class="object-cover w-12 h-12 rounded-full" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">

                    <div class="ml-4 leading-tight">
                        <div class="text-gray-900 dark:text-white">{{ $page.props.auth.user.name }}</div>
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $page.props.auth.user.email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    ref="titleInput"
                    v-model="form.title"
                    type="text"
                    class="block w-full mt-1"
                    required
                    autofocus
                />
                <InputError :message="form.errors.title" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="description" value="Description" />
                <TextArea
                    id="description"
                    ref="descriptionInput"
                    v-model="form.description"
                    type="text"
                    class="block w-full mt-1"
                    required
                />
                <InputError :message="form.errors.description" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Sent!
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Send Feedback
            </PrimaryButton>
        </template>
    </FormSection>
</template>
