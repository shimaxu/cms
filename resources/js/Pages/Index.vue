<script setup>
    import {Link, router} from "@inertiajs/vue3";
    import DeleteModal from './Shared/Modal.vue'
    import { PencilIcon, TrashIcon, PlusIcon } from '@heroicons/vue/24/outline'
    import { ref } from 'vue'

    let modalState = ref(false)
    let deleteSlug = ref('')

    defineProps({
        articles: Object
    })

    function edit(slug) {
        router.get(`${slug}/edit`)
    }

    function destroy(deleteSlug) {
        router.delete(`${deleteSlug}`)
        closeModal();
    }

    function showModal(slug) {
        deleteSlug = slug;
        modalState.value = true;
    }

    function closeModal() {
        modalState.value = false;
    }
</script>

<template>
    <div class="mx-auto max-w-7xl p-10 font-[poppins] space-y-6">
        <Link href="/create" replace>
            <button class="py-2 px-4 bg-orange-600 text-sm font-semibold leading-6 text-white">
                <PlusIcon class="h-4 w-4 inline font-bold" aria-hidden="true"/>
                Add New
            </button>
        </Link>

        <article v-for="article in articles" class="relative isolate flex flex-col gap-2 lg:flex-row bg-white shadow-sm">
            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                <img v-if="article.featured_image" :src="article.featured_image" alt="" class="absolute inset-0 h-full w-full bg-gray-50 object-cover">
                <img v-else src="/images/placeholder.png" alt="" class="absolute inset-0 h-full w-full bg-gray-50 object-cover">
                <div class="absolute inset-0 ring-1 ring-inset ring-gray-900/10"></div>
            </div>
            <div class="p-4">

                <div class="group relative">
                    <div class="flex items-center gap-x-4 text-xs w-full justify-between">
                        <h3 class="ml-0 mt-3 text-lg font-semibold leading-6 text-gray-900 text-gray-600">
                            {{ article.title }}
                        </h3>
                        <div class="space-x-4">
                            <button @click="edit(article.slug)">
                                <PencilIcon class="h-4 w-4" aria-hidden="true"/>
                            </button>

                            <button @click="showModal(article.slug)">
                                <TrashIcon class="h-4 w-4" aria-hidden="true"/>
                            </button>
                        </div>
                    </div>


                    <p class="mt-5 text-sm leading-6 text-gray-600">{{ article.content }}</p>
                </div>
                <div class="mt-6 flex border-gray-900/5">
                    <Link :href="`/${article.slug}`" replace>
                        <button class="py-2 px-4 bg-orange-600 text-sm font-semibold leading-6 text-white">Read More →</button>
                    </Link>
                </div>
            </div>
        </article>

        <DeleteModal :modal-state="modalState" @closeModal="closeModal" @delete="destroy(deleteSlug)"/>
    </div>


</template>
