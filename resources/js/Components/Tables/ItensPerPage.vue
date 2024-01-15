<script setup>
import { ref, watchEffect } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  initialValue: String,
  routeName: String
});

const queryParams = new URLSearchParams(window.location.search);
const selectedValue = ref(props.initialValue);
const filterValue = queryParams.get('filter') || '';

const perPageOptions = [
  { value: '15', text: '15' },
  { value: '30', text: '30' },
  { value: '45', text: '45' },
  { value: '100', text: '100' },
];

const onChange = (event) => {
  router.visit(route(props.routeName) + `?total_per_page=${selectedValue.value}&filter=${filterValue}`);
};

watchEffect(() => {
    const queryParams = new URLSearchParams(window.location.search);
    const totalPerPage = queryParams.get('total_per_page');
    if (totalPerPage) {
        selectedValue.value = totalPerPage;
    }
});

</script>

<template>
    <select class="border rounded py-1 mb-2" v-model="selectedValue" @change="onChange">
      <option v-for="option in perPageOptions" :key="option.value" :value="option.value">
        {{ option.text }}
      </option>
    </select>
</template>
