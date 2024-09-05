<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    settings: Object,
});

const form = useForm({
    display_suggestion_term: props.settings.display_suggestion_term ?? true,
    display_collection: props.settings.display_collection ?? true,
    display_product: props.settings.display_product ?? true,
    max_results: props.settings.max_results ?? 10,
    min_characters: props.settings.min_characters ?? 2,
    search_delay: props.settings.search_delay ?? 300,
    enable_fuzzy_search: props.settings.enable_fuzzy_search ?? false,
});

const submit = () => {
    form.post(route("settings.update"));
};
</script>

<template>
    <Head title="Settings" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Settings
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="space-y-4">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="checkbox"
                                            v-model="
                                                form.display_suggestion_term
                                            "
                                            class="form-checkbox"
                                        />
                                        <span class="ml-2"
                                            >Display Suggestion Terms</span
                                        >
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="checkbox"
                                            v-model="form.display_collection"
                                            class="form-checkbox"
                                        />
                                        <span class="ml-2"
                                            >Display Collections</span
                                        >
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="checkbox"
                                            v-model="form.display_product"
                                            class="form-checkbox"
                                        />
                                        <span class="ml-2"
                                            >Display Products</span
                                        >
                                    </label>
                                </div>
                                <div>
                                    <label class="block">
                                        <span class="text-gray-700"
                                            >Max Results</span
                                        >
                                        <input
                                            type="number"
                                            v-model="form.max_results"
                                            min="1"
                                            max="50"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        />
                                    </label>
                                </div>
                                <div>
                                    <label class="block">
                                        <span class="text-gray-700"
                                            >Minimum Characters for Search</span
                                        >
                                        <input
                                            type="number"
                                            v-model="form.min_characters"
                                            min="1"
                                            max="5"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        />
                                    </label>
                                </div>
                                <div>
                                    <label class="block">
                                        <span class="text-gray-700"
                                            >Search Delay (ms)</span
                                        >
                                        <input
                                            type="number"
                                            v-model="form.search_delay"
                                            min="100"
                                            max="1000"
                                            step="100"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        />
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="checkbox"
                                            v-model="form.enable_fuzzy_search"
                                            class="form-checkbox"
                                        />
                                        <span class="ml-2"
                                            >Enable Fuzzy Search</span
                                        >
                                    </label>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
                                >
                                    Save Settings
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
