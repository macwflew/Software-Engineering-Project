<script setup>
import {computed, onMounted} from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Notification from "@/Components/Notification.vue";

const props = defineProps({
    availableRoles: Array,
    user: Object,
});

onMounted(() => {
    console.log(props.user.roles)
})

const page = usePage();

const updateUserRoleForm = useForm({
    user: props.user,
    role: null,
});

const updateUserRole = (role) => {
    updateUserRoleForm.role = role
    console.log(updateUserRoleForm)
    updateUserRoleForm.put(route('role-user.update'), {
        errorBag: 'updateUserRole',
        preserveScroll: true,
        onSuccess: () => updateUserRoleForm.reset(),
    });
};

const canUpdateRole = () => {
    return this.props.user.permissions.contains('update-roles');
}

const userHasRole = (role) => {
    let hasRole = false;
    props.user.roles.forEach(r => {
        if (hasRole === false && role.name === r.name) {
            hasRole = true;
        }
    })
    return hasRole;
}

const disableRoleSelection = computed(() => {
    return usePage().props.currentUserRole.id !== 1;
});
</script>

<template>
    <div>
        <div v-if="canUpdateRole">

            <Notification :on="updateUserRoleForm.recentlySuccessful"
                          :notification-text="'Successfully Saved!'"
                          :notification-detail="'The user now has a new role.'"
                          :isSuccess="true"
            ></Notification>

            <!-- Add Team Member -->
            <FormSection @submitted="updateUserRole">
                <template #actions>

                </template>

                <template #title>
                    Admin User Roles
                </template>

                <template #description>
                   Please select the role you want to add.
                </template>

                <template #form>
                    <div class="col-span-6">
                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">

                        </div>
                    </div>

                    <!-- Role -->
                    <div v-if="availableRoles.length > 0" class="col-span-6 lg:col-span-4">
                        <InputLabel for="roles" value="Roles" />

                        <div class="relative z-0 mt-1 border border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer">
                            <button
                                v-for="(role, i) in availableRoles"
                                :key="role"
                                :disabled="role.id === 1 ? disableRoleSelection : false"
                                type="button"
                                class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                :class="{'border-t border-gray-200 dark:border-gray-700 focus:border-none rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(availableRoles).length - 1}"
                                @click="updateUserRole(role)"
                            >
                                <div :class="{'opacity-50': !userHasRole(role)}">
                                    <!-- Role Name -->
                                    <div class="flex items-left">
                                        <div class="text-sm text-gray-600 dark:text-gray-400" :class="{'font-semibold': userHasRole(role)}">
                                            <p class="text-left">{{ role.name }}</p>
                                            <p v-if="role.id === 1 && disableRoleSelection" class="text-xs pt-2">You don't have permissions to set this user as Super Admin</p>
                                        </div>


                                        <svg v-if="userHasRole(role)" class="ml-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>

                                    <!-- Role Description -->
                                    <div class="mt-2 text-xs text-gray-600 dark:text-gray-400 text-left">
                                        {{ role.description }}
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </template>
            </FormSection>
        </div>

    </div>
</template>
