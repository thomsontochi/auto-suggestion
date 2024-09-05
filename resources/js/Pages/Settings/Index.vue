<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    settings: Array,
});

const form = useForm({
    display_suggestion_term:
        props.settings.find((s) => s.key === "display_suggestion_term")
            ?.value === "true",
    display_collection:
        props.settings.find((s) => s.key === "display_collection")?.value ===
        "true",
    display_product:
        props.settings.find((s) => s.key === "display_product")?.value ===
        "true",
    max_results:
        props.settings.find((s) => s.key === "max_results")?.value || 10,
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
