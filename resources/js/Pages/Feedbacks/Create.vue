<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateFeedbackForm from '@/Pages/Feedbacks/Partials/CreateFeedbackForm.vue';
</script>

<template>
    <AppLayout title="Create Item">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                New Feedback
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateFeedbackForm />
            </div>
        </div>
    </AppLayout>
</template>
