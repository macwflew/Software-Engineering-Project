<script setup>
import {onMounted} from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Notification from "@/Components/Notification.vue";

const props = defineProps({
  availablePermissions: Array,
  role: Object,
});

// onMounted(() => {
//   console.log(props.availablePermissions, props.role.permissions)
// })

const page = usePage();

const updateRolePermissionForm = useForm({
  role: props.role,
  permission: null,
});

const updatePermission = (permission) => {
  updateRolePermissionForm.permission = permission
  console.log(updateRolePermissionForm)
  updateRolePermissionForm.put(route('permission-role.update'), {
    errorBag: 'updatePermission',
    preserveScroll: true,
    onSuccess: () => updateRolePermissionForm.reset(),
  });
};

const canUpdatePermission = () => {
  return this.props.role.permissions.contains('update-permission');
}

const roleHasPermission = (permission) => {
  let hasPermission = false;
  props.role.permissions.forEach(p => {
    if (hasPermission === false && permission.id === p.id) {
      hasPermission  = true;
    }
  })
  return hasPermission;
}
</script>

<template>
  <div>
    <div v-if="canUpdatePermission">

      <Notification :on="updateRolePermissionForm.recentlySuccessful"
                    :notification-text="'Successfully Saved!'"
                    :notification-detail="'The user now has a new role.'"
                    :isSuccess="true"
      ></Notification>

      <!-- Add Team Member -->
      <FormSection @submitted="updatePermission">
        <template #actions>

        </template>

        <template #title>
          Add permissions to the role.
        </template>

        <template #description>
        Select the permission you want to give.
        </template>

        <template #form>
          <div class="col-span-6">
            <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
<!--              Please provide the email address of the person you would like to add to this team.-->
            </div>
          </div>

          <!-- Permission -->
          <div v-if="availablePermissions.length > 0" class="col-span-6 lg:col-span-4">
            <InputLabel for="permissions" value="Permissions" />

            <div class="relative z-0 mt-1 border border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer">
              <button
                  v-for="(permission, i) in availablePermissions"
                  :key="permission"
                  type="button"
                  class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                  :class="{'border-t border-gray-200 dark:border-gray-700 focus:border-none rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(availablePermissions).length - 1}"
                  @click="updatePermission(permission)"
              >
                <div :class="{'opacity-50': !roleHasPermission(permission)}">
                  <!-- Permission name -->
                  <div class="flex items-center">
                    <div class="text-sm text-gray-600 dark:text-gray-400" :class="{'font-semibold': roleHasPermission(permission)}">
                      {{ permission.name }}
                    </div>

                    <svg v-if="roleHasPermission(permission)" class="ml-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>

                  <!-- Role Description -->
                  <div class="mt-2 text-xs text-gray-600 dark:text-gray-400 text-left">
                    {{ permission.description }}
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
