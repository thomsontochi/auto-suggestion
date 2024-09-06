<script setup>
import { Head ,Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    searchLogs: Object,
    uniqueSearchTermsCount: Number,
});
</script>

<template>
    <Head title="Reporting" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reporting
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-4">Search Log</h3>
                        <p class="mb-4">
                            Unique Search Terms: {{ uniqueSearchTermsCount }}
                        </p>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Search Term
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="log in searchLogs.data"
                                    :key="log.id"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ log.term }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{
                                            new Date(
                                                log.created_at
                                            ).toLocaleString()
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Pagination controls -->
                        <div class="mt-4 flex justify-between">
                            <Link 
                                v-if="searchLogs.prev_page_url" 
                                :href="searchLogs.prev_page_url"
                                class="px-3 py-1 bg-gray-300 rounded"
                            >
                                Previous
                            </Link>
                            
                            <Link 
                                v-if="searchLogs.next_page_url" 
                                :href="searchLogs.next_page_url"
                                class="px-3 py-1 bg-gray-300 rounded"
                            >
                                Next
                            </Link>
                        </div>
                        <div class="mt-2 text-center">
                            Page {{ searchLogs.current_page }} of {{ searchLogs.last_page }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
