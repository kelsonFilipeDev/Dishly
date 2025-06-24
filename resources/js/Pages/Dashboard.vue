<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-bold tracking-tight text-white">
                Painel de Controle
            </h2>
        </template>

        <div class="py-10 px-6">
            <div class="mx-auto max-w-7xl">
                <div class="rounded-lg bg-gray-900 shadow-lg">
                    <div class="p-6 text-lg text-gray-100">
                        Bem-vindo de volta, {{ $page.props.auth.user.name }}!
                        <br />
                        Vamos gerir o sistema?
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
