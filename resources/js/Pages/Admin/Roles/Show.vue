<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';

import {onMounted} from "vue";
import RolePermissions from "@/Pages/Admin/Roles/Partials/RolePermissions.vue";

const props = defineProps({
  confirmsTwoFactorAuthentication: Boolean,
  permissions: Object,
  role: Object
});

onMounted(() => {
  console.log(props.role)
})
</script>

<template>
  <AppLayout title="Profile">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Role Admin -
      </h2>
    </template>

      <div>
          <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
<!--              <div v-if="$page.props.jetstream.canUpdateProfileInformation">-->
<!--                  <UpdateProfileInformationForm :role="role" />-->

<!--                  <SectionBorder />-->
<!--              </div>-->

              <div v-if="$page.props.jetstream.canUpdatePassword">
                  <RolePermissions
                          class="mt-10 sm:mt-0"
                          :role="role"
                          :available-permissions="permissions"
                  />

                  <SectionBorder />
              </div>

<!--              <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">-->
<!--                  <TwoFactorAuthenticationForm-->
<!--                          :requires-confirmation="confirmsTwoFactorAuthentication"-->
<!--                          class="mt-10 sm:mt-0"-->
<!--                  />-->

<!--                  <SectionBorder />-->
<!--              </div>-->

<!--              <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />-->

<!--              <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">-->
<!--                  <DeleteUserForm class="mt-10 sm:mt-0" />-->
<!--              </template>-->
          </div>
      </div>
  </AppLayout>
</template>
