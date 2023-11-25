<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from "@/Components/Pagination.vue";
import { Head, router } from '@inertiajs/vue3';

defineProps({plans: Object});

const teste = (event) => {
    router.get(route('plans.index')+`?total_per_page=${event.target.value}`);
}

</script>
<template>
    <Head title="Plans" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="text-right">
                        <select class="border rounded py-1 mb-2" @change="teste($event)">
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <table class="w-full border-collapse border">
                        <thead class="bg-gray-900 text-white">
                            <tr>
                            <th class="px-2 py-1 text-sm font-bold text-left border-r border-b border-gray-700"><span>Name &duarr;</span></th>
                            <th class="px-2 py-1 text-sm font-bold text-left border-r border-b border-gray-700"><span>Price &duarr;</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in plans.data">
                                <td class="px-2 py-1 text-sm text-left">{{ item.name }}</td>
                                <td class="px-2 py-1 text-sm text-left">{{ item.price }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination :links="plans.links"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
