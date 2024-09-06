<script setup>
import { ref, watch } from "vue";
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import debounce from "lodash/debounce";

const query = ref("");
const results = ref({ terms: [], collections: [], products: [] });

const props = defineProps({
    settings: Object,
});

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

watch(
    () => props.settings,
    () => {
        debouncedSearch.cancel();
        debouncedSearch = debounce(search, props.settings.search_delay || 300);
    },
    { deep: true }
);
</script>

<template>
    <Head title="Dashboard" />

    <!-- -------------------old desgin -------------->
<!-- 
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

    </AuthenticatedLayout>  -->

    <!---------------------------- end of old design  -->

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12 bg-gray-100">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">
                            Smart Search
                        </h3>
                        <div class="relative">
                            <input
                                v-model="query"
                                @input="handleInput"
                                type="text"
                                placeholder="Search for products, collections, or terms..."
                                class="w-full px-4 py-3 pr-10 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            />
                            <div
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
                            >
                                <Search
                                    v-if="!isLoading"
                                    class="h-5 w-5 text-gray-400"
                                />
                                <svg
                                    v-else
                                    class="animate-spin h-5 w-5 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>
                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                    ></path>
                                </svg>
                            </div>
                        </div>

                        <div
                            v-if="
                                query.length >=
                                    (settings.min_characters || 2) && !isLoading
                            "
                            class="mt-6 space-y-6"
                        >
                            <div
                                v-if="
                                    settings.display_suggestion_term &&
                                    results.terms.length > 0
                                "
                            >
                                <h4
                                    class="font-semibold text-lg mb-2 flex items-center text-gray-700"
                                >
                                    <Tag class="h-5 w-5 mr-2" /> Suggestion
                                    Terms
                                </h4>
                                <ul class="grid grid-cols-2 gap-2">
                                    <li
                                        v-for="term in results.terms"
                                        :key="term.id"
                                        class="bg-blue-100 rounded-md p-2 hover:bg-blue-200 transition"
                                    >
                                        <a
                                            :href="term.url"
                                            class="text-blue-700 hover:text-blue-900"
                                            >{{ term.term }}</a
                                        >
                                    </li>
                                </ul>
                            </div>

                            <div
                                v-if="
                                    settings.display_collection &&
                                    results.collections.length > 0
                                "
                            >
                                <h4
                                    class="font-semibold text-lg mb-2 flex items-center text-gray-700"
                                >
                                    <ShoppingBag class="h-5 w-5 mr-2" />
                                    Collections
                                </h4>
                                <ul class="space-y-2">
                                    <li
                                        v-for="collection in results.collections"
                                        :key="collection.id"
                                        class="bg-green-100 rounded-md p-2 hover:bg-green-200 transition"
                                    >
                                        <a
                                            :href="collection.url"
                                            class="text-green-700 hover:text-green-900"
                                            >{{ collection.title }}</a
                                        >
                                    </li>
                                </ul>
                            </div>

                            <div
                                v-if="
                                    settings.display_product &&
                                    results.products.length > 0
                                "
                            >
                                <h4
                                    class="font-semibold text-lg mb-2 flex items-center text-gray-700"
                                >
                                    <ShoppingBag class="h-5 w-5 mr-2" />
                                    Products
                                </h4>
                                <ul class="space-y-4">
                                    <li
                                        v-for="product in results.products"
                                        :key="product.id"
                                        class="flex items-center space-x-4 bg-gray-50 rounded-lg p-3 hover:bg-gray-100 transition"
                                    >
                                        <img
                                            :src="product.image"
                                            :alt="product.title"
                                            class="w-16 h-16 object-cover rounded-md"
                                        />
                                        <div>
                                            <a
                                                :href="product.url"
                                                class="text-lg font-medium text-gray-900 hover:text-blue-600"
                                                >{{ product.title }}</a
                                            >
                                            <p class="text-sm text-gray-600">
                                                {{ product.brand }}
                                            </p>
                                            <p
                                                class="text-sm font-bold text-gray-900"
                                            >
                                                ${{ product.price }}
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
