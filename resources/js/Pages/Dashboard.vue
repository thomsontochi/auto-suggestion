<script setup>
import { ref, watch } from "vue";
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import debounce from "lodash/debounce";

const props = defineProps({
    settings: Object,
});

const query = ref("");
const results = ref({ terms: [], collections: [], products: [] });

const search = async () => {
    if (query.value.length < (props.settings.min_characters || 2)) {
        results.value = { terms: [], collections: [], products: [] };
        return;
    }
    const response = await fetch(`/auto-suggest?term=${query.value}`);
    results.value = await response.json();
};

const debouncedSearch = debounce(search, props.settings.search_delay || 300);

const handleInput = () => {
    debouncedSearch();
};

watch(() => props.settings, () => {
    debouncedSearch.cancel();
    debouncedSearch = debounce(search, props.settings.search_delay || 300);
}, { deep: true });
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">
                            Auto-Suggestion Search
                        </h3>
                        <input
                            v-model="query"
                            @input="handleInput"
                            type="text"
                            placeholder="Search..."
                            class="w-full px-4 py-2 border rounded-md"
                        />
                        <div v-if="query.length >= (settings.min_characters || 2)" class="mt-4">
                            <div v-if="settings.display_suggestion_term && results.terms.length > 0">
                                <h4 class="font-semibold">Suggestion Terms:</h4>
                                <ul>
                                    <li
                                        v-for="term in results.terms"
                                        :key="term.id"
                                    >
                                        <a
                                            :href="term.url"
                                            class="text-blue-600 hover:underline"
                                            >{{ term.term }}</a
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div
                                v-if="settings.display_collection && results.collections.length > 0"
                                class="mt-2"
                            >
                                <h4 class="font-semibold">Collections:</h4>
                                <ul>
                                    <li
                                        v-for="collection in results.collections"
                                        :key="collection.id"
                                    >
                                        <a
                                            :href="collection.url"
                                            class="text-blue-600 hover:underline"
                                            >{{ collection.title }}</a
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div
                                v-if="settings.display_product && results.products.length > 0"
                                class="mt-2"
                            >
                                <h4 class="font-semibold">Products:</h4>
                                <ul>
                                    <li
                                        v-for="product in results.products"
                                        :key="product.id"
                                        class="flex items-center space-x-2"
                                    >
                                        <img
                                            :src="product.image"
                                            :alt="product.title"
                                            class="w-10 h-10 object-cover"
                                        />
                                        <div>
                                            <a
                                                :href="product.url"
                                                class="text-blue-600 hover:underline"
                                                >{{ product.title }}</a
                                            >
                                            <p class="text-sm text-gray-600">
                                                {{ product.brand }} - ${{
                                                    product.price
                                                }}
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>