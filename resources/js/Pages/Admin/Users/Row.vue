<script setup>
import {useForm, Link} from "@inertiajs/vue3";
import {computed, onMounted} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    user: Object,
    roles: Object
});

const form = useForm({
    role: null,
    user: props.user
});

const switchRole = () => {
    form.put(route('role-user.update'), {
        errorBag: 'switchRole',
        preserveScroll: true,
        onFinish: (response) =>  console.log(response),
    });
};
</script>

<template>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.id }}</td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.name }}</td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
        <div v-for="role in user.roles">
            {{ role.name }}
        </div>
    </td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
        <Link :href="$page.props.auth.user.id === user.id ? `user/profile` : `users/${user.id}`" class="group relative">
            <PrimaryButton class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                Admin
            </PrimaryButton>
        </Link>
    </td>
</template>
