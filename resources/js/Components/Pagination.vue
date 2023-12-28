<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed, toRefs } from 'vue'

const props = defineProps({
    links: {
        type: Array,
        default: () => []  // Define um valor padrão como um array vazio.
    },
});
const { links } = toRefs(props);

const queryParams = new URLSearchParams(window.location.search);

// Mantém o total_per_page atual ou define um padrão.
const totalPerPage = queryParams.get('total_per_page') || '15';

// Atualiza os links com o parâmetro desejado.
const updatedLinks = computed(() => {
    // Verifica se links.value é realmente um array antes de chamar .map()
    if (Array.isArray(links.value)) {
        return links.value.map(link => {
            if (link.url) {
                const url = new URL(link.url, window.location.origin);
                url.searchParams.set('total_per_page', totalPerPage);
                link.url = url.toString();
            }
            return link;
        });
    }
    return [];  // Retorna um array vazio se links.value não for um array.
});
</script>

<template>
    <div v-if="updatedLinks.length > 3">
      <div class="flex flex-wrap justify-center items-center -mb-1 mt-2">
        <template v-for="(link, k) in updatedLinks" :key="k">
          <div v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
          <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-indigo-400 focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url" v-html="link.label" />
        </template>
      </div>
    </div>
</template>
