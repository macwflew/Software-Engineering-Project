<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import {computed} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    role: Object,
    permissions: Object
});

const form = useForm({
    permission: null,
    role: props.role
});

const switchPermission = () => {
    form.put(route('permission-role.update'), {
        errorBag: 'switchPermission',
        preserveScroll: true,
        onFinish: (response) => {
            console.log(response)
        },
    });
};
</script>

<template>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ role.name }}</td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
        <div v-for="permission in role.permissions" :key="permission">
            {{ permission.name }}
        </div>
    </td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
        <Link :href="`roles/${role.id}`" class="group relative">
            <PrimaryButton class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                Admin
            </PrimaryButton>
        </Link>
    </td>
</template>
