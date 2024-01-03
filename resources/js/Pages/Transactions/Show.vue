<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';

defineProps({
    team: Object,
    availableRoles: Array,
    permissions: Object,
});
</script>

<template>
    <AppLayout title="Team Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Team Settings
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <template v-if="permissions.canDeleteTeam && ! team.personal_team">
                    <SectionBorder/>
                </template>
            </div>
        </div>
    </AppLayout>
</template>
