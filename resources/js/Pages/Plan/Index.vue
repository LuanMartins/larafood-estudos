<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from "@/Components/Pagination.vue";
import { Head } from '@inertiajs/vue3';

defineProps({plans: Object});

</script>
<template>
    <Head title="Plans" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table class="table-auto">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in plans.data">
                                <td>{{ item.name }}</td>
                                <td>{{ item.price }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination :links="plans.links"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
