<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import UserRoleManager from "@/Pages/Admin/Users/Partials/UserRoleManager.vue";
import DeleteUser from "@/Pages/Admin/Users/Partials/DeleteUser.vue";
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/vue3";
import UserProfileInformation from "@/Pages/Admin/Users/Partials/UserProfileInformation.vue";

const props = defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    user: Object,
    roles: Object
});

onMounted(() => {
   console.log(usePage().props.currentUserRole, currentUserIsSuperAdmin);
});

const currentUserIsSuperAdmin = usePage().props.currentUserRole.id === 1;

const canSwitchFromSuperAdmin = computed(() => {
    if (props.user.roles[0].id === 1) {
        return currentUserIsSuperAdmin;
    } else {
        return true;
    }
});
</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                User Management - {{ user.name }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UserProfileInformation :user="user" />


                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword && canSwitchFromSuperAdmin">
                    <SectionBorder />
                    <UserRoleManager
                            class="mt-10 sm:mt-0"
                            :available-roles="roles"
                            :user="user"
                    />
                </div>

                <template v-if="currentUserIsSuperAdmin">
                    <SectionBorder />
                    <DeleteUser :user="user" class="mt-10 sm:mt-0" />
                </template>
            </div>
        </div>
    </AppLayout>
</template>
