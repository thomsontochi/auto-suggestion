<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const searchTerm = ref('');

const handleSearch = () => {
    // This is where you would typically handle the search
    // For now, we'll just log the search term
    console.log('Searching for:', searchTerm.value);
};
</script>

<template>
    <Head title="Welcome to App Hub" />
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <header class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Welcome to App Hub</h1>
                <p class="text-xl text-gray-600 dark:text-gray-300">Discover products and collections with our powerful search</p>
            </header>

            <!-- <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6 mb-8">
                <div class="max-w-xl mx-auto">
                    <form @submit.prevent="handleSearch">
                        <input
                            v-model="searchTerm"
                            type="text"
                            placeholder="Search for products, collections, or terms..."
                            class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                        />
                        <button type="submit" class="mt-2 w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">
                            Search
                        </button>
                    </form>
                </div>
            </div> -->

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Getting Started</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    To explore the full features of App Hub, including the dashboard and search settings, please log in using the following credentials:
                </p>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 mb-4">
                    <li>Email: opiaaustin@gmail.com</li>
                    <li>Password: password</li>
                </ul>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Once logged in, you can access the dashboard to manage settings, view search logs, and explore other features.
                </p>
                <div class="mt-6">
                    <Link
                        v-if="canLogin"
                        :href="route('login')"
                        class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300"
                    >
                        Log in
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded-md ml-4 hover:bg-gray-300 transition duration-300"
                    >
                        Register
                    </Link>
                </div>
            </div>

            <footer class="mt-12 text-center text-sm text-gray-500 dark:text-gray-400">
                Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
            </footer>
        </div>
    </div>
</template>