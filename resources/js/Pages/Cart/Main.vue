<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XMarkIcon } from '@heroicons/vue/24/outline'
import {computed, onMounted, watch} from "vue";
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps({
    open: Boolean,
    cartItems: Object,
    cartTextbooks: Object
});

const emit = defineEmits(['closeCart']);
const closeCart = () => emit('closeCart');

const removeItemFromCart = (item) => {
    router.delete(route('cartItems.destroy', item.id), {
        errorBag: 'removeItemFromCart',
        preserveScroll: true,
    });
};

const removeTextbookFromCart = (book) => {
    router.delete(route('cartTextbooks.destroy', book.id), {
        errorBag: 'removeTextbookFromCart',
        preserveScroll: true,
    });
};

 const total = computed(() => {
    let total = 0;
    props.cartItems.forEach(cartItem => {
        total += cartItem.item.price.amount
    });
    props.cartTextbooks.forEach(cartTextbook => {
        total += cartTextbook.textbook.price
    });
    return total;
});


const cartItems = computed(() => {
    return props.cartItems;
});

const cartTextbooks = computed(() => {
    return props.cartTextbooks;
});

const cartItemsFiltered = computed(() => {
    return props.cartItems.reduce((acc, current) => {
        const x = acc.find(item => item.item_id === current.item_id);
        if (!x) {
            return acc.concat([current]);
        } else {
            return acc;
        }
    }, []);
});

const checkoutForm = useForm({
    total: Number,
    items: Array,
    textbooks: Array
});

const checkout = () => {
    checkoutForm.total = total;
    checkoutForm.items = cartItems
    checkoutForm.textbooks = cartTextbooks
    checkoutForm.post(route('cart.checkout'), {
        errorBag: 'checkout',
        preserveScroll: true,
        onSuccess: () => checkoutForm.reset(),
        onFinish: () => closeCart()
    });
}

const isCartEmpty = computed(() => {
    return props.cartItems.length === 0 && props.cartTextbooks.length === 0
})

const quantity = (cartItem) => {
    let i = 0;
    props.cartItems.forEach(element => {
        if (element.item_id === cartItem.item_id) {
            i = i + 1;
        }
    });
    return i;
};

</script>

<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="closeCart">
            <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                            <DialogPanel class="pointer-events-auto w-screen max-w-md">
                                <div class="flex h-full flex-col overflow-y-scroll bg-white dark:bg-gray-900 shadow-xl">
                                    <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                        <div class="flex items-start justify-between">
                                            <DialogTitle class="text-lg font-medium text-gray-900 dark:text-white">Shopping cart</DialogTitle>
                                            <div class="ml-3 flex h-7 items-center">
                                                <button type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500" @click="closeCart">
                                                    <span class="absolute -inset-0.5" />
                                                    <span class="sr-only">Close panel</span>
                                                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                                </button>
                                            </div>
                                        </div>

                                        <div class="mt-8">
                                            <div class="flow-root">
                                                <ul role="list" class="-my-6 divide-y divide-gray-200 dark:divide-gray-700">
                                                    <li v-for="cartItem in cartItemsFiltered" :key="item" class="flex py-6">
                                                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200 dark:border-gray-700">
                                                            <img :src="cartItem.item.image_path" :alt="cartItem.item.name" class="h-full w-full object-cover object-center" />
                                                        </div>
                                                        <div class="ml-4 flex flex-1 flex-col">
                                                            <div>
                                                                <div class="flex justify-between text-base font-medium text-gray-900 dark:text-white">
                                                                    <h3>
                                                                        <a :href="cartItem.item.href">{{ cartItem.item.name }}</a>
                                                                    </h3>
                                                                    <p class="ml-4">{{ cartItem.item.price.amount.toFixed(2) }}</p>
                                                                </div>
                                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400"> </p>
                                                            </div>
                                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                                <p class="text-gray-500 dark:text-gray-400">Qty {{ quantity(cartItem) }}</p>

                                                                <div class="flex">
                                                                    <button type="button"
                                                                            class="font-medium text-indigo-600 dark:text-indigo-500 hover:text-indigo-500 dark:hover:text-indigo-400"
                                                                            @click="removeItemFromCart(cartItem)">
                                                                        Remove
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li v-for="cartTextbook in cartTextbooks" :key="cartTextbook.textbook" class="flex py-6">
                                                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200 dark:border-gray-700">
                                                            <img :src="cartTextbook.textbook.cover" :alt="cartTextbook.textbook.title" class="h-full w-full object-cover object-center" />
                                                        </div>

                                                        <div class="ml-4 flex flex-1 flex-col">
                                                            <div>
                                                                <div class="flex justify-between text-base font-medium text-gray-900 dark:text-white">
                                                                    <h3>
                                                                        <a :href="cartTextbook.textbook.href">{{ cartTextbook.textbook.title }}</a>
                                                                    </h3>
                                                                    <p class="ml-4">{{ cartTextbook.textbook.price.toFixed(2) }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ cartTextbook.textbook.author }}</p>
<!--                                                                <p class="text-gray-500 dark:text-gray-400"></p>-->
                                                                <div class="flex">
                                                                    <button type="button"
                                                                            class="font-medium text-indigo-600 dark:text-indigo-500 hover:text-indigo-500 dark:hover:text-indigo-400"
                                                                            @click="removeTextbookFromCart(cartTextbook)">
                                                                        Remove
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-6 sm:px-6">
                                        <div class="flex justify-between text-base font-medium text-gray-900 dark:text-white">
                                            <p>Subtotal</p>
                                            <p>$ {{ total.toFixed(2) }}</p>
                                        </div>
                                        <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-400">Shipping and taxes calculated at checkout.</p>
                                        <div class="mt-6">
                                            <button class="flex items-center justify-center rounded-md border border-transparent w-full px-6 py-3 text-base font-medium  shadow-sm "
                                                :class="isCartEmpty ? 'text-gray-500 bg-indigo-600/50' : 'text-white bg-indigo-600 hover:bg-indigo-700'"
                                                    :disabled="isCartEmpty"
                                               @click="checkout">
                                                Checkout
                                            </button>
                                        </div>
                                        <div class="mt-6 flex justify-center text-center text-sm text-gray-500 dark:text-gray-400">
                                            <p>
                                                or
                                                <button type="button" class="font-medium text-indigo-600 dark:text-indigo-500 hover:text-indigo-500 dark:hover:text-indigo-400" @click="closeCart">
                                                    Continue Shopping
                                                    <span aria-hidden="true"> &rarr;</span>
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
