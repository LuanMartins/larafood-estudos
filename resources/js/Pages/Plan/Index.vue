<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { formatCurrency } from '@/Helpers/currencyFormatter';
import Pagination from "@/Components/Tables/Pagination.vue";
import ItensPerPage from "@/Components/Tables/ItensPerPage.vue";
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, usePage, router } from '@inertiajs/vue3';
import { ref, watchEffect } from 'vue';

defineProps({ plans: Object });

const page = usePage();
const perPage = ref('15');
const filter = ref('')

const updatePerPage = (event) => {
    perPage.value = event.target.value;
    router.visit(route('plans.index') + `?total_per_page=${perPage.value}`);
}

const filterPlans = () => {
    router.visit(route('plans.index') + `?total_per_page=${perPage.value}&filter=${filter.value}`)
}

watchEffect(() => {
    const queryParams = new URLSearchParams(window.location.search);
    const totalPerPage = queryParams.get('total_per_page');
    const filterValueParams = queryParams.get('filter')
    if (totalPerPage) perPage.value = totalPerPage;
    if (filterValueParams) filter.value = filterValueParams
});

</script>
<template>
    <Head title="Plans" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="flex items-center gap-4 mb-5">
                        <TextInput v-model="filter" class="w-full" placeholder="Filtre seus planos..."/>
                        <primary-button @click.prevent="filterPlans">
                            <span>
                                Filtrar
                            </span>
                        </primary-button>
                    </div>
                    <div class="text-right">
                        <ItensPerPage :initialValue="'15'" routeName="plans.index" />
                    </div>
                    <table class="w-full border-collapse border">
                        <thead class="bg-gray-900 text-white">
                            <tr>
                                <th class="w-1/2 px-2 py-1 text-sm font-bold text-left border-r border-b border-gray-700">
                                    <span>Name &duarr;</span>
                                </th>
                                <th class="w-1/2 px-2 py-1 text-sm font-bold text-left border-r border-b border-gray-700">
                                    <span>Price &duarr;</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in plans.data" :key="item.id">
                                <td class="w-1/2 px-2 py-1 text-sm text-left">{{ item.name }}</td>
                                <td class="w-1/2 px-2 py-1 text-sm text-left">{{ formatCurrency(item.price) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination :links="plans.links"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
